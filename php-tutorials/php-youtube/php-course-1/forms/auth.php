<?php
function isLoggedIn()
{
    //Burda onun yerine session a logged_in = true gibi birsey de yapabiliriz...ama eger user session a kaydedilmis ise o zaman login demektir
    if($_SESSION["user"] == "adem")
    {
        return true;
    }else 
    {
        return false;
    }
}


?>