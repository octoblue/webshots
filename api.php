<?php
include 'inc/config.php';
$action = $_REQUEST['action'];
$conn = Db::dbConnect();
switch($action){
    case 'orders':
        foreach($_SESSION['order'] as $key=>$order){
            if(isset($_REQUEST['sell-'.$key])) $_SESSION['order'][$key]['sell'] = $_REQUEST['sell-'.$key];
            if(isset($_REQUEST['quantity-'.$key])) $_SESSION['order'][$key]['quantity'] = $_REQUEST['quantity-'.$key];
        }
         $array = Array();
        if(isset($_REQUEST['barcode']) && $_REQUEST['barcode'] != '' ){
            $barcode = $_REQUEST['barcode'];
        }else{
            $barcode = false;
        }
        if(isset($_REQUEST['serial']) && $_REQUEST['serial'] != '' ){
            $serial = $_REQUEST['serial'];
        }else{
            $serial = false;
        }
        if(isset($_REQUEST['name']) && $_REQUEST['name'] != '' ){
            $name = $_REQUEST['name'];
        }else{
            $name = false;
        }
        $product = Stock::stockSearch($barcode, $serial, $name);
        $array['id'] = $product->id;
        $array['name'] = $product->name;
        if(isset($_REQUEST['quantity']) && $_REQUEST['quantity'] != ''){
            $array['quantity'] = $_REQUEST['quantity'];
        }else{
            $array['quantity'] = 1;
        }
        if(isset($_REQUEST['sell']) && $_REQUEST['sell'] != ''){
            $array['sell'] = $_REQUEST['sell'];
        }else{
            $array['sell'] = $product->sell;
        }
         $array['description'] = $product->description;
         $array['cost'] = $product->cost;

        $_SESSION['order'][$product->id] = $array;
        header('location: /order.php');
        break;

    case 'delete-order':
        if(!isset($_REQUEST['productId'])) header('location: /order.php');
        unset($_SESSION['order'][$_REQUEST['productId']]);
        header('location: /order.php');
        break;

    case 'save':
        $client = Client::getClient($_REQUEST['client']);

        $total = $_REQUEST['total'];
        $totalcost = $_REQUEST['totalCost'];
        mysqli_query($conn, "INSERT INTO `invoices`(`cost`, `sell`, `type`, `clientId`) VALUES (" . $totalcost . ", " . $total . ", 'cash', " . $client->id . ")");
        $invoice = Invoice::getInvoice(mysqli_insert_id($conn));
        foreach($_SESSION['order'] as $order){
            $item = Stock::getStock($order['id']);
            $quantleft = $item->quantity - $order['quantity'];
            mysqli_query($conn, "UPDATE `stock` SET `quantity`=" . $quantleft . " WHERE `id` = " . $item->id);
            mysqli_query($conn, "INSERT INTO `sales`(`invoiceId`, `productId`, `sell`, `clientId`, `cost`) VALUES (" . $invoice->id . ", " . $item->id .", " . $order['sell'] .", " . $client->id .", ". $order['cost'] . ")");
        }
        mysqli_query($conn, "UPDATE `clients` SET `buys`=" . $total . ", `payed`=" . $_REQUEST['paid'] . " WHERE `id` = " . $client->id);
        $_SESSION['order'] = null;
        header('location: /order.php');
        break;

    case 'client_delete':
        $sql = "DELETE FROM `clients` WHERE id = " . $_REQUEST['clientId'];
        mysqli_query($conn, $sql);
        header('location: /clients.php');
        break;

    case 'insert_client':
        $sql = "INSERT INTO `clients`(`name`, `email`, `tel`, `cell`, `address`, `username`, `password`, `note`) VALUES (
                '" . $_REQUEST['name'] . "', '" . $_REQUEST['email'] . "', '" . $_REQUEST['tel'] . "', '" . $_REQUEST['cell'] ."',
                '" . $_REQUEST['user'] ."','" . $_REQUEST['pass'] . "', '" . $_REQUEST['address'] ."', '" . $_REQUEST['note'] . "'
                )";
        mysqli_query($conn, $sql);
        header('location : /client.php?clientId=' . mysqli_insert_id($conn));
        break;

    case 'insert_stock':
        $sql = "INSERT INTO `stock`(`name`, `barcode`, `serial`, `description`, `cost`, `sell`, `quantity`, `supplier`) VALUES (
                '" . $_REQUEST['name'] . "', '" . $_REQUEST['barcode'] . "', '" . $_REQUEST['serial'] . "', '" . $_REQUEST['description'] . "',
                '" . $_REQUEST['cost'] . "', '" . $_REQUEST['sell'] . "', '" . $_REQUEST['quant'] . "', '" . $_REQUEST['supplier'] . "'
                )";

        mysqli_query($conn, $sql);
        header('location : /orders.php');

        break;

    case 'settings':
        foreach($_REQUEST as $key=>$input){
            if($key != 'action'){
                mysqli_query($conn, "UPDATE `settings` SET `value`=" . $input . " WHERE `name` = '" . $key . "'");
            }
        }
        header('location: /settings.php');

        break;

    case 'ClientPay':
        $client = Client::getClient($_REQUEST['clientId']);
        $cash = $client->payed + $_REQUEST['pay'];
        $sql = "UPDATE `clients` SET `payed`='" . $cash . "' WHERE clientId = " . $client->id;
        mysqli_query($conn, $sql);
        header('location : /client_invoices.php?clientId=' . $client->id);
        break;

    case 'edit-order':
        if(!isset($_REQUEST['productId'])) header('location: /order.php');
        $_SESSION['order'][$_REQUEST['productId']]['quantity'] = $_REQUEST['quant'];
        $_SESSION['order'][$_REQUEST['productId']]['sell'] = $_REQUEST['sell'];
        header('location: /order.php');
        break;

    case 'clear-orders':
        $_SESSION['order'] = null;
        header('location: /order.php');
        break;
}