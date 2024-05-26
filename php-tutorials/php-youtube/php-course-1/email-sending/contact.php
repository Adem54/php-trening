<?php

require_once("header.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $errors = [];

    if(filter_var($email,  FILTER_VALIDATE_EMAIL) == false)
    {
        $errors[] = "Please enter a valid email address";
    }

    if(empty($subject))
    {
        $errors[] = "Please enter a subject";
    }

    if(empty($message))
    {
        $errors[] = "Please enter a message";
    }

}


?>

<h2>Contact page</h2>

<?php  if(empty($error)): ?>
    <ul>
        <?php
            foreach ($errors as $value)
            {
                echo "<h4>$value</h4>";
            }
        
        ?>
    </ul>
<?php else: ?>


<?php  endif;?>  
       



<form method="POST">
    <div>
        <label for="email">Your email</label>
        <input name="email" id="email" type="email" placeholder="Your email"/>
    </div>
    <div>
        <label for="subject">Subject</label>
        <input name="subject" id="subject" type="text" placeholder="Subject"/>
    </div>
    <div>
        <label for="message">Your email</label>
        <textarea name="message" id="message" type="text" placeholder="Message"></textarea>
    </div>
    <button type="submit">Send Mail</button>
</form>

<?php
require_once("footer.php");

?>