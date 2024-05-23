<?php

    $names = ["aleks", "filip", "bozidar"];

    foreach ($names as $name) {
        echo "$name ";
    }

    echo "<br>";

    foreach ($names as $key => $name) {
        echo ++$key . " - $name<br>";
    }

    echo "<br>";

    $fruits = [
        ["ime" => "banana", "cijena" => "3 EUR", "klasa" => 1],
        ["ime" => "jagoda", "cijena" => "9 EUR", "klasa" => 3],
        ["ime" => "lubenica", "cijena" => "4 EUR", "klasa" => 2] 
    ];

    foreach ($fruits as $key1 => $fruit) {
        echo ++$key . " ";
        foreach ($fruit as $key2 => $value) {
            echo "$key2 - $value ";
        }
        echo "<br>";
    }