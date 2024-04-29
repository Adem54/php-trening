<?php

declare(strict_types = 1);

//OOP PHP 

//1-Companies demand OOP
//2-Better for group work!
//3-You can easily re-use code!
//4-Better organized code!

//!PHP DE BIZ BU ISLEMLERI YAPARIZ
// ! 1-connect database and query database
//! 1-We handle data submitted by users
// ! We show DB data to the users


//! DESIGN PATTERNS 
//! MVC MODEL  
//!  SEO(model) - BUYER(Controller) - SALES(View)

//! 2 ways mvc model 
/*
 ! DB=>MODEL=>CONT
 ! DB=>MODEL=>VIEW=>CLIENT=>CONTROLLER=>MODEL


!CONTROLLER GET INPUT FROM THE USER
! UPDATE TO THE DATABASE VIA MODAL - 
! THEN VIEW COMMUNICATE TO THE MODAL IN ORDER TO SHOW UPDATED DATA TO CLIENTS
*/


function calculate(int $num1, int $num2)
{
    echo $num1 * $num2 ;
}

//calculate("4", "5");

// cd /var/log/apache2/error.log a gidip bakarsak
//[Wed Apr 24 23:43:59.290426 2024] [php:notice] [pid 1209131] [client ::1:37524] PHP Fatal error:  Uncaught TypeError: calculate(): Argument #1 ($num1) must be of type int, string given, called in /var/www/html/>


?>

