<?php

include 'utils.php';

$colors = generateColorArray(100000000);
// unsetNonGreen($colors); // 4mb de uso de memória e 5.5 segundos de execução
// loopAndCount($colors); // 2mb de uso de memória e 4.44 segundos de execução
// foreachUnsetCount($colors); // 4mb de uso de memória e 5.9 segundos de execução
// nativeCount($colors); // 2mb de uso de memória e 3.6 segundos de execução
// arrayDiffCount($colors); // 4mb de uso de memória e 4.8 segundos de execução
arrayFilterCount($colors); // 4mb de uso de memória e 7.2 segundos de execução
getPeakMemoryUsage();
getExecutionTime();

function arrayFilterCount($data)
{
    $filtered = array_filter($data, function($color) {
        return $color != 'green';
    });

    return count($filtered);
}

function arrayDiffCount($data)
{
    return count(array_diff($data, ['green']));
}

function unsetNonGreen($data)
{
    $count = 0;
    $items = count($data);

    for($i = 0; $i < $items; $i++) {
        if($data[$i] == 'green') {
            unset($data[$i]);
        }
    }

    return $count;
    // foreach($data as $key => $color) {
    //     if($color !== 'green') {
    //         unset($colors[$key]);
    //     }
    // }
}

function foreachUnsetCount($data)
{
    foreach($data as $key => $color) {
        if($data[$key] != 'green') {
            unset($data[$key]);
        }
    }

    return count($data);
}

function loopAndCount($data)
{
    $count = 0;
    $items = count($data);

    for($i = 0; $i < $items; $i++) {
        if($data[$i] != 'green') {
            $count++;
        }
    }

    return $count;
}

function nativeCount($data)
{
    $counts = array_count_values($data);
    unset($counts['green']);
    return array_sum($counts);
}

function generateColorArray($size)
{
    $colors = ['red', 'yellow', 'green'];
    $arr = [];

    for($i = 0; $i < $size; $i++) {
        $arr[] = $colors[mt_rand(0, 2)];
    }

    return $arr;
}