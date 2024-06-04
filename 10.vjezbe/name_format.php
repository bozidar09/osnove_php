<?php

    // napraviti funkciju koja prima ime, prezime (pErO,pErIc) i kao rezultat vraca P. Peric

    function formatName(string $name): string
    {
        $nameArray = explode(",", $name);

        //  implode("|", $name);

        $name = $nameArray[0];
        $surname = $nameArray[1];

        $firstLetter = substr($name, 0, 1);  // $name[0] -> lakši način
        $firstLetter = mb_strtoupper($firstLetter);  // ucfirst()/ucwords() -> drugi način, ne radi sa čćđšž

        $surname = ucfirst(mb_strtolower($surname));

        return "$firstLetter. $surname";

        prettyPrint($nameArray);
    }

    $formattedName = formatName("pErO,pErIc");

    echo $formattedName;

    preg_match_all("/[aeiou]/i", "bozidar", $vowels);
    prettyPrint($vowels[0]);



    function prettyPrint(array $print)
    {
        echo "<pre>";
        print_r($print);
        echo "</pre>";
    }