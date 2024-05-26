<?php
$test = "This is test";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="script.js"></script>
</head>
<body>
    <h1>Hello footer</h1>
    <button onclick="handleClick();">Handle click</button>
    <button onclick="handleClick2();">Handle click2</button>

    <script>

       function handleClick2()
       {
        console.log('<?php echo $test ?>');
       }
    </script>  
</body>
</html>