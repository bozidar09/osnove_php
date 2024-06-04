<?php

    $postData = $_POST;

    if (!empty($postData["name"]) || !empty($postData["surname"])) {

        $name = $postData["name"];
        $surname = $postData["surname"];

        if (!empty($name)) {
            if (!preg_match("/^[-a-z_\x{100}-\x{17f}]{2,20}+$/ui", $name)) {
                echo "Niste upisali ispravno name<br>";
            } else {
                echo "Vaše name je $name<br>";
            }
        } else {
            echo "Ime nije upisano<br>";
        }

        if (!empty($surname)) {
            if (!preg_match("/^[-a-z_\x{100}-\x{17f}]{2,20}+$/ui", $surname)) {
                echo "Niste upisali ispravno prezime<br>";
            } else {
                echo "Vaše prezime je $surname<br>";
            }
        } else {
            echo "Prezime nije upisano<br>";
        }

    } else {
        echo "Nema podataka za obradu<br>";
    }

    echo "<a href='obrazac_vjezba.php'>Obrazac</a>";

?>