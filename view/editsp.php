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
        <h1>Edit San Pham</h1>
        <form action="index.php?act=xl_editsp" method="post" enctype="multipart/form-data">
        Masp : <br><input type="number" name="id_sp" value="<?=$motsp[0]["id_sp"]?>">
        <br><span style="color: red;"><?=$id_sp_er?></span><br>
        Name : <br><input type="text" name="name" value="<?=$motsp[0]["Name"]?>" >
        <br><span style="color: red;"><?=$name_er?></span><br>
        Price : <br><input type="number" min =1  name="price" value="<?=$motsp[0]["Price"]?>" >
        <br><span style="color: red;"><?=$price_er?></span><br>
        Mount : <br><input type="text" name="mount" value="<?=$motsp[0]["Mount"]?>" >
        <br><span style="color: red;"><?=$mount_er?></span><br>
        <img height="50px" width="70px" src = "../view/image/<?= $motsp[0]["image"] ?>"><br>
        <input hidden  type="text" name="image_old" value="<?= $motsp[0]["image"] ?>">
        Image : <br><input type="file" name="image_new" >
        <br><span style="color: red;"><?=$image_er?></span><br>
        Sale : 
        <select name="sale"  >
            <option value="">choose sale</option>
            <?php
                $mang = [0,10,20,30,50];
                for($i =0;$i<count($mang);$i++){
                    if($mang[$i] == $motSp[0]['Sale']){
            ?>
                        <option  selected value="<?=$mang[$i]?>"><?=$mang[$i]?>%</option>
            <?php  }else{  ?>
                        <option   value="<?=$mang[$i]?>"><?=$mang[$i]?>%</option>
            <?php
                    }
                }
            ?>    
        </select>
        <br><span style="color: red;"><?=$sale_er?></span><br>
        Decribe : <br> <textarea name="decribe" rows="4" cols="50"><?= $motsp[0]["Decribe"] ?></textarea> 
        <br><span style="color: red;"><?=$decribe_er?></span><br>
        <button type="submit" >Submit</button>
        </form>
    </div>
</body>
</html>