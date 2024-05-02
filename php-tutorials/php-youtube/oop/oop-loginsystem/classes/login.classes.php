<?php

class Login extends Dbh
{
    public function __construct()
    {
        parent::__construct();
    }


    protected function getUser(string $username, string $password)
    {
        $sql = "SELECT * from users  where username = ?";
        $stmt = $this->conn->prepare($sql);

       // $stmt->execute([$username, $password]);
        if($stmt->execute([$username]) === false)
        {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() > 0)
        {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $hashedPass = $result[0]["password"];
            if (password_verify($password, $hashedPass)) {
                echo 'Login successful!';
                // Proceed with login success (e.g., setting session variables, redirecting, etc.)
                $sql = "SELECT * from users  where username = ? OR email = ? OR password = ?";
                $stmt = $this->conn->prepare($sql);
                if(!$stmt->execute(array($username, $result["email"], $password )))
                {
                    $stmt = null;
                    header("location: ../index.php?error=stmtfailed");
                      exit();
                }
            } else {
                echo 'Invalid password!';
                // Handle the error (wrong password)
                $stmt = null;
                header("location: ../index.php?error=wrongpassword");
                exit();
            } 
        }else //<=0 
        {
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //Artik buraya girince, yani biz user i database imizde bulduk bundan sonra o user login icin tum gereklilikleri tamamladi, o zaman hemen sessioni bsalat ve user a ait verileri session a kaydet
        session_start();
        $_SESSION["userid"] = $user[0]["id"];
        $_SESSION["username"] = $user[0]["username"];
        $_SESSION["useremail"] = $user[0]["email"];
        
        
    }
}    

?>