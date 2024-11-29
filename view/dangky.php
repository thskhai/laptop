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
        <h1>dang ky</h1>
        <form action="index.php?act=xl_dangky" method="post" enctype="multipart/form-data">
        Username: <br> <input type="text" name="username" value=""><br>
        <br><span style="color: red;"><?=$username_er?></span><br>
        Password: <br> <input type="password" name="password" value=""><br>
        <br><span style="color: red;"><?=$password_er?></span><br>
        Password_fir: <br> <input type="password" name="password_fir" value=""><br>
        <br><span style="color: red;"><?=$password_fir_er?></span><br>
        fullname :<br> <input type="text" name="fullname" value=""><br>
        <br><span style="color: red;"><?=$fullname_er?></span><br>
        email :<br> <input type="email" name="email" value=""><br>
        <br><span style="color: red;"><?=$email_er?></span><br>
        phone :<br> <input type="number" name="phone" value="" ><br>
        <br><span style="color: red;"><?=$phone_er?></span><br>
        address :<br> <input type="text" name="address" value=""><br>
        <br><span style="color: red;"><?=$address_er?></span><br>
        <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>