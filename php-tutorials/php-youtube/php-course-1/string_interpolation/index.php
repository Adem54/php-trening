<?php

//!escape \ ters slash ile tek tirnak icne tek tirnak, cift tirnak icine cift tirnak yazabiliriz ya da 
$text = 'Adem said that \'Hello man';

$text2 = "Hello man,\n would you like\n to come here";

echo $text;
echo "<br>";
echo $text2;

//!  \n bu browser tarafindan gormezden gelinir, ama view-source code deyince php de \n line, br gorevi goren \n bu islem i br olarak tanir
/*
Browser Rendering: Converts HTML tags like <br> into visible line breaks but ignores raw newline characters (\n).
Source Code: Shows the exact output from PHP, including \n characters and HTML tags, as plain text.

\n bu ozellikle terminal ve console programming de kullaniliyor 

Terminal/Console: When outputting text to a terminal or console, newline characters are used to move to the next line. This makes the output readable and structured.
*/

//!String interpolation in php - concetanete-birlstirmek 

$name = "Adem";
echo "<br>";
//echo "Hello $namewelcome";
echo "Hello {$name}welcome";
//!Eger degisken den hemen sonra, araya bosluk birakmadan baska bir strng kullanacak isek o zaman degiskene zarar verecegi icn suslu parantez kullanarak bu problemi cozmus oluruz, php  degisken ile string i ayirt edemez ondan dolayi oyle durumlarda ya {} kullaniriz ya da degisken ile string i . operator u , ile birlestirme operatoru ile birlestirebiliriz
 ?>