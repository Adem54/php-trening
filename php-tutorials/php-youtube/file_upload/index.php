<?php

//file_upload:On olmali php.ini dosyasinda


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars('result.php'); ?>" method="POST" enctype="multipart/form-data">
        <label for="">Upload file</label>
        <input type="file" id="formcontrolfile1"  name="myfile">
        <br><br>
        <button type="submit">Upload File</button>
    </form>
</body>
</html>