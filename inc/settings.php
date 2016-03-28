<?php
include_once('config.php');
class Setting {

    public function getSettingByName($name){
        $conn = Db::dbConnect();
        $sql = "SELECT * FROM settings WHERE name = '" . $name . "'";
        $query = mysqli_query($conn, $sql);
        return mysqli_fetch_object($query);
    }


}