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

    public static function getInvoices($filters = false){
        $conn = Db::dbConnect();
        $sql = "SELECT * FROM invoices";
        if($filters){
            $i=0;
            $sql .= ' WHERE ';
            foreach($filters as $key=>$value){
                if ($i != 0) $sql .= " AND ";
                $sql .= $key . " = '" . $value . "'";
                $i++;
            }
        }
        $query = mysqli_query($conn, $sql);
        $array = Array();
        while($row=mysqli_fetch_object($query, 'Invoice')){
            $array[] = $row;
        }
        return $array;
    }
}
