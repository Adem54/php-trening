<?php
// File: traits/Logger.php
trait Logger {
    public function log($message) {
        echo "[LOG]: " . $message . "\n";
    }
}


?>