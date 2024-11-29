<?php

    class giohang{
        private $id_sp = 0;
        private $Name = "";
        private $Price = 0;
        private $Amount = 0;
        private $Image = "";

        public function setPrice($Price){
            return  $this->Price = $Price;
        }
        public function getPrice(){
            return  $this->Price;
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
        public function setAmount($Amount){
            return  $this->Amount = $Amount;
        }
        public function getAmount(){
            return  $this->Amount;
        }
        public function setImage($Image){
            return  $this->Image = $Image;
        }
        public function getImage(){
            return  $this->Image;
        }

        public function kiemtra(giohang $gh){
            for($i = 0 ; $i < sizeof($_SESSION['giohang']) ; $i++){
                if ($_SESSION['giohang'][$i]->getId() == $gh->getId()){
                    return $i;
                }
           }
           return -1;
        }
    }
