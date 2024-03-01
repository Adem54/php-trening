<?php

$result = file_get_contents("https://www.udemy.com/api-2.0/courses/1050454/reviews");
$results = json_decode($result, true);

//Biz direk php uzerinden bir endpointe istek atabiliyhoruz bu sekilde ve curl u kullanarak da ayni zamanda
//Ve dikkat edelim biz bu url e ajax ile istek atinca cors-problemlerine takildik ama burda hicbir soruna takilmadik!!!

//var_dump($results);
//die();

//NELER OGRENDIK-NELER UYGULADIK
//! 1-dirak ajax ile cekince CORS Hatasi aldigmz endpointi php file_get_contents() ile cektik ki bu arada bir dosya icerigini de cekebiliyoruz bu sekilde, ve ordan php ile endpoint olusturup o endpint uzerinden cektik datayi ajax ile 
//! 2-React taki component mount yani sayfa ilk yuklendiginde loading olayi ve mevcut html i data gelene kadar gizelyip data gelince ekrana basma yi uyguladik
//! 3-json_decode ile json olarak php ye gelen data php nin arrayine donusturmek istersek json_decode nin 2.paramtersine true veririz cunku default ta o false dur ve php obje olarak cevirir normalde ama biz genellikle array a donusturmek isteriz...bu onemlidir

//!4.php kullanarak dinamik bir sekiolde css class larini kullanabiliyoruz...
//!oop.php de de gosterdigmz gibi class yapisi icinde bu islemleri yaparken de yine bir class new lendiginde ilk oalrak calisacak yer olan construct icerisinde biz data nin cekilmesini yaparak class new lendiginde hemen ilk olarak data yi aliriz ki, class icinde olusturulacak olan, method larda data problemis bir sekilde kullanilabilsin...BU MANTIK AYNI FRONT-ENDDE BIZIM SAYFA YUKLENIR YUKLENMEZ ILK DATA YI ALIP EKRANA BASMAMIZ MANTIGI ILE AYNI SEYDIR, KI REACT TAKI COMPOONENT MOUNT MANTIGIDIR-USEEFFECT ICINDEKI DEPENDENCY ARRAY I BOS BIRAKARAK SAYFA ILK YUKLENDIGINDE DATA YI ORDA FETCH EDIP DOM UZERIDNEN DATA YI EKRANA BASMA MANTIGIMIZ GIBIDIR


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
<style>
    #comments {
        display:none;
    }

    .dark{
        background-color:black;
        color:white;
    }

    .light {
        background-color:yellow;
        color:black;
    }
</style>
</head>
<body>

<?php $number=2; ?>
<p class="<?php  echo $number > 1 ?  'dark' : 'light'; ?>">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Earum ea, maxime asperiores quod, assumenda illo voluptates veritatis voluptatem perspiciatis a, nobis at natus non dolore tempora. Ratione iusto dolore incidunt.</p>
<hr>

<div id="comments"></div>

<h3 id="loading" style="margin:2rem;">Loading...</h3>    







<script>
    //https://www.udemy.com/api-2.0/courses/1050454/reviews

    let url = "https://www.udemy.com/api-2.0/courses/1050454/reviews";

    let loading = true;
   $(document).ready(function(){
/*
        $.ajax({
            url:"api.php?mode=comments", 
            type:"GET",
            datatype:"json",
            success:function(response){


                   let data = JSON.parse(response);
                   console.log("data; ", data); 
                   if(data.length > 0)
                   {
                        loading = false;
                        $("#loading").hide();

                        let html = "<ul>";
                        data.forEach(item => {
                            html+=`<li>${item.user.name}</li>`;
                        });

                        html+="</ul>";

                        $("#comments").html(html).show();

                   }

            } 
        })
 */
   })
</script>
</body>
</html>
