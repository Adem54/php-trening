<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
</head>
<body>
    <h2>SURVEY PAGE</h2>


<?php
require_once("data.php");

$questionId = $_GET["id"] ?? 1;

switch ($questionId) {
    case 'value':
        # code...
        break;
    
    default:
        displayQuestion($questionId);
        break;
}

function displayQuestion($id=1)
{
    global $data;
    foreach ($data as $key => $value) {
        if(intval($value["id"]) === intval($id) )
        {
            ?>
                <h3><?php echo $id. " - ".  $value["question"]; ?></h3>
                <div>
                <?php
                foreach ($value["options"] as $key => $option) 
                {
                   ?>
                   <div style="margin-left:1rem; display:flex; justify-content:left; align-items:center;">
                      <input id="<?php echo $id; ?>" onchange="handleRadioBtn(this);" type="radio" name="option" value="<?php echo $option; ?>" /> <label><?php echo $option; ?> </label>
                    </div>
                  <?php
                }
                
                ?>
                </div>

            <?php
        }
    }

  

    switch (intval($id)) {
        case 1:
            echo "<a href='survey.php?id=".intval($id+1)."'>Next</a>";
            break;
        
        case count($data):
            echo "<a href='survey.php?id=".intval($id-1)."'>Back</a>  ";
            break;
        default:
            echo "<a href='survey.php?id=".intval($id-1)."'>Back</a>  ";
            echo "  <a href='survey.php?id=".intval($id+1)."'>Next</a>";
            break;
    }
    
}
?>


<script>

    function handleRadioBtn(radiobtn)
    {
        console.log(radiobtn.getAttribute("id"));
        console.log(radiobtn.getAttribute("value"));

        let questionId = radiobtn.getAttribute("id");
        let choosenOption = radiobtn.getAttribute("value");
        let dataSend = { questionId, choosenOption };
        $.ajax({
            url:"api.php",
            type:"POST",
            data:dataSend,
            success: function(response){
                console.log("response: ", response);
            }
        })    
        

    }

</script>



</body>
</html>

<!-- 
    survey table- survey_name, id 
    Cok mantikli...adam 1 yilda 20 farkli cesit anket yapmak ister ve bunlari bir yerde tutmak isteyebilir..ondan dolayi da
    questions table,  id, surveyid, name(soru basligi)
    answers table, question_id, name(choice), correct-0(FALSE) 1-TRUE(ASLINDA ANKETTE DOGRU YANLIS CEVAP YOKTUR AMA BU BIRAZ DAHA QUIZ)
    VERITABANIN DESIGNINA MUTLAKA CALISMALIIYIZ...
    BIR PROJE FIKTIR GELDIGINDE VERITBANAI, TABLOLAR-KOLONLAR PRIMARY-KEY-FOREIGN KEY BUNLARI EN UYGUN SEKILDE NASIL DESIGN EDERIZ BUNUN UZERINE CIDDI KAFA YORMALIYIZ...COK KRITIK BIR SEY BU


     CREATE TABLE `answers` ( `id` int(11) NOT NULL AUTO_INCREMENT, `questionid` int(11) default 0, name VARCHAR(250) DEFAULT NULL, correct char(2) default 0, PRIMARY KEY(`id`) ) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-->