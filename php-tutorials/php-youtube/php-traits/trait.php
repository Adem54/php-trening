<?php

trait Logger {
    public function log($message) {
        echo "[LOG]: " . $message . "\n";
    }
}



class User {
    use Logger;

    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function display() {
        $this->log("Displaying user: " . $this->name);
        echo "User: " . $this->name . "\n";
    }
}

// Test the User class
$user = new User("John Doe");
$user->display();

trait Timestamp {
    public function currentTimestamp() {
        return date('Y-m-d H:i:s');
    }
}


class Product {
    use Logger, Timestamp;

    private $productName;

    public function __construct($productName) {
        $this->productName = $productName;
    }

    public function display() {
        $this->log("Displaying product: " . $this->productName);
        echo "Product: " . $this->productName . "\n";
        echo "Timestamp: " . $this->currentTimestamp() . "\n";
    }
}

// Test the Product class
$product = new Product("Laptop");
$product->display();
?>
