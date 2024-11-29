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
        <h1>Dang Nhap</h1>
        <form action="index.php?act=xl_dangnhap" method="post" enctype="multipart/form-data">
        Email: <br>
        <input type="text" name ="email" ><br>
        <br><span style="color: red;"><?=$email_er?></span><br>
        password: <br>
        <input type="password" name="password"><br> 
        <br><span style="color: red;"><?=$password_er?></span><br>
        <button>Submit</button><button><a href="index.php?act=dangky">Dang ky</a></button>
        </form>
    </div>
</body>
</html>



