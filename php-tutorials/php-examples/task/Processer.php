<?php

class Processer extends Database implements ProcessInterface {

    function add(?string $email, ?string $subject, ?string $text , ?DateTime $sendDateTime=null ) 
    {
        $insert = $this->db->prepare("INSERT INTO email (email,subject,text, sendDateTime) VALUE(?,?,?,?)");
       $create = $insert->execute(array($email, $subject, $text, $sendDateTime));
       //if($insert->rowCount() > 0){
        if($create)
        {
         echo "Task is added succesfully";
       }else{
        echo "Task adding is failed";
       }
    }
    
    /**
     */
    function run() {
    }
}

?>