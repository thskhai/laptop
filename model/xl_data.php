<?php
include "../model/database.php";
class xl_data extends database{
    //read data
    public function __construct(){}
    function readitem($sql){
        $result = $this->connection_database()->query($sql);
        $danhsach = $result->fetchAll();
        return $danhsach;
       }
    // execute data
    function execute_item($sql){
        $conn = new database();
        $conn->connection_database()->query($sql);
    }
}