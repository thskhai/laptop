<?php
    include "../model/xl_data.php";
class sanpham {
        private $id_sp = 0;
        private $Name = "";
        private $Price = 0;
        private $Date_import = "";
        private $Viewsp = 0;
        private $Decribe = "";
        private $Mount = 0;
        private $Sale = 0;
        private $Image = "";

        public function __construct(){
        }
        public function setPrice($Price){
            return  $this->Price = $Price;
        }
        public function getPrice(){
            return  $this->Price;
        }
        public function setImage($Image){
            return  $this->Image = $Image;
        }
        public function getImage(){
            return  $this->Image;
        }
        public function setSale($Sale){
            return  $this->Sale = $Sale;
        }
        public function getSale(){
            return  $this->Sale;
        }

        public function setMount($Mount){
            return  $this->Mount = $Mount;
        }
        public function getMount(){
            return  $this->Mount;
        }
        public function setDecribe($Decribe){
            return  $this->Decribe = $Decribe;
        }
        public function getDecride(){
            return  $this->Decribe;
        }
        public function setViewsp($Viewsp){
            return  $this->Viewsp = $Viewsp;
        }
        public function getViewsp(){
            return  $this->Viewsp;
        }
        public function setDate_import($Date_import){
            return  $this->Date_import = $Date_import;
        }
        public function getDate_import(){
            return  $this->Date_import;
        }
        public function setName($Name){
            return  $this->Name = $Name;
        }
        public function getName(){
            return  $this->Name;
        }
        public function setId($id_sp){
            return $this->id_sp = $id_sp;
        }
        public function getId(){
            return $this->id_sp;
        }

        public function getDS_sanpham(){
            $xl = new xl_data();
            $sql = "SELECT * FROM `sanpham`";
            $results = $xl->readitem($sql);
            return $results;
        }

        public function themsp(sanpham $sp){
            $xl = new xl_data();
            $sql = "INSERT INTO `sanpham` (`id_sp`, `Name`, `Price`, `Date_import`, `Viewsp`, `Decribe`, `Mount`, `Sale`, `image`)  
            VALUES (".$sp->getId().", '".$sp->getName()."', ".$sp->getPrice().", '".$sp->getDate_import()."', 0, '".$sp->getDecride()."', ".$sp->getMount().", ".$sp->getSale().", '".$sp->getImage()."');";
            $xl->execute_item($sql);
        }
        public function xoasp(sanpham $sp){
            $xl = new xl_data();
            $sql = "delete from sanpham where id_sp = ". $sp->getId();
            $xl->execute_item($sql);
        }
        public function docmotsp(sanpham $sp){
            $xl= new xl_data();
            $sql = "select * from sanpham where id_sp = ". $sp->getId();
            $result = $xl->readitem($sql);
            return $result;
        }
        function capnhatsp(sanpham $sp){
            $xl = new xl_data();
            $sql =  "Update sanpham 
            Set Name='". $sp->getName() ."', 
            Price=". $sp->getPrice() .",
            Sale=". $sp->getSale() .",
            Mount=". $sp->getMount().",
            image='".$sp->getImage()."',
            Decribe ='".$sp->getDecride()."' where id_sp = ".$sp->getID();
            $xl->execute_item($sql);  
        }
}

?>