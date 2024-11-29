<?php
include "../model/sanpham.php";
include "../model/giohang.php";
include "../model/user.php";
include "../model/thanhtoan.php";
class controller{
    
    public function danhsachsp(){
        $sp = new sanpham();
        return $sp->getDS_sanpham();
    }
    public function themsp(sanpham $sp){
        $sp1 = new sanpham();
        $sp1->themsp($sp);
    }
    public function xoasp(sanpham $sp){
        $sp1 = new sanpham();
        $sp1->xoasp($sp);
    }
    public function motsp(sanpham $sp){
        $sp1= new sanpham();
        return  $sp1->docmotsp($sp);
    }
    public function capnhat_motsp(sanpham $sp){
        $sp1 = new sanpham();
        $sp1->capnhatsp($sp);
    } 
    public function setgiohang(giohang $gh){
        $gh1 = new giohang();
        $vitri =  $gh1->kiemtra($gh) ;
        if($vitri==-1){
            $_SESSION['giohang'][]= $gh;
        } else{
           $sl = $_SESSION['giohang'][$vitri]->getAmount();
           $sl++;
           $_SESSION['giohang'][$vitri]->setAmount($sl);
        }  
    }
    public function xoagiohang(giohang $gh){
        $gh1 = new giohang();
        $vitri =  $gh1->kiemtra($gh) ;
        array_splice($_SESSION['giohang'],$vitri,1);
    }
    public function giamgiohang(giohang $gh){
        $gh1 = new giohang();
        $vitri =  $gh1->kiemtra($gh) ;
        $sl = $_SESSION['giohang'][$vitri]->getAmount();
        if( $sl <=1){
            echo("<script>alert('ko giam dc nua')</script>");
        }else{
            $sl--;
            $_SESSION['giohang'][$vitri]->setAmount($sl);
        } 
    }
    public function tanggiohang(giohang $gh){
        $gh1 = new giohang();
        $vitri =  $gh1->kiemtra($gh) ;
        $sl = $_SESSION['giohang'][$vitri]->getAmount();
        $sl++;
        $_SESSION['giohang'][$vitri]->setAmount($sl);
    }
    public function themuser(user $usr){
        $usr1 = new user();
        $kt = $usr1->docmot_user($usr);
        if($kt != null){
            echo ("<script>alert('da co user')</script>");
        }else{
            $usr1->them_user($usr);
        } 
    }
    public function dangnhap(user $usr){
        $usr1 = new user();
        $kt = $usr1->docmot_user($usr);
        if($kt == null){
            echo ("<script>alert('khong co user')</script>");
            return null;
        }else{
            return $kt;
        } 
    }
    public function donhang(donhang $dh){
        $donhang = new donhang();
        $donhang->them_donhang($dh);
    }
    public function them_chitietdh(chitietdh $ct){
        $chitiet = new chitietdh();
        $chitiet->them_ctdh($ct);
    }
}
