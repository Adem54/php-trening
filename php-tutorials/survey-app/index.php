<?php


$page = $_GET["page"] ?? "";


switch ($page) {
    case 'survey':
        require("survey.php");
        break;
    
    default:
        require("start_page.php");
        break;
}


?>