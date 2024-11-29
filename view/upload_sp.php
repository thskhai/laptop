
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <H1>Upload sanpham</H1>
        <form action="index.php?act=xl_themsp" method="post" enctype="multipart/form-data">
        Masp : <br><input type="number" name="id_sp" value="">
        <br><span style="color: red;"><?=$id_sp_er?></span><br>
        Name : <br><input type="text" name="name" value="" >
        <br><span style="color: red;"><?=$name_er?></span><br>
        Price : <br><input type="number" min =1  name="price" value="" >
        <br><span style="color: red;"><?=$price_er?></span><br>
        Mount : <br><input type="text" name="mount" value="" >
        <br><span style="color: red;"><?=$mount_er?></span><br>
        Image : <br><input type="file" name="image" >
        <br><span style="color: red;"><?=$image_er?></span><br>
        Sale : 
        <select name="sale" >
            <option value="">choose sale</option>
            <option value="0">0%</option>
            <option value="10">10%</option>
            <option value="20">20%</option>
            <option value="30">30%</option>
            <option value="50">50%</option>
        </select>
        <br><span style="color: red;"><?=$sale_er?></span><br>
        Decribe : <br> <textarea name="decribe" rows="4" cols="50"></textarea> 
        <br><span style="color: red;"><?=$decribe_er?></span><br>
        <button type="submit" >Submit</button>
        </form>


        <h1>danh sach san pham</h1>
    <table border="1" width="100%">
        <thead>
            <tr>
                <td>STT</td>
                <td>Masp</td>
                <td>Tensp</td>
                <td>Hinh</td>
                <td>Gia</td>
                <td>Mô tả</td>   
                <td>Edit</td>   
                <td>Xoa</td>            
            </tr>
        </thead>
        <tbody>
        <?php
        for($i=0;$i<count($danhsach);$i++){
            $rc = $danhsach[$i];
        ?>
        <tr>
            <td><?=$i +1 ?></td>
            <td><?=$rc['id_sp'] ?></td>
            <td><?=$rc['Name'] ?></td>
            <td><img height="30px" width="30px" src="../view/image/<?=$rc['image'] ?>"></td>
            <td><?=$rc['Price'] ?></td>
            <td><?=$rc['Decribe'] ?></td> 
            <td><a href="index.php?act=editsp&id_edit=<?=$rc['id_sp'] ?>">Edit</a></td>   
            <td><a href="index.php?act=delsp&id_del=<?=$rc['id_sp'] ?>">Xoa</a></td>     
        </tr>
        <?php 
        }
        ?>
        </tbody>
    </table>
    

    </div>

   
</body>
</html>