<?php

    // vježba 1

    // inicijalizacija indeksiranog niza/polja
    $primeNumbers = [1,2,3,5,7];
    
    //provjera postoji li element na indeksu 3 te ispis
    var_dump ( array_key_exists ( 3, $primeNumbers) );
    echo "<br>";

    if ( array_key_exists ( 3, $primeNumbers) ) {
        echo $primeNumbers[3];
    } else {
        echo "Treći element u nizu ne postoji";
    }
    echo "<br>";

    //dodavanje novog elementa na kraj niza
    $primeNumbers[] = 11;
    
    // broj elemenata niza
    echo count($primeNumbers);
    echo "<br>";

    // ispis niza
    echo "<pre>";
    print_r ( $primeNumbers );
    echo "</pre>";

    // silazno sortiranje niza uz zadržavanje indeksa
    arsort($primeNumbers);
    echo "<pre>";
    print_r ( $primeNumbers );
    echo "</pre>";




    // vježba 2 

    // inicijalizacija i ispis višedimenzionalnog niza/polja
    $users = [
        ["ime" => "aleksandar", "prezime" => "dobrinic", "godine" => 39, "spol" => "M"],
        ["ime" => "tena", "prezime" => "fiskus", "godine" => 28, "spol" => "Ž"]
    ];

    echo "<pre>";
    print_r ($users);
    echo "</pre>";

    // brisanje ključa iz niza/polja
    foreach (array_keys($users) as $user) {
        unset ($users[$user]["spol"]);
    }

    echo "<pre>";
    print_r ($users);
    echo "</pre>";
    
    // dodavanje novog elementa
    $users[] = ["ime" => "stjepan", "prezime" => "puaca", "godine" => 30];

    echo "<pre>";
    print_r ($users);
    echo "</pre>";
