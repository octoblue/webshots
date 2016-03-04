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
}
