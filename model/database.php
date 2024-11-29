<?php 
    class database{
        private $servername = "b3t4uitpad93nstjpi6b-mysql.services.clever-cloud.com";
        private $username="uyhs2oprdrciwh2k";
        private $password="KNZ6Qh4nKz6aIspK0Oad";
        private $databasename="b3t4uitpad93nstjpi6b";
        protected $conn = null;

    function connection_database(){
        try{
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->databasename",
                            $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);   
        }catch(PDOException $e){   
            throw $e;
        }
            return $conn;
        }
    }

?>