<?php

$dbname = "testdb";
$username = "adem";
$password = "adem";
$servername = "localhost";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "<h2>Connected successfully!!!!</h2>";

//includes altina biz, database.php dosyamizi koydugmz icin bu dosyayi korumak isteriz disardan erislmesini istemeyiz ve browser uzerinden de calistirilmaya calisilip da dosya download edilmeye calisilmamasi icin ne olur ne olmaz diye includes/.htaccess dosyasi icinde Deny from all yazarsak o zaman, iste includes altindaki hic bir dosya browser uzerinden url de girilerek calistirilamaz
//!.htaccess apache nin bize sundugu url server in url konfigurasyonudur

?>