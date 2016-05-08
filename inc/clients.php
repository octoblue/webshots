<?php
include_once('config.php');
class Client {
    /**
     * @param $id
     * @return mixed
     */
    public static function getClient($id){
        $conn = Db::dbConnect();
        $sql = "SELECT * FROM clients WHERE id = " . $id;
        $query = mysqli_query($conn, $sql);
        return mysqli_fetch_object($query, 'Client');
    }

    public static function getClients($lastOrder = false, $order= 'id', $direction = 'ASC'){
        $conn = Db::dbConnect();
        $sql = "SELECT * FROM clients";
        if($lastOrder) $sql .= " WHERE lastOrder >= '" . $lastOrder . "'";
        $sql .= " ORDER BY `" . $order . "` " . $direction;
        $query = mysqli_query($conn, $sql);
        $array = Array();
        while($row=mysqli_fetch_object($query, 'Client')){
            $array[] = $row;
        }
        return $array;
    }

    public function invoices(){
        return Invoice::getInvoices(Array('clientId'=>$this->id));
    }

}
