<?php

class Test {

    private $data = "hallo daar";

    public function __construct() {
        return true;
    }

    public function __get($data) {
        return $this->data;
    }

    public function __set($data,$value) {
        $this->data=$value;

    }
}

$bas = new Test();
echo $bas->data;
$bas->data = "en nu nieuwe data";
echo "<br>";
echo $bas->data;




?>
