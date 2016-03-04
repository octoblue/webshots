<?php
include_once('config.php');
class Sale {
    /**
     * @param $id
     * @return mixed
     */
    public static function getSale($id){
        $conn = Db::dbConnect();
        $sql = "SELECT * FROM sales WHERE id = " . $id;
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($query);
        return $row[0];
    }

    public static function sales($startDate=false, $endDate=false){
        if($startDate === false) $startDate = Date('Y-m-d');
        if($endDate === false) $endDate = $startDate;
        $conn = Db::dbConnect();
        $sql = "SELECT * FROM sales WHERE date BETWEEN '" . $startDate . " 00:00:00' AND '" .$endDate . " 23:59:59'";
        $query = mysqli_query($conn, $sql);
        $data = Array();
        while($row = mysqli_fetch_object($query)){
            $data[] = $row;
        }
        return $data;

    }

    public static function salesTotal($startDate=false, $endDate=false){
        $amount = Array();
        $sales = static::sales($startDate, $endDate);
        foreach($sales as $s){
            if(isset($amount['sell'])) {$amount['sell'] += $s->sell;}else{$amount['sell'] = $s->sell;}
            if(isset($amount['amount'])) {$amount['amount'] += $s->amount;}else{$amount['amount'] = $s->amount;}
            if(isset($amount['cost'])) {$amount['cost'] += $s->cost;}else{$amount['cost'] = $s->cost;}
            if(isset($amount['counter'])) {$amount['counter']++;}else{$amount['counter'] = 1;}
        }
        return $amount;
    }
}
