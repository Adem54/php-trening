<?php

interface ProcessInterface {
    public function add(?string $email, ?string $subject, ?string $text , ?DateTime $sendDateTime );//taska eklenecek verileri gosteren method

    public function run();//taski calistiracak method
}

?>