<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <nav class="menu">
        <ul>
            <li><a href="index.php" target="page">TRANG CHỦ</a>
                <ul class="submenu">
                    <li><a href="#">abc</a></li>
                    <li><a href="#">abc</a></li>
                    <li><a href="#">abc</a></li>
                </ul>
            </li>           
            <li><a href="index.php?act=dangnhap" target="page">DANGNHAP</a> </li>           
            <li><a href="index.php?act=dangxuat" target="page">DANGXUAT</a></li>                 
            <li><a href="index.php?act=giohang" target="page">GIO HANG</a></li>
            <?php 
            if($_SESSION['user'] != null){
            ?>
                <li><?=$_SESSION['user'][0][1]?></li>
            <?php
            }
            ?>
            
       </ul>
    </nav>
    </div>
</body>
</html>