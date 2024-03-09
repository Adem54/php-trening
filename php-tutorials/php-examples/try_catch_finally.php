<?php


//!finally kullanimi en son finally icerisindeki kod calistirilir kod basarili olsa da olmazsa da
 class Test 
{

    public function usageOfFinal()
    {
        $file = fopen("/log.txt", "a");

        try 
        {
            fwrite($file,"log geldi");
        } catch (\Exception $ex) 
        {
            echo $ex->getMessage();
        }finally{
            echo "our transactions are finished";
            fwrite($file,"finally den eklendi");
          
            
        }
    }
}


$myTest = new Test();
$myTest->usageOfFinal();


?>