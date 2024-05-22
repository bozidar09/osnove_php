<?php

    // vježba 1

    // inicijalizacija, punjenje i ispis indeksiranog niza/polja
    $primeNumbers = [];
    $elements = 5;

    function primeGenerator($elements, $primeNumbers) {
        for ($i = 1; ; $i++) {
            $counter = 0;
            for ($j = 1; $j <= $i; $j++) {
                if ($i % $j == 0) {
                    $counter++;
                }
            }
            if ( ! in_array($i, $primeNumbers) && $counter <= 2) {
                $primeNumbers[] = $i;
            }
            if (count($primeNumbers) == $elements) break;
        }
        return $primeNumbers;
    }

    $primeNumbers = primeGenerator($elements, $primeNumbers);

    echo "<pre>";
    print_r($primeNumbers);
    echo "</pre>";
    
    //provjera postoji li element na indeksu 3 te ispis
    var_dump(array_key_exists(3, $primeNumbers));
    echo "<br>";

    if (array_key_exists(3, $primeNumbers)) {
        echo $primeNumbers[3];
    } else {
        echo "Treći element u nizu ne postoji";
    }
    echo "<br>";

    // dodavanje novog elementa na kraj niza
    $elements++;
    $primeNumbers = primeGenerator($elements, $primeNumbers);
    
    // broj elemenata i ispis novog niza
    echo count($primeNumbers);
    echo "<br>";

    echo "<pre>";
    print_r($primeNumbers);
    echo "</pre>";

    // silazno sortiranje niza uz zadržavanje indeksa
    arsort($primeNumbers);
    echo "<pre>";
    print_r($primeNumbers);
    echo "</pre>";




    // vježba 2 

    // inicijalizacija i ispis višedimenzionalnog niza/polja
    $users = [
        ["ime" => "aleksandar", "prezime" => "dobrinic", "godine" => 35, "spol" => "M"],
        ["ime" => "tena", "prezime" => "fiskus", "godine" => 28, "spol" => "Ž"]
    ];

    echo "<pre>";
    print_r($users);
    echo "</pre>";

    // brisanje ključa iz niza/polja
    $key = "spol";

    function eraseKey($key, $users) {
        foreach (array_keys($users) as $user) {
            unset($users[$user][$key]);
        }
        return $users;
    }

    $users = eraseKey($key, $users);

    echo "<pre>";
    print_r($users);
    echo "</pre>";
    
    // dodavanje novog elementa
    $users[] = ["ime" => "stjepan", "prezime" => "puaca", "godine" => 30];

    echo "<pre>";
    print_r($users);
    echo "</pre>";
