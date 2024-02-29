<?php 
//LOAD MORE
//Tikladikca daha fazla veri gelmesi ya da scroll ile daha fazla veri gelmesini organize edebiliriz

require_once("conf.php");

$stmp = $conn->query("select * from testdb.user order by id asc limit 2");
$data = $stmp->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <title>Document</title>
</head>
<body>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>

    </tr>

    <?php  
        foreach ($data as $key => $value) {
            ?>

            <tr class="item" id="<?php echo $value['id']; ?>">
                <th  scope="row"><?php echo $value['id']; ?></th>
                <td><?php echo $value["username"]; ?></td>
                <td><?php echo $value["email"]; ?></td>
             </tr>
            <?php 
        }
    
    
    ?>
</thead>
  <tbody id="tbody">
 

   
   
  </tbody>
</table>

<button id="load-btn" type="button" class="btn btn-primary"  >Load more</button>



</body>

<script>

    $(document).ready(function(){

            let trElements = document.querySelectorAll(".item");

            console.log("trElements: ", trElements[trElements.length - 1].getAttribute("id"));
            let lastId = trElements[trElements.length - 1].getAttribute("id");
            let offset = lastId;
            let limit = 2;
            let count = 1;
           $("#load-btn").click(function(event){

            let data = { offset, limit };
            console.log("data: ",data);

            $.ajax({
                //url:"?mode=list&id=1", seklinde biz get istegini bulundgumz sayfaya gonderebiliriz...
                url:"api.php",
                type:"POST",
                data:data,
                success:function(response){
                    console.log("response: ", JSON.parse(response));
                    let data = JSON.parse(response);



                    let html ="" ;

                    $.each(data, function(index,value){
                        html += `<tr>
                                    <th scope="row">${value.id}</th>
                                    <td>${value.username}</td>
                                    <td>${value.email}</td>
                                </tr>`;
                    })    


                    $("#tbody").html(html);
                    $(window).scrollTop(20);
                   // offset+=limit;
                    limit+=3;
                }
            })

        

          
         
           }) 



    //scrolll
           $(window).scroll(function(){
              //  var lastID = $('.load-more').attr('lastID');

                console.log("loadinggg");
            /*
                if(($('#postList').height() <= $(window).scrollTop() + $(window).height())&& (lastID != 0))
                {
                    $.ajax({
                        type:'POST',
                        url:'getData.php',
                        data:'id='+lastID,
                        beforeSend:function(){
                            $('.load-more').show();
                        },
                        success:function(html){
                            $('.load-more').remove();
                            $('#postList').append(html);
                        }
                    });
                }  */
	        });
    });
</script>
</html>