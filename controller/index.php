<?php 
include "../controller/controller.php";

session_start();
// nêu tồn tại $_SESSION['giohang'] thì gán lại $_SESSION['giohang'] = empty
if(!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];
if(!isset($_SESSION['user'])) $_SESSION['user'] = [];
    if(isset($_REQUEST['act'])){
        $act= $_REQUEST['act'];
        switch($act){
            case "themsp":
                // include "../view/header.php";
                include "../view/menu.php";
                $valided = true;
                $id_sp_er= ""; $name_er=""; $price_er = "";
                $mount_er =""; $decribe_er =""; $sale_er = ""; $image_er = "";
                $ctrl = new controller();
                $danhsach = $ctrl->danhsachsp();
                include "../view/upload_sp.php";
                include "../view/footer.php";
                break;
            case "xl_themsp":
                // include "../view/header.php";
                include "../view/menu.php";
                $valided = true;
                $id_sp_er= ""; $name_er=""; $price_er = "";
                $mount_er =""; $decribe_er =""; $sale_er = ""; $image_er = "";        
                if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                    if(empty($_POST["id_sp"])){ 
                        $id_sp_er = "input id_sp";
                        $valided = false;
                    }
                    if(empty($_POST["name"])){ 
                        $name_er = "input Name";
                        $valided = false;
                    }
                    if(empty($_POST["price"])){ 
                        $price_er = "input price";
                        $valided = false;
                    }
                    if(empty($_POST["mount"])){ 
                        $mount_er = "input mount";
                        $valided = false;
                    }
                    if(empty($_POST["decribe"])){ 
                        $decribe_er = "input decribe";
                        $valided = false;
                    }
                    if(isset($_POST["sale"]) == ""){ 
                        $sale_er = "input sale";
                        $valided = false;
                    }
                    if($_FILES["image"]["error"] <> 0){ 
                        $image_er = "input image";
                        $valided = false;
                    }
                    if($valided){
                        $sp = new sanpham();
                        $sp->setId($_POST['id_sp']);
                        $sp->setName($_POST['name']);
                        $sp->setPrice($_POST['price']);
                        $sp->setMount($_POST['mount']); 
                        $sp->setDecribe($_POST['decribe']); 
                        $sp->setSale($_POST['sale']);
                        $hinhsp = basename($_FILES['image']['name']) ;
                        $sp->setImage($hinhsp);
                        $path = __DIR__ . './../view/image/';
                        $target_file = $path . $hinhsp;
                        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                        $ctrl = new controller();
                        $ctrl ->themsp($sp);
                    }
                }
                $ctrl = new controller();
                $danhsach = $ctrl->danhsachsp();
                include "../view/upload_sp.php";
                include "../view/footer.php";
                break;
            case "delsp":
                // include "../view/header.php";
                include "../view/menu.php";
                $valided = true;
                $id_sp_er= ""; $name_er=""; $price_er = "";
                $mount_er =""; $decribe_er =""; $sale_er = ""; $image_er = ""; 
                if(isset($_REQUEST["id_del"])){ 
                    $sp = new sanpham();
                    $id_del = $_REQUEST["id_del"];
                    $sp->setId($id_del);
                    $ctrl = new controller();
                    $ctrl ->xoasp($sp);
                }
                $ctrl = new controller();
                $danhsach = $ctrl->danhsachsp();
                include "../view/upload_sp.php";
                include "../view/footer.php";
                break;
           
            case "editsp":
                include "../view/menu.php";
                $valided = true;
                $id_sp_er= ""; $name_er=""; $price_er = "";
                $mount_er =""; $decribe_er =""; $sale_er = ""; $image_er = ""; 
                $motsp ="";
                if(isset($_REQUEST["id_edit"])){ 
                    $sp = new sanpham();
                    $sp->setId($_REQUEST["id_edit"]);
                    $ctrl = new controller();
                    $motsp = $ctrl->motsp($sp);
                }
                include "../view/editsp.php";
                include "../view/footer.php";
                break;
            case "xl_editsp":
                include "../view/menu.php";
                $valided = true;
                $id_sp_er= ""; $name_er=""; $price_er = "";
                $mount_er =""; $decribe_er =""; $sale_er = ""; $image_er = ""; 
                $motsp ="";
                if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                    if($valided){
                        $sp = new sanpham();
                        $sp->setId($_POST['id_sp']);
                        $sp->setName($_POST['name']);
                        $sp->setPrice($_POST['price']);
                        $sp->setMount($_POST['mount']); 
                        $sp->setDecribe($_POST['decribe']); 
                        $sp->setSale($_POST['sale']);
                        $hinhsp = $_POST['image_old'];
                        if(isset($_FILES['image_new'])){  
                            if( $_FILES['image_new']['name'] != ""){
                                $hinhsp = basename($_FILES['image_new']['name']) ;
                                $path = __DIR__ . './../view/image/';
                                $target_file = $path . $hinhsp;
                                //upload hinh moi
                                move_uploaded_file($_FILES['image_new']['tmp_name'], $target_file);
                                //xoa hinh cu
                                unlink("./../view/image/".$_POST['image_old'] );
                            }
                        }
                        $sp->setImage($hinhsp);
                        $ctrl = new controller();
                        $ctrl->capnhat_motsp($sp);
                        //chuyen ve trang themsp
                        header("Location: index.php?act=themsp");
                    }
                }
                break;
            case "giohang":
                // session_destroy();
                include "../view/menu.php";
                if(isset($_REQUEST["id_gh"])){
                    $id_gh = $_REQUEST["id_gh"];
                    $sp = new sanpham();
                    $sp->setId($id_gh);
                    $ctrl = new controller();
                    $motsp = $ctrl->motsp($sp);
                    $gh = new giohang();
                    $gh->setId($motsp[0]['id_sp']);
                    $gh->setName($motsp[0]['Name']);
                    $gh->setPrice($motsp[0]['Price']);
                    $gh->setAmount(1);
                    $gh->setImage($motsp[0]['image']);
                    $ctrl->setgiohang($gh);
                }
                include "../view/giohang.php";
                break;
            case "del_spgh":
                include "../view/menu.php";
                if(isset($_REQUEST["id_delgh"])){
                    $id_delgh = $_REQUEST["id_delgh"];
                    $gh = new giohang();
                    $gh->setId($id_delgh);
                    $ctrl = new controller();
                    $ctrl->xoagiohang($gh);
                }
                include "../view/giohang.php";
                break;
            case "giam_spgh":
                include "../view/menu.php";
                if(isset($_REQUEST["id_giamgh"])){
                    $id_giamgh = $_REQUEST["id_giamgh"];
                    $gh = new giohang();
                    $gh->setId($id_giamgh);
                    $ctrl = new controller();
                    $ctrl->giamgiohang($gh);
                }
                include "../view/giohang.php";
                break;
            case "tang_spgh":
                include "../view/menu.php";
                if(isset($_REQUEST["id_tanggh"])){
                    $id_tanggh = $_REQUEST["id_tanggh"];
                    $gh = new giohang();
                    $gh->setId($id_tanggh);
                    $ctrl = new controller();
                    $ctrl->tanggiohang($gh);
                }
                include "../view/giohang.php";
                break;
            case "dangnhap":
                include "../view/menu.php";
                $email_er="";$password_er="";
                include "../view/dangnhap.php";
                break;
            case "xl_dangnhap":
                include "../view/menu.php";
                $email_er="";$password_er="";
                $valided = true;
                if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                    if(empty($_POST["email"])){ 
                        $email_er = "input email";
                        $valided = false;
                    }
                    if(empty($_POST["password"])){ 
                        $password_er = "input password";
                        $valided = false;
                    }
                    if($valided){
                        $usr = new user();
                        $usr->setEmail($_POST["email"]);
                        $usr->setPassword($_POST["password"]);
                        $ctrl = new controller();
                        $kt =  $ctrl->dangnhap($usr);
                        if($kt != null){
                            $usr = $kt[0];
                            $_SESSION['user'][0] = $usr;   
                            if($usr['position'] == 0 ){
                                // echo ("<script>alert('admin')</script>");
                                header("Location: index.php?act=admin");
                            }elseif($usr['position'] == 1 ){
                                header("Location: index.php");
                                // echo ("<script>alert('user')</script>");
                            }else{
                                header("Location: index.php?act=dangnhap");
                            }                       
                        }
                    }
                }
                break;

           case "dangky":
                include "../view/menu.php";
                $username_er="";$password_er="";$password_fir_er="";
                $fullname_er =""; $email_er="";$phone_er=""; $address_er="";
                include "../view/dangky.php";
                break;
            case "xl_dangky":
                include "../view/menu.php";
                $username_er="";$password_er="";$password_fir_er="";
                $fullname_er =""; $email_er="";$phone_er=""; $address_er="";
                $valided = true;
                if ($_SERVER["REQUEST_METHOD"] == "POST") { 

                    if(empty($_POST["username"])){ 
                        $username_er = "input username";
                        $valided = false;
                    }
                    if(empty($_POST["password"])){ 
                        $password_er = "input password";
                        $valided = false;
                    }
                    if(empty($_POST["password_fir"])){ 
                        $password_fir_er = "input password_fir";
                        $valided = false;
                    }
                    if(isset($_POST["password"]) && isset($_POST["password_fir"])){ 
                        if($_POST["password"] != $_POST["password_fir"]){
                            $password_fir_er = "password not match";
                            $valided = false;
                        }
                    }
                    if(empty($_POST["fullname"])){ 
                        $fullname_er = "input fullname";
                        $valided = false;
                    }
                    if(empty($_POST["email"])){ 
                        $email_er = "input email";
                        $valided = false;
                    }
                    if(empty($_POST["phone"])){ 
                        $phone_er = "input phone";
                        $valided = false;
                    }
                    if(empty($_POST["address"])){ 
                        $address_er = "input address";
                        $valided = false;
                    }
                    if($valided){
                        $usr = new user();
                        $usr->setUsername($_POST["username"]);
                        $usr->setPassword($_POST["password"]);
                        $usr->setFullname($_POST["fullname"]);
                        $usr->setEmail($_POST["email"]);
                        $usr->setPhone($_POST["phone"]);
                        $usr->setAddress($_POST["address"]);
                        $usr->setPosition(1);
                        $ctrl = new controller();
                        $ctrl->themuser($usr);
                        header("Location: index.php?act=dangnhap");
                    }else{
                        include "../view/dangky.php";
                    }
                }
                break; 
            case "admin":
                include "../view/menu_admin.php";
                break;  
            case "thanhtoan": 
                if($_SESSION['user'] == null){
                     echo ("<script>alert('chưa dang nhap')</script>");
                    include "../view/menu.php";
                    include "../view/giohang.php";
                }else{
                    $date = getdate();
                    $tongdh =0;
                    $donhang = new donhang();
                    $chitietdh = new chitietdh();
                    //id đơn hang
                    $donhang->setId($date['year']+ rand(10,10000));
                    //id chitiet 
                    $id_chitiet = $date['year']+ rand(10,1000);
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    // $ngaydat 
                    $donhang->setNgaydat(date('d-m-y h:i:s'));
                    $ctrl = new controller();
                    for($i=0;$i<count($_SESSION['giohang']);$i++){
                        $tongdh += $_SESSION['giohang'][$i]->getPrice()*$_SESSION['giohang'][$i]->getAmount();
                    }
                    $donhang->setTongdh($tongdh);
                    $donhang->setUserid($_SESSION['user'][0]['id_user']);
                    $donhang->setTrangthai("chờ duyệt");
                    $ctrl->donhang($donhang);
                    for($j=0;$j<count($_SESSION['giohang']);$j++){
                        $chitietdh->setId_chitiet($id_chitiet + $j);
                        $chitietdh->setId_sp($_SESSION['giohang'][$j]->getId());
                        $chitietdh->setId_dh($donhang->getId());
                        $chitietdh->setSoluong($_SESSION['giohang'][$j]->getAmount());
                        $chitietdh->setTong($_SESSION['giohang'][$j]->getPrice()*$_SESSION['giohang'][$j]->getAmount());
                        
                        $ctrl->them_chitietdh($chitietdh);
                    }
                    include "../view/guimail.php";  
                    $_SESSION['giohang']=[];
                }
                break;
            case "thanhtoanthanhcong":
                include "../view/thanhtoan.php";
                break;
            case "dangxuat":
                $_SESSION['user'] = [];
                header("Location: index.php");
                break;
        }
    }else{
        include "../view/header.php";
        include "../view/menu.php";
        $ctrl = new controller();
        $danhsach = $ctrl->danhsachsp();
        include "../view/hienthisp.php";
        include "../view/footer.php";
    }

    