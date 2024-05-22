<?php
// if (isset($_GET['name'])) {
//     $name = $_GET['name'];
// } else {
//     $name = 'Guest';
// }

$phpMessage = "Hello from PHP!";
session_start();
//SESSION_START I INVOKE ETTGIMZ ANDA BROWSER DA COOKIES DA PHPSESSIONID OLUSTURULUR, KI CLIENTSIDE DAN DA PHPSESSIONID YE ERISILEBILIR PHPSESSID:	heq6l5513vuu6p8ql0f4g9evec
//!ama session icerisine ekledigmz key-value leri client tarafindan erisilemez, sadece server tarafinda erisilebilir
//!Session lar cookies lere gore dha guvenlidir, ancak, client tarafindan sessionid ye erisilebildigi icin, buna son kullanici mudahele etme sansi vardir ondand dolayida gunvelik acigi vardir...bizim burda guvenligi her zaman session da bile data miz tutulusa da guvenlik onlemleri almaliyiz..
$_SESSION["username"] = "Adem645";
//!Bu datalara gelince php de super global olan $_SESSION[] UZERINEN BU DATALARA ERISEBILIYORUZ VE BU DATALAR SERVER TARAFINDA BIR DOSYA DA TUTULUYOR BUNU DA BILELIM
var_dump($_SESSION);

if (isset($_GET['name'])) {
    $name = htmlspecialchars($_GET['name'], ENT_QUOTES, 'UTF-8');
} else {
    $name = 'Guest';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome, <?php echo $name; ?>!</h1>

    <button onclick="navigate3(this);">
        Click
    </button>

<script>
    function navigate() {
        let myMessage = "Hello man!"; 
        let message = "<?php echo 'Hello from PHP!'; ?>"; // PHP echo outputs a properly quoted string
        console.log(message);
    }



    function navigate2() {
        let myMessage = "Hello man!"; 
        let message = "<?php echo $phpMessage; ?>"; // Embed PHP variable into JavaScript
        console.log(message);
    }

    function navigate3() {
    //  
    }
</script>
</body>
</html>
