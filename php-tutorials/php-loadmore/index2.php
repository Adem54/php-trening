<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | Auto Load More Data on Page Scroll with Jquery & PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <div class="container">
   <h2 align="center">Auto Load More Data on Page Scroll with Jquery & PHP</a></h2>
   <br />
   <div id="load_data"></div>
   <div id="load_data_message"></div>
   <br />
   <br />
   <br />
   <br />
   <br />
   <br />
  </div>
 </body>
</html>
<script>

$(document).ready(function(){
 
 var limit = 7;
 var start = 0;
 var action = 'inactive';
 function load_country_data(limit, start)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{limit:limit, start:start},
   cache:false,
   success:function(data)
   {
    console.log("data: ",data);
    $('#load_data').append(data);
    if(data == '')
    {

        //Eger api den data gelmez ise burasi gelecek en alttaki butonda
     $('#load_data_message').html("<button type='button' class='btn btn-info'>No Data Found</button>");
     action = 'active';
    }
    else
    {
        //Eger  api den data geliyor ise burdaki butonu gorecegiz...
     $('#load_data_message').html("<button type='button' class='btn btn-warning'>Please Wait....</button>");
     action = "inactive";//inactive yapiyor ki asagida data yi getren methodu tetiklesin 1 saniye sonra, buranin inactive olmasi gerekiyhor ki scroll asagi cekilince if kosulunun icine girsin ve tekrar data getirme islemini cagirsin
    }
   }
  });
 }

//Burasi ilk defa sayafaya geldiginde data nin gelmesi icin yapilmis, scrolll ozelligi ise asagidaki islem ile gerceklesiyor
 if(action == 'inactive')
 {
  action = 'active';
  load_country_data(limit, start);
 }



 $(window).scroll(function(){
    console.log("scroll function");//Burasi biz mouse-tekrlegini asagi dogru yuvarladgimz zaman bir anda 15-20 kez tetiklenir
    //Sonra biz tekerlegi asagi dogru yuvarliyoruz ve scrll cubugunu en asagi getiryoruz asagdaki islem ile otomatik olarak sayfa nin ortasina geliyor cubuk
    console.log("$(window).scrollTop(): ",$(window).scrollTop());//En ustten asagi dogru scroll u cekince ne kadar cektiginin mesafesidir
    //scroppTop asagi cektikce artacak bir
    console.log("$(window).height(): ",$(window).height() )//Ekranin height viewport degeridir-$(window).height() provides you with a numerical value representing the height of the viewport.
    console.log("$('#load_data').height : ", $("#load_data").height())//Bu tum data yi cevreleyen html div tagi nin height i normalde window.height ten buyuk olacak ama iste burda hem window hem de scoll ne kadar cekilmis onu koyunca yani div in cevreledigi alanin altina geldigmizde yani Please Wait butonuna geldigmizde $(window).scrollTop() + $(window).height() > $("#load_data").height() bu saglanmis oluyor...
    //$("#load_data").height() will return the height of the #load_data element. 

    //Eger
  if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
  {
   action = 'active';
   start = start + limit;
   setTimeout(function(){
    load_country_data(limit, start);
   }, 1000);
  }
 });
 
});
</script>

<!--

const handleInfiniteScroll = () => {
  const endOfPage = window.innerHeight + window.pageYOffset >= document.body.offsetHeight;
  if (endOfPage) {
    addCards(currentPage + 1);
  }
};

window.addEventListener("scroll", handleInfiniteScroll);

window.innerHeight  windowsun gorunen heighti yani viewport height 
window.pageYOffset bu ise scroll un top a olan mesafesi, yani scroll yaptikca artacaktir 
document.body.offsetHeight bu ise ornegin sayfa da bir suru data var ve en alta gelmek icin scroll yapip geliyorz iste en alttaki son dataya gelne kadar olan en alt kisimidan sayfanin top kismina kadar olan heighttir ondan dolayi da kullanici scroll yapip en alta gelince bu endOfPage false dan true ye donecektir....


 -->