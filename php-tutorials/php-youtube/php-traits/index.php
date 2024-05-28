<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once("src/HasMenu.php");
require_once("src/Concert.php");
require_once("src/Movie.php");
require_once("src/Play.php");


$play = new Play();

$play->getMenu(); 

$concert = new Concert();
$concert->getMenu();
$concert->chargeCard();


$movie = new Movie();
$movie->getMenu();


/*
Traits in PHP offer a way to reuse code across multiple classes without the limitations and restrictions of inheritance. While inheritance, abstract classes, and interfaces are powerful tools in object-oriented programming (OOP), traits provide additional flexibility and solve some specific problems. Here’s a detailed explanation of when and why you might need traits in PHP, along with their advantages over other OOP constructs.

When to Use Traits
Code Reuse Across Unrelated Classes:

When you have methods that you need to reuse across multiple, unrelated classes that do not share a common ancestor.
Avoiding Multiple Inheritance Issues:

PHP does not support multiple inheritance (a class inheriting from more than one parent class). Traits allow you to include methods from multiple sources without the need for multiple inheritance.
Breaking Down Complex Classes:

When you have a large class with many methods, you can break it down into smaller, more manageable components (traits) that can be reused independently.
Implementing Cross-Cutting Concerns:

For implementing cross-cutting concerns like logging, caching, or authentication that need to be applied to multiple classes.
Advantages of Traits Over Inheritance, Abstract Classes, and Interfaces
Inheritance
Single Inheritance Limitation: PHP only supports single inheritance, meaning a class can inherit from only one other class. Traits allow you to circumvent this limitation by enabling the reuse of methods across multiple classes.
Code Duplication: Without traits, you might end up duplicating code across different classes if they need similar functionality but do not share a common ancestor.
Abstract Classes
Partial Implementation: Abstract classes allow you to define some methods with implementation and some without (abstract methods). However, a class can inherit from only one abstract class.
Traits for Reusability: Traits can provide fully implemented methods that can be mixed into multiple classes, offering more flexibility in how functionality is shared.
Interfaces
Method Signatures Only: Interfaces define method signatures without implementations. A class that implements an interface must provide implementations for all its methods.
Traits for Method Implementation: Traits provide actual method implementations that can be used directly in classes, reducing the need to repeatedly write the same code.
Best Practices for Using Traits
Use Traits for Specific, Reusable Behaviors:

Traits should encapsulate specific behaviors that can be reused across different classes, such as logging, validation, or utility methods.
Avoid State in Traits:

Traits should generally not maintain state (properties). If a trait requires state, it should rely on the classes using it to provide the necessary properties.
Conflict Resolution:

Be mindful of method name conflicts when using multiple traits. PHP provides mechanisms (insteadof and as operators) to resolve such conflicts.
Single Responsibility:

Keep traits focused on a single responsibility. This makes them more reusable and easier to understand.
Documentation:

Document the traits well, especially if they are used across multiple classes, to ensure that other developers understand their purpose and usage.


*/
?>