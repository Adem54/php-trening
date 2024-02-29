


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- 1.yontem -->
    <h2>Welcome to survey1</h2>
    <a href="index.php?page=survey">Start Survey</a>
    <!-- We can make the same thing in DOM- LIKE THIS:document.getElementById('myLink').click();
 -->
    <hr>
    <!-- 2.yontem -->
    <form action="index.php" method="GET">
        <input type="hidden" name="page" value="survey"/>
        <button>Start Survey2</button>
    </form>
    <!--We can make the same thing in DOM, without writing some html -, like this: document.getElementById('myForm').submit();
 -->


 <hr>
 <!--3.yontem -->
<button id="survey3">Start Survey3</button>

<script>
    let survey3 = document.querySelector("#survey3");
    survey3.addEventListener("click",  function(){
        window.location.href="index.php?page=survey";
    })

//4.php icerisinde ise biz zaten direk html-css-javascript kullanabilyoruz birde direk php ile navigate yapabiliriz 
//header('Location: http://www.example.com');

//PHP ICINDE JAVASCRIPT KULANABILIRIZ ASAGIDAKI GIBI
//echo '<script>window.location.href = "http://www.example.com";


</script>
</body>
</html>