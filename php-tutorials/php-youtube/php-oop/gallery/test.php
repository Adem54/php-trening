<?php

echo "hello";

    
$arr = ["name"=>"Adem", "email"=>"adem@gmail.com", "password"=>"12345"];

//implode -array to string - string to array explode

$arr_keys = array_keys($arr);

$arr_keys_str2 = implode(" , ",$arr_keys);
var_dump($arr_keys_str2);

$arr_keys_str = ':'.implode(", :", $arr_keys);
//':name, :email, :password'
var_dump($arr_keys_str);


$dataNew = ["name"=>"Adem", "email"=>"adem@gmail.com", "password"=>"12345"];
$dataNewKeys = array_keys($dataNew);
            $data_columns = implode(" , ",$dataNewKeys);
            $data_column_placeholders = ':'.implode(", :", $dataNewKeys);
            $sql = "INSERT INTO ". 'users'." (".$data_columns.")  values(".$data_column_placeholders.")";
            var_dump($sql);

 //[":name"=>"name", ":email"=>"email", ":password"=>"12412"]           

 $res1 = explode(", ", $arr_keys_str );
 var_dump($res1);

 $values = array_values($dataNew);
 var_dump($values);
 $arrayExecValue = [];
 foreach ($res1 as $key => $value) 
 {
    $arrayExecValue[$value] = $values[$key];
 }  

 var_dump($arrayExecValue);
?>