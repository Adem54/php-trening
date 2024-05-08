<?php 

$page = "";
if($_GET)
{
    $page = $_GET["page"];
}

switch ($page) {
    case 'home':
        echo "<br><h2>Home page</h2><br>";
        //require_once(home.php)
        break;
    case 'about':
        echo "<br><h2>About page</h2><br>";
        //require_once(about.php)
        break;
    case 'profile':
        echo "<br><h2>Profile page</h2><br>";
        //require_once(profile.php)
        break;        
    default:
        echo "<br><h2>Home page</h2><br>";
        break;
}

//!Biz profile e tiklayinca veya diger home,about a tiklayinca adres cubugunda bu sekilde geliyor =>http://localhost/main/php-trening/php-tutorials/php-youtube/htaccess/index.php?page=profile, ama biz bunun boyle degil de daha ceo uyumlu olmasi icin su sekilde olmasini istiyoruz =>http://localhost/main/php-trening/php-tutorials/php-youtube/htaccess/profile


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <li><a href="http://localhost/main/php-trening/php-tutorials/php-youtube/htaccess/home">Home</a></li>
        <li><a href="http://localhost/main/php-trening/php-tutorials/php-youtube/htaccess/index.php?page=about" >About</a></li>
        <li><a href="http://localhost/main/php-trening/php-tutorials/php-youtube/htaccess/index.php?page=profile">Profile</a></li>
    </ul>
</body>
</html>

<!--!Biz normalde sayfalari yaparken menu deki her bir menu elemanini bir dosya icinde tutup hepsini index.php de require ederek switch-case de cagirarak calistiririz bunu unutmayalim...BURDA MANTIK HEP BU SEKILDEDIR...  -->