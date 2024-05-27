<?php

    // vježba 1

    function textReturn(): string
    {
        return "neki tekst";
    }

    $text = textReturn();
    echo $text;
    echo "<br>";


    // vježba 2

    function concatenate(string $name, string $surname): string
    {
        $fullName = "$name $surname";
        return mb_strtoupper($fullName);
    }

    $namePrint = concatenate("božidar", "marković");
    echo $namePrint;
    echo "<br>";


    // vježba 3

    function randSum(int $number): int
    {
        static $sum = 0;
        $sum += $number;
        return $sum;
    }

    $sumFunc = "randSum";

    for ($i=1; $i<=5; $i++) {
        echo $sumFunc(rand(1,10));
        echo "<br>";
    }