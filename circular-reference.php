<?php

require 'utils.php';

getMemoryUsage();
(new Person)->familyTree();
getMemoryUsage();


class Person
{
    public $child;
    public $parent;
    public $data;

    public function __construct() 
    {
        $this->data = range(1, 1000000);
    }

    public function familyTree()
    {
        $jimmy = new Person();
        $gwen = new Person();

        $jimmy->child = $gwen;
        $gwen->parent = $jimmy;
        getMemoryUsage();
    }
}