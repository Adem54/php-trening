<?php
// Include the trait files
require_once 'traits/Logger.php';
require_once 'traits/Timestamp.php';

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
