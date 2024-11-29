<?php 
    class donhang {
        private $id_dh;
        private  $userId;
        private $tongdh;
        private $ngaydat;
        private $trangthai;

        public function __construct(){
        }
        public function setTrangthai($trangthai){
            return  $this->trangthai = $trangthai;
        }
        public function getTrangthai(){
            return  $this->trangthai;
        }
        public function setNgaydat($ngaydat){
            return  $this->ngaydat = $ngaydat;
        }
        public function getNgaydat(){
            return  $this->ngaydat;
        }
        public function setTongdh($tongdh){
            return  $this->tongdh = $tongdh;
        }
        public function getTongdh(){
            return  $this->tongdh;
        }
        public function setUserid($userid){
            return  $this->userId = $userid;
        }
        public function getUserid(){
            return  $this->userId;
        }
        public function setId($id_dh){
            return  $this->id_dh = $id_dh;
        }
        public function getId(){
            return  $this->id_dh;
        }

        public function them_donhang(donhang $dh){
            $xl = new xl_data();
            $sql = "INSERT INTO `donhang` (`id_dh`, `id_user`, `tongdh`, `ngaydat`,`trangthai`) 
            VALUES (".$dh->getId().", 
            ".$dh->getUserid().", 
            ".$dh->getTongdh().", 
            '".$dh->getNgaydat()."',
            '".$dh->getTrangthai()."')";
            $xl->execute_item($sql);
        }
    }

    
    class chitietdh{
        private  $id_chitiet;
        private $id_sp;
        private $id_dh;
        private $soluong;
        private $tong;

        public function __construct(){
        }
        public function setTong($tong){
            return  $this->tong = $tong;
        }
        public function getTong(){
            return  $this->tong;
        }
        public function setSoluong($soluong){
            return  $this->soluong = $soluong;
        }
        public function getSoluong(){
            return  $this->soluong;
        }
        public function setId_dh($id_dh){
            return  $this->id_dh = $id_dh;
        }
        public function getId_dh(){
            return  $this->id_dh;
        }
        public function setId_sp($id_sp){
            return  $this->id_sp = $id_sp;
        }
        public function getId_sp(){
            return  $this->id_sp;
        }
        public function setId_chitiet($id_chitiet){
            return  $this->id_chitiet = $id_chitiet;
        }
        public function getId_chitiet(){
            return  $this->id_chitiet;
        }

        public function them_ctdh(chitietdh $ct){
            $xl = new xl_data();
            $sql = "INSERT INTO `dh_chitiet`(`id_chitiet`, `id_sp`, `id_dh`, `soluong`, `tong_dh`) 
            VALUES (".$ct->getId_chitiet().",
            ".$ct->getId_sp().",
            ".$ct->getId_dh().",
            ".$ct->getSoluong().",
            ".$ct->getTong().")";
            $xl->execute_item($sql);
        }

    }
?>