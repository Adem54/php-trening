<?php


/*
Indexes are used to find values within a specific column more quickliy
Mysql normally searches sequentially(respectively-sirasi ile) throught a column
The longer the column, the more expensive the operation is 
update takes more time, select takes less time

!Normalde sql de sirasi ile arama  yaptigi icin data cok buyudug zaman cok ciddi zaman alacaktir, iste o zaman indexer kullanmak kritik oneme sahiptir ve hatirli sayilir derecede bir performans artiis saglayacaktir

Customers tablosunda genellikle customer_id,

!Simdi dostum eger ornegin 200.000 kayitli bir tablon var ise ve o tabloda name isminde bir column var ise ve sen o name column un uniq degil ise ve kullanici bir query yazdi ve select * from products where name="Product1"; ve bu product1 uniq olmadigindan dolayi her harukarda gidecek 200.000 kayidin hepsini tek tek scann-tarayacak...Ama eger ki name kolonu da uniq olursa, yani bir index atanirsa o zaman name kolonunu taramaya baslar ve eger 5000. sira da aradigi name i bulursa artik 195.000 kolona bakamadan query i oracikta bitirir neden cunku biliyor ki , buldugu deger uniq oldugundan bu degern aynisindan olma ihtimali yok....ISTE BIZIM BUNU SQL E ANLTAMABILMEMIZ ICIN BIZIM INDEXER OLUSTURMAMZ GEREKIYOR
*/

//host-servername(yani bizm pc mizde ise localhosttur) 
//

$dbname = "testdb";
$username = "adem";
$password = "adem";
$servername = "localhost";

/*
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
*/

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "<h2>Connected successfully!!!!</h2>";

$result = $conn->query("SELECT * FROM products");
while ($row = $result->fetch_assoc())//!Bu sira ile ilk data var ise true gelir ve hemen o gelen data yi $row degiskenine atama yapar.. ve nereye kadar devam eder sirasi ile query nin sagladigi kayit bitene kadar..
{
    echo $row['name']."<br />\n";
}

echo "<br><br>";

// Perform query
if ($result2 = $conn -> query("SELECT * FROM products where id=3")) {
    echo "Returned rows are: " . $result2 -> num_rows;
    // Free result set
    $result2 -> free_result();
    

  }

  echo "<br><hr><br>";
  $myResults = mysqli_query($conn,"SELECT * FROM products"); 
  if( $myResults === false)
  {
    echo mysqli_error($conn);
  }else
  {
    $data = mysqli_fetch_all($myResults, MYSQLI_ASSOC);
    var_dump($data);
  }
  




?>