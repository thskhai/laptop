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

    <h1>Gio hang</h1>
    <table border="1" width = "100%">
    <?php
    $tongtien =0;
    for($i=0;$i<count($_SESSION['giohang']);$i++){
            $gh = new giohang;
            $gh = $_SESSION['giohang'][$i];
            $tongtien += $gh->getAmount()* $gh->getPrice()
    ?>
        <tr>
        <td width="10%"><?=$gh->getId()?></td>
        <td width="10%"><img height="50px" width="50px" src="../view/image/<?=$gh->getImage()?>" alt=""></div>
        <td width="10%"><?=$gh->getName()?></td>
        <td width="10%"><?=$gh->getPrice()?></td>
        <td width="10%">x</td>
        <td width="10%">
            <a style="text-decoration: none" href="index.php?act=giam_spgh&id_giamgh=<?=$gh->getId()?>"><button>-</button></a>
        <?=$gh->getAmount()?>
        
            <a style="text-decoration: none" href="index.php?act=tang_spgh&id_tanggh=<?=$gh->getId()?>"><button>+</button></a>
        </td>
        <td width="10%">=</td>
        <td width="10%"><?= $gh->getAmount()* $gh->getPrice()?></td>
        <td width="10%">
            <a style="text-decoration-style: none;" href="index.php?act=del_spgh&id_delgh=<?=$gh->getId()?>"><button>Xoa</button></a>
       </td>
        </tr>
    <?php 
    }
        if($_SESSION['giohang'] != null){
    ?>
        <tr><td colspan="8" >Tông tiền: <strong style="color:red ;font-size:30px">$<?=$tongtien?></strong></td>
        <td ><a href="index.php?act=thanhtoan">
            <button   style="text-align:center; padding-right:0px; background-color: 
            green; font-size:20px; height:50px;width:170px ; color:azure">Thanh Toán</button>
        </a></td></tr>
    <?php
        }
    ?>
    </table>
    </div>
</body>
</html>