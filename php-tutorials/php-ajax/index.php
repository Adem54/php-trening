
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Document</title>
    
    <style>
     .err-msg {
        display: none;
        color:red;
        font-size:1.2rem;
     }

     /* 
     !Bu yontem eski ama cok effektif bir yontemdir...ilk once veriyi icine yazacagmiz div i gizleyip sonra html tamamen hazir olunca uzak enpointten cekilen data, gizlenen div elementi icine basiliyor ya da iste o ul-li de olabilir..iste ayni reactttaki useeffect in component did mount mantigi-initial mantigi nin html-jquery icinde gosterimi 
     */
     .data-list {
        display:none;

     }
     </style>

     <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css">
</head>
<body>

    <h2 id="head" class="err-msg"></h2>
    <div id="list">
    <br>
        <input id="username" type="text" name="username" placeholder="username" /><br><br>
        <input id="email" type="email" name="email" placeholder="email" /><br><br>
        <input id="pass" type="password" name="username" placeholder="password" /><br><br>

         <button id="fetch-data">Send Data</button>

        <button id="get-data">Fetch Data</button>
    </div>
<br>
   <button id="stop-button">STOP</button>
    <div id="data-list" class="data-list"></div>

    <br>
    <hr>
<h2>Data TAbles</h2>

<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Extn.</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
    
    </table>

  
  
    <script src="https://code.jquery.com/jquery-3.7.1.js">

    </script>
<script src="//cdn.datatables.net/2.0.0/js/dataTables.min.js"></script>
    <script>
        //Sayfa hazir oldugunda calissin demektir bu
        $(document).ready(function(){

           //dataType i eger json yaparsak o zaman return json_encode ile data yi dondurebiliriz
         //   alert("asd");
          $("#fetch-data").click( function(event){

            let username = $("#username").val();
            let email = $("input[name=email]").val();
            let password = $("#pass").val();
            
            console.log("username; ", username);
            console.log("email; ", email);
            console.log("password; ", password);

            let dataSend =  {username, email,password };
            $.ajax( {
                  url:'api.php?mode=insert',//HEM GET ISTEGI GONDERIYORUZ AMA ASIL DATAYI POST ILE GONDERIYORUZ, GET I SADECE SAYFA YONLENDIRME YI YPAMAK ICIN KULLANIYORUZ
                  type:"POST",
                  dataType:"json",
               //   contentType: 'application/json',//Bu onemli, biz bu sekilde verince, kendisi otomatik olarak json a ceviriyor zaten
                  data: dataSend,
                  success:function(response) {
                 //    $('#stage').html(data);
                 console.log("response: ", response);
             //    console.log("response-data: ", JSON.parse(response));
                 $(".err-msg").show();//display none olan bir div elementini bu sekilde show yapabilriz
                 $(".err-msg").html(response);


                $("#username").val("");
                $("input[name=email]").val("");
                $("#pass").val("");
              
                
                  }
               }); 

               //Sayfayi yenilememizi sagliyor ve eklenen data yi da bu sekilde guncellenmis olarak getirebiiyoruz...
               //!Biz sayfamizin guncellenmesini, sayfanin reload-refresh edilmesini bu sekilce javascrip kisminda window.location.reload ile yapabiliyoruz
         
            });

         //   $("#get-data").click(function(){
             
               function fetchdata()
               {
                console.log("fetchDATaaaa")
                $.ajax({
                    url:"api.php?mode=read",
                    type:"POST",
                    success:function(response){
                        console.log("get-data-responsejson: ", response);
                        let data = JSON.parse(response);
                    //    console.log("get-data-response: ", data);
                        let html = "";
                        html+=`<ul>`;
                        data.forEach(item=>{
                            html+=`<li>${item.username} - ${item.email}</li>`;
                        })
                        html+=`</ul>`;

                        console.log("html;; ", html);

                        $("#data-list").show();//display none i kaldiriyoruz bu sekilde
                        $("#data-list").html(html);//Ve innerHTML i ajax da bu sekilde yapiyoruz
                    }
                })
               }

            //   let interval = setInterval(fetchdata, 1000);
            //   function stopInterval() {
            //     clearInterval(interval);
            //     }

            // $("#stop-button").click(function() {
            //     stopInterval();
            // });
            
           // })

          //!HARIKA BESTPRACTISE..BU DATATABLE I COK KULLANABILIRIZ...JQUERY KULLANARAK FAYDALANABILIIRZ      
           new DataTable('#example', {
        //   ajax: 'data/arrays.txt'
             ajax: 'data.php',
          
             
            });
         });  

         //!Bir yerde anlik veri cekme olayi varsa bu islemin 2 yontemi vardir, 1 -setInterval 2-socket-io....ama socket-io daha yogun kullanilan islemler icin kullanilmasi daha mantiklidir..
               
    </script>
</body>
</html>

<!--
!php de server-backend de data gondermenin farkli yontemleri 

1-ajax uzerinden php ile hazirlanmis api 
2.form uzerinden dogrudan action="send.php"
3.form uzerindeki data yi button uzerinden e.preventdefault ile... formData kullanarak 
4.Dom uzerinde button olsuturup tum attribute leri vs dom uzerinden ayarlayp data yi gondererek
5.form uzerinden data gonderme islemini biz sayfa yonlendirme de de kullaniyoruz...

 -->