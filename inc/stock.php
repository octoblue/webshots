<?php
include_once('config.php');
class Stock {

public function getStock($id){
    $conn = Db::dbConnect();
    $sql = "SELECT * FROM stock WHERE id = " . $id;
    $query = mysqli_query($conn, $sql);
    return mysqli_fetch_object($query);
}

    public static function stockSearch($barcode=false, $serial=false, $name=false){
        $conn = Db::dbConnect();
        $sql = "SELECT * FROM stock WHERE ";
        if($barcode !== false && $serial !== false && $name !== false){ $sql .= "barcode = '" . $barcode . "' AND serial = '" . $serial . "' AND name = '" . $name . "'";}
        elseif($barcode !== false && $serial !== false ){
            $sql .= "barcode = '" . $barcode . "' AND serial = '" . $serial;
        }else{
            if($barcode !== false ) $sql .= "barcode = '" . $barcode . "'";
            if($serial !== false ) $sql .= "serial = '" . $serial . "'";
            if($name !== false ) $sql .= "name = '" . $name . "'";
        }
        $query = mysqli_query($conn, $sql);
        return mysqli_fetch_object($query);
    }

    public static function getStocks(){
        $conn = Db::dbConnect();
        $sql = "SELECT * FROM stock ORDER BY id ASC";
        $query = mysqli_query($conn, $sql);
        $data = Array();
        while($row = mysqli_fetch_object($query, 'Client')){
            $data[] = $row;
        }
        return $data;
    }

    public static function outOfStock($count = false){
        $conn = Db::dbConnect();
        if($count) {
            $sql = "SELECT count(*) as total FROM `stock` WHERE `quantity` <= `minQuant`";
            $query = mysqli_query($conn, $sql);
            $object = mysqli_fetch_object($query);
            return $object->total   ;
        }else{
            $sql = "SELECT * FROM `stock` WHERE `quantity` <= `minQuant`";
            $query = mysqli_query($conn, $sql);
            $data = Array();
            while($row = mysqli_fetch_object($query, 'Client')){
                $data[] = $row;
            }
            return $data;
        }

    }

}