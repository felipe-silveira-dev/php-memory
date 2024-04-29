<?php

require 'circular-reference.php';

echo "<h1>Ex 1: </h1>";
echo "Uso de memória inicial: " . round(memory_get_usage()/1024,2) . " kb\n";

$list = range(1, 1000000);
echo "<br>Uso de memória após criar a lista: " . round(memory_get_usage()/1024,2) . " kb\n";

unset($list);
echo "<br>Uso de memória após destruir a lista: " . round(memory_get_usage()/1024,2) . " kb\n";

echo "Ex 2: ";
// Garbage Collection
echo "<br><strong>Uso de memória inicial GC: " . round(memory_get_usage()/1024,2) . " kb\n";
fazerAlgo();
fazerAlgo();
fazerOutraCoisa();
echo "<br>Uso de memória após fazer algo: " . round(memory_get_usage()/1024,2) . " kb\n";

function fazerAlgo() {
    $list = range(1, 1000000);
    echo "<br>Uso de memória após criar a lista: " . round(memory_get_usage()/1024,2) . " kb\n";
}

function fazerOutraCoisa() {
    $list2 = range(1, 1000000);
    echo "<br>Uso de memória após fazer outra coisa: " . round(memory_get_usage()/1024,2) . " kb\n";
}


// Circular Reference
echo "<br>Ex 3: ";
echo "<br><strong>Uso de memória inicial CR: " . round(memory_get_usage()/1024,2) . " kb\n";
$person = new Person();
$person->familyTree();
echo "<br>Uso de memória após criar a árvore genealógica: " . round(memory_get_usage()/1024,2) . " kb\n";