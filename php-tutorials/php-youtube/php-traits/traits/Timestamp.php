<?php

// File: traits/Timestamp.php
trait Timestamp {
    public function currentTimestamp() {
        return date('Y-m-d H:i:s');
    }
}
?>