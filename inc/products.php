<?php
include_once('config.php');
class Product {
    /**
     * @param $id
     * @return mixed
     */
    public static function getProduct($id){
        $conn = Db::dbConnect();
        $sql = "SELECT * FROM products WHERE id = " . $id;
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($query);
        return $row[0];
    }

    public static function products($startDate=false, $endDate=false){
        if($startDate === false) $startDate = Date('Y-m-d');
        if($endDate === false) $endDate = $startDate;
        $conn = Db::dbConnect();
        $sql = "SELECT * FROM products WHERE date BETWEEN '" . $startDate . " 00:00:00' AND '" .$endDate . " 23:59:59'";
        $query = mysqli_query($conn, $sql);
        $data = Array();
        while($row = mysqli_fetch_object($query)){
            $data[] = $row;
        }
        return $data;

    }

    public static function productsTotal($startDate=false, $endDate=false){
        $amount = Array();
        $products = static::products($startDate, $endDate);
        foreach($products as $s){
            if(isset($amount['sell'])) {$amount['sell'] += $s->sell;}else{$amount['sell'] = $s->sell;}
            if(isset($amount['amount'])) {$amount['amount'] += $s->amount;}else{$amount['amount'] = $s->amount;}
            if(isset($amount['counter'])) {$amount['counter']++;}else{$amount['counter'] = 1;}
        }
        return $amount;
    }

    public static function productsCount($offset=false, $limit=false){
        $conn = Db::dbConnect();
        $sql = "SELECT productId, COUNT(*), SUM(sell) AS count FROM `invoices` WHERE type = 'sell' GROUP BY productId DESC";
        if(isset($offset)) $sql .= " LIMIT " . $limit . " OFFSET " . $offset;
        $query = mysqli_query($conn, $sql);
        $data = Array();
        while($row = mysqli_fetch_object($query)){
            $data[] = $row;
        }
        return $data;
    }

}
