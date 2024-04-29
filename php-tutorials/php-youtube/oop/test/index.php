<?php

$data = ["username"=>"adem", "email"=>"adem@gmail.com", "password"=>"1234"];
var_dump(array_values($data));
$arr = [];
foreach ($data as $key => $value) 
{
   $arr[] = $key. " = ? ";
}
//$arr = ["username = ?", "email = ? ", "password =  ?"];
$res = implode(" AND ", $arr);
// $res =  'username = ? AND email = ? AND password = ?'



?>