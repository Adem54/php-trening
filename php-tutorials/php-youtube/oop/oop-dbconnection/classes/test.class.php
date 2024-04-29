<?php


class Test extends Dbh 
{
    public function getUsers()
    {
        $sql = "SELECT * FROM user";//tablo adini buyuk yazinca sorun yasadik
        $stmt = $this->conn->query($sql);

        // $users = $stmt->fetchAll();
        // var_dump($users);
     
        while ($row = $stmt->fetch() ) 
        {
            # code...
            if($row["username"])
            {
                echo $row["username"]. "<br>";
            }
           
        }
    }
}



?>