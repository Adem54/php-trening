<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


try {

    // Get JSON POST body

$conn = new PDO("mysql:host=localhost;dbname=testdb", "adem", "adem");
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// $sql = "INSERT INTO user (username,email,password) VALUES(:username, :email, :password)";
// $stmt = $conn->prepare($sql);
// $stmt->bindParam(':username', $username);
// $stmt->bindParam(':email', $email);
// $stmt->bindParam(':password', $password);
// $stmt->execute();

  } catch(PDOException $e) {
    echo $e->getMessage();
  }


?>