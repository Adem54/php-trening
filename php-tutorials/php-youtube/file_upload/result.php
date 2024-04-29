<?php

var_dump($_FILES);
if($_FILES)
{
    if(isset($_FILES["myfile"]))
    {
        $file = $_FILES["myfile"];
        $name = $file["name"];
        $full_path = $file["full_path"];
        $tmp_name = $file["tmp_name"];//Burasi gecici olarak tutulan yeri veren, path tir
        $error = $file["error"];
        $size = $file["size"];
        
    }

    $mypath = "uploads/".$name;
    if(move_uploaded_file($tmp_name, $mypath))
    {
         echo "File uploaded";
         echo "<img src='$mypath'/>";
    }else{
        echo "File is not uploaded";
    }

    //
    
}
/*
 'myfile' => 
    array (size=6)
      'name' => string 'bestilling-bruktbilgaranti.pdf' (length=30)
      'full_path' => string 'bestilling-bruktbilgaranti.pdf' (length=30)
      'type' => string 'application/pdf' (length=15)
      'tmp_name' => string '/tmp/phpJ8I5vW' (length=14)
      'error' => int 0 //0 hata yok demektir
      'size' => int 7776

*/

/*

1-Gonderilen dosya verilerini aliyoruz 
2-Sonra dosya ilk basta gecici bir yerde tutulur, ve o gecici yerden biz dosyayi gondermek istedimgz dosya konumunu vererek, server da tasimak istedgmiz yere tasiriz
3-Biz dosyayi server aa (server da pc diye biliriz) tasiriz, tasidigmz yerin path ini, veritabanina kaydederiz...DIKKAT EDELIM
!uploads klasorune dosya izinlerinin hepsini vermemiz gerekir, ozellkle gercek sunucuda calisirken bu cok onemldir
4-move_upload_file ile( if(move_uploaded_file($tmp_name, $mypath))) dosya nin benim pathime yuklenmesini saglayip sonra da dogru yuklenip yuklenmedigini test ederiz...  chmod -R 777 uploads
5-
*/



?>