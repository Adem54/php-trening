<?php

trait A {
    public function message() {
        echo "Message from Trait A\n";
    }
}

trait B {
    public function message() {
        echo "Message from Trait B\n";
    }
}

class MyClass {
    use A, B {
        A::message insteadof B;
        B::message as messageFromB;
    }
}

$myClass = new MyClass();
$myClass->message();        // Output: Message from Trait A
$myClass->messageFromB();   // Output: Message from Trait B

?>
