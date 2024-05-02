<?php

//Here is signup.classes.php is Modal, we inherit to the database connection class and, all the database contact is here
//!Database ile ilgili herhangi bir insert,update,delete islemi ni ise signup-contr.classes.php de yapariz

class Signup extends Dbh
{

    public function __construct()
    {
        parent::__construct();
    }
   

    protected function setUser(string $username, string $email, string $password):bool
    {
        try {
            $sql = "INSERT INTO users(username,email,password) VALUES(?,?,?)";

            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->conn->prepare($sql);
        
            
           // $result = $stmt->rowCount() > 0 ? true : false;
            //$stmt->execute([$username, $email, $hashedPwd]);
            if($stmt->execute([$username, $email, $hashedPwd]) === false)
            {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            $stmt = null;
            return true;
        } catch (PDOException $ex) 
        {
            echo $ex->getMessage();
        }
        
        return true;
      
    }

    //$username,$email controller da properties lerden gelecek
    protected function checkUser(string $username, string $email):bool
    {
      
        try {
            $sql = "SELECT * from users  where username = ? AND email = ?";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute([$username, $email]) === false)
        {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

      
        if($stmt->rowCount() > 0)
        {                          
            $resultCheck = false;
        }else 
        {
            $resultCheck = true;
        }
       
        return $resultCheck;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            $resultCheck = false;
        }

        return $resultCheck;


    }
}

?>