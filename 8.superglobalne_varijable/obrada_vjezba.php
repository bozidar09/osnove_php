<?php

    $podaci = $_POST;

    if (!empty($podaci["name"]) || !empty($podaci["surname"])) {

        $ime = $podaci["name"];
        $prezime = $podaci["surname"];

        if (!empty($ime)) {
            if (!preg_match("/^[-a-z_\x{100}-\x{17f}]{2,20}+$/ui", $ime)) {
                echo "Niste upisali ispravno ime<br>";
            } else {
                echo "Vaše ime je $ime<br>";
            }
        } else {
            echo "Ime nije upisano<br>";
        }

        if (!empty($prezime)) {
            if (!preg_match("/^[-a-z_\x{100}-\x{17f}]{2,20}+$/ui", $prezime)) {
                echo "Niste upisali ispravno prezime<br>";
            } else {
                echo "Vaše prezime je $prezime<br>";
            }
        } else {
            echo "Prezime nije upisano<br>";
        }

    } else {
        echo "Nema podataka za obradu<br>";
    }

    echo "<a href='obrazac_vjezba.php'>Obrazac</a>";

?>