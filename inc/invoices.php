<?php
include_once('config.php');
class Invoice {
    /**
     * @param $id
     * @return mixed
     */
    public static function getInvoice($id){
        $conn = Db::dbConnect();
        $sql = "SELECT * FROM invoices WHERE id = " . $id;
        $query = mysqli_query($conn, $sql);
        return mysqli_fetch_object($query);
    }
}
