<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once("db.php");

//GONDERILEN API METHOD 

    //Post islemi yapilmis ise eger..datalari alalim...
if(isset($_GET["mode"]))
{
    switch ($_GET["mode"]) {
        case 'insert':
            insertData();
            break;
        case 'read':
            readData();
            break;    
        default:
            # code...
            break;
    }
}


function readData()
{
    global $conn;
  //  static $conn;//icerdeki son degeri disarda da gecerli olmasini istersek boyle yapariz
    try {
        $sql = "SELECT * from user ORDER BY id DESC LIMIT 6";
        $stmt = $conn->query($sql);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

      //  header('Content-Type: application/json'); Bunu kullanirsak direk javascript objesi larak gider oryay
        echo json_encode($results);
    } catch (PDOException $ex) {
        // Setting HTTP response code is a good practice for error handling

        echo json_encode(['error' => $ex->getMessage()]);
    }

}  

function insertData()
{
    global $conn;
    //Post islemi yapilmis ise eger..datalari alalim...
if(isset($_POST))
{
    $username =$_POST["username"];
    $email =$_POST["email"];
    $passord =$_POST["password"];

    if($username !== "" && $email !== "" && $passord !== "" )
    {
        try {

              //  $sql = "INSERT INTO user (username,email,password) VALUES(:username, :email, :password)";
                $sql = "INSERT INTO user (username,email,password) VALUES(?,?,?)";
                 $stmt = $conn->prepare($sql);
     /*         $stmt->bindParam(':username', $username);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $passord);
                $stmt->execute();  */

       /*     $stmt->execute(
                [
                 ":username"=>$username,   
                 ":email"=>$email,   
                 ":password"=>$passord,   
                ]
            ); */

         //    $stmt->execute([$username,$email,$passord]);
             $success = $stmt->execute([$username, $email, $passord]);

            // Check if the insert was successful
        //    if ($success) {
                if ($stmt->rowCount() > 0) {
                echo json_encode(["msg"=>"Data added succesfully","username"=>$username, "email"=>$email, "password"=>$passord]);
            } else {
                echo "Error: Could not execute the query.";
            }
            } catch (PDOException $ex) 
            {
                echo $e->getMessage();
            }
    }else{
          echo "fill in the blanks";  
    }
}
}




/*
!Biz burayi api olarak endpoint gibi kullanip da ajax uzerinden buraya post-get request gonderir isek eger o zaman, biz istegin gonderildigi index.php ye tekrar bu apiden response gondereek api-endpoint in result unu debug-check edebiliriz
Yok ama biz direk olarak 
*/



//echo json_encode($data, true);
// You can now process $data, e.g., insert it into a database, etc.
// For demonstration, we'll just echo it back

//echo json_encode($data);

?>