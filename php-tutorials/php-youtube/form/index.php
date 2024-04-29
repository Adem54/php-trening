<?php
 print_r($_POST);

    if($_POST)
    {
        $form = $_POST["form"];
        if($form === "form1")
        {
            echo "form1!!!<br>";
            var_dump($form);
        }else if($form === "form2")
            
        {
            echo "form2!!!<br>";
         
            var_dump($form);
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form name="firstform" action="" method="POST">

    <label for="">Name</label>
    <input type="text" name="firstname"/>
    <br><br>
    <label for="">LastName</label>
    <input type="text" name="lastname"/>
    <br><br>
    <label for="">Email</label>
    <input type="text" name="email"/>
    <br><br>
    <input type="hidden" name="form" value="form1">
    <button type="submit">SendForm1</button>
</form>
<hr>

<form name="secondform" action="" method="POST">

    <label for="">Name</label>
    <input type="text" name="firstname"/>
    <br><br>
    <label for="">LastName</label>
    <input type="text" name="lastname"/>
    <br><br>
    <label for="">Email</label>
    <input type="text" name="email"/>
    <br><br>
    <input type="hidden" name="form" value="form2">

    <button type="submit">SendForm1</button>
</form>
</body>
</html>