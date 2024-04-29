<?php

function getMemoryUsage() {
    echo "<br>Uso de memória: " . convert(round(memory_get_usage()/1024,2)) . " \n";
}

function getExecutionTime() {
    echo "<br>Tempo de execução: " . round(microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"], 2) . " segundos\n";
}

function getPeakMemoryUsage() {
    echo "<br>Uso de memória de pico: " . convert(round(memory_get_peak_usage()/1024,2)) . " \n";
}

function convert($size) {
    $unit = array('b', 'kb', 'mb', 'gb', 'tb', 'pb');
    return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
}

function generateColor() {
    return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
}