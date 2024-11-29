<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/css/style.css">
    <link rel="stylesheet" href="../view/css/sanpham.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <div>
    <?php 
    for($i=0;$i<count($danhsach);$i++){
        $rc = $danhsach[$i];
    ?>
    <div class="sanpham">
        <div>
            <img src="../view/image/<?=$rc['image']?>">
        </div>
        <p><?=$rc['Name']?></p>
            <p>$<span><?=$rc['Price']?></span></p>
            <lable hidden><?=$rc['id_sp']?>
            </lable><br>
            <button><a href="index.php?act=giohang&id_gh=<?=$rc['id_sp']?>">Mua Hàng</a></button>
            <button><a href="#">CTSP</a></button>
    </div>
    <?php
    }
    ?>

    </div>
    </div>

</body>
</html>