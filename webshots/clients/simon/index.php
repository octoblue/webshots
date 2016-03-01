<?php
$username = "webshots";
$password = "Webshots1234";
$hostname = "localhost";

//connection to the database
$link = mysql_connect($hostname, $username, $password)
or die("Unable to connect to MySQL");
$db_selected = mysql_select_db('webshots', $link);
if (!$db_selected) {die ('Can\'t use foo : ' . mysql_error());}

    switch($_REQUEST['action']){

        case 'save':
            if($_REQUEST['sqfrom']=='') {
                $query = "INSERT INTO `products`(`name`, `barcode`, `serial`, `description`, `cost`, `sell`, `quantity`, `supplier`) VALUES ('" . $_REQUEST['name'] . "', '" . $_REQUEST['barcode'] . "', '" . $_REQUEST['serial'] . "', '" . $_REQUEST['description'] . "', '" . $_REQUEST['cost'] . "', '" . $_REQUEST['sell'] . "', '" . $_REQUEST['quantity'] . "', '" . $_REQUEST['supplier'] . "')";
                $result = mysql_query($query);
            }
            else {
                $incfrom = preg_split('/(?=[0-9])(?<=[a-z])/i', $_REQUEST['sqfrom']);
                $incto = preg_split('/(?=[0-9])(?<=[a-z])/i', $_REQUEST['sqto']);
                $str = '';
                for ($x = 0; $x < count($incfrom) - 1; $x++) {
                    $str .= $incfrom[$x];
                }
                for ($i = end($incfrom); $i <= end($incto); $i++) {
                    $serial = $str . $i;
                    $query = "INSERT INTO `products`(`name`, `barcode`, `serial`, `description`, `cost`, `sell`, `quantity`, `supplier`) VALUES ('" . $_REQUEST['name'] . "', '" . $_REQUEST['barcode'] . "', '" . $serial . "', '" . $_REQUEST['description'] . "', '" . $_REQUEST['cost'] . "', '" . $_REQUEST['sell'] . "', '" . $_REQUEST['quantity'] . "', '" . $_REQUEST['supplier'] . "')";
                    $result = mysql_query($query);

                }
            }
            header('location:/clients/simon');
            exit;

        Default:
            ?>
            <style>
                input{margin:0 0 0 20px;}
            </style>
            <form method="GET" action="">
                <input type="hidden" name="action" value="save">
                Name <input type="text" name="name" autofocus/> <br><br>
                Barcode <input type="text" name="barcode" /> <br><br>
                Serial <input type="text" name="serial" /> <br><br>
                Description  <input type="text" name="description" /> <br><br>
                Cost<input type="text" name="cost" /> <br><br>
                Sell    <input type="text" name="sell" /> <br><br>
                Quantity    <input type="text" name="quantity" /> <br><br>
                Supplier   <input type="text" name="supplier" /><br><br>
                Sequence <input type="text" name="sqfrom" />  &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="sqto" />

            <input type="submit" value="Save">
            </form>
<?php

            exit;


        }




