<?php
include_once('config.php');
class Supplier {
    /**
     * @param $id
     * @return mixed
     */
    public static function getSupplier($id){
        $conn = Db::dbConnect();
        $sql = "SELECT * FROM suppliers WHERE id = " . $id;
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_object($query);
        return $row;
    }

    public static function getSuppliers(){
        $conn = Db::dbConnect();
        $sql = "SELECT * FROM suppliers";
        $query = mysqli_query($conn, $sql);
        $array = Array();
        while($row=mysqli_fetch_object($query, 'Supplier')){
            $array[] = $row;
        }
        return $array;
    }
}
