<?php

class MailHandler
{
    public function send()
    {
        echo "<br>Mail is sending<br>";
    }
}

class ImageSaveHandler
{

    private $storage;
    private $database;

    //Burda da ana mantik asli
    //!construct uzerinden gondererek yapmaktaki amacimz bu class icerisinde istedgimz heryerde, her fnksiyon icerisinde de bu enjekte edilen instance leri kullanabilmek yani o class larin icindeki method, properties vs leri kullanabilmek
    public function __construct(Storage $storage, Database $database)
    {
        // $this->storage = new Storage(); bu sekiilde ne var ne yok herseyi burda new lemek yerine dependency injection ile bu islemmi handle etmeliyiz
        // $this->database = new Database();

        $this->storage = $storage;
        $this->database = $database;
        
    }

    public function save($file, Logger $logger)
    {

          
           // Veritabanina kaydet(url i kaydederiz)
           $this->database->save($file);

           //FTP ye kaydet
           $this->storage->save($file);
           //Logglama 
           $logger->save();

    }

    public function deleteFTPImage($id, MailHandler $mail)
    {
        $this->storage->deleteImage($id);
        $mail->send();
    }
}

class Storage 
{
    public function save($file)
    {
        echo "<br> Storage-saved <br>";
    }

    public function deleteImage($id)
    {
        echo "<br>Image deleted in Storage<br>";
    }
}

class Database 
{   
    public function save($file)
    {
        echo "<br> Database-saved <br>";
    }

}

class Logger 
{
    public function save()
    {
        echo "<br> Log-saved <br>";
    }
}

$imageSaveHandler = new ImageSaveHandler(new Storage(), new Database());
$imageSaveHandler->save(["path"=>"/files/", "name"=>"file1"], new Logger());
$imageSaveHandler->deleteFTPImage(2, new MailHandler());

//DEPENDENCY INJECTION YAPMAK ISTIYRUZ AMA YUKARDAKI MANTIK BUNA UYMUYOR,BIZ HER BURDA YARIN BASKA BIR CLASS DA DA ORNEGIN KAYDETMEK ISTERSEK ONU DA GELIP NEW LERSEK O ZAMAN BIZ HER ZAMAN BAGIMLI OLMUS OLACAGIZ...

?>