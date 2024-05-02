<?php ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--Signup -->
    <h4>Signup</h4>
    <form action="includes/signup.inc.php" method="POST">
        <input type="text" name="uid" placeholder="Username">
        <input type="password" name="pass" placeholder="Password"  >
        <input type="password" name="pass_again" placeholder="Password again">
        <input type="email" name="email" placeholder="Email..">
        <input type="hidden" name="act" value="signup">
        <button type="submit" name="submit" >Signup</button>
    </form>

    <br><br>
    <hr>

    <h4>SignIn</h4>

    <form action="includes/login.inc.php" method="POST">
        <input type="text" name="uid" placeholder="Username">
        <input type="password" name="pass" placeholder="Password"  >
        <input type="hidden" name="act" value="signin">
        <button type="submit" name="submit">Login</button>
    </form>
</body>
</html>
<!--
    !LOGIN BASARI ILE GERCEKLESINCEKI INDEX.PHP DE LOGIC NASIL ISLER, LOGOUT MANTIGI NEDIR
    Burdaki olayin ozeti sudur ki, kullanici login olduktan sonra artik biz kullaniciyi session uzerinden uygulama boyunca erisebildigmiz icin, index.php de session da n user var mi diye kontrol ederiz ve eger user var ise o zaman giris yapmistir o zaman da artik signup yerine logout u goster deriz ve logout butonunu logout.php ye yonlendiririz, logout olauyi da sudur, logout a tklaninca session icindeki tum bilgiler silinip session sonlandirilir, ve tekrar index.php ye yonlendirilir ve tekrardan logout butonu yerne artik login ya da signup butounu gozukecektir

 -->