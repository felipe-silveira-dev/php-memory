<?php

include 'utils.php';

class Person {
    public $child;
    public $parent;
    public $data;

    public function __construct() 
    {
        $this->data = range(1, 1000000);
    }
}

for($i = 0; $i < 10; $i++) {
    echo "<br>Iteração: " . $i . " ";
    getMemoryUsage();
    for($j = 0; $j < 10; $j++) {
        familyTree();
    }
}

function familyTree() {
    $jimmy = new Person();
    $gwen = new Person();

    $jimmy->child = $gwen;
    $gwen->parent = $jimmy;
    getMemoryUsage();
}