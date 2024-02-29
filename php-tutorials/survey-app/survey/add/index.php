<?php

//Anket ekleme islemi



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create survey</title>
 <link rel="stylesheet" href="./style.css?v=<?php echo time(); ?>"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
<div class="header">
    Create Survey
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="">
                <div class="form-group">
                    <label for="">Survey name:</label>
                    <input type="text" class="form-control" name="name"/>
                </div>
                <button id="new-question" class="btn btn-info">New question</button>
                <div class="questions--row">

                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>


<script>
    $(document).ready(function()
    {
       $("#new-question").click(function(event){
        event.preventDefault();//Sayfayi da otomatiik yeniliyor bu buttona tiklamak..onun sebbi de form icinde ki buton defalt olarak type-submit butonudur yani, tikladimmi sayfayi yeniler, eger action="" ise, ya da action= da belirtilen adrese gider
              console.log("new-question create");
              var html = `<div class='col-md-12'><label>Question-name</label><input type='text' class='form-control'/>   </div>
              <button id="new-answers"></button>
              `;
              $(".questions--row").append(html);

              //$("#new-answers").click(function(){}) it is not working like that
              $("body").on("click","#new-anwsers", function(){

              })
       })    
    });
</script>
</body>
</html>
<!-- 
    Biz ornegin bir butona tiiklaninca gostermek sitedgimz verileri birkac farkli yontemle gosterebiiyoruz 
    1-Dgrurdan DOM Ile javascript tarafinda taglari olustrarak yapabiliriz 
    2-Html taglarini eklemeyi biz dogruen createHtmlTag i kullanarak da yapabiliriz , onun yerine 1 tane var htmlContent = ""; htmlContent=`<div></div>`; bu sekilde dinamik bir sekilde de yapabiliriz...ki ben genellikle bu mantigi seciyorum...
    3-icerisinde veriyi gostermek istedgimz html i normal html icinde olsturup display none yapriz ilk basta sorna ise butona tiklaninca veriyi o html icine basip display block yaparak gosteririz
-->