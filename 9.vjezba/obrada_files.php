<?php

    // funkcija za provjeru je li datoteka slika i koje vrste 
    function isItPicture (string $fileName): void
    {
        $result = match(exif_imagetype($fileName)) {
            1 => "Datoteka je slika tipa GIF",
            2 => "Datoteka je slika tipa JPEG",
            3 => "Datoteka je slika tipa PNG",
            4 => "Datoteka je slika tipa SWF",
            5 => "Datoteka je slika tipa PSD",
            6 => "Datoteka je slika tipa BMP",
            7 => "Datoteka je slika tipa TIFF_II",
            8 => "Datoteka je slika tipa TIFF_MM",
            9 => "Datoteka je slika tipa JPC",
            10 => "Datoteka je slika tipa JP2",
            11 => "Datoteka je slika tipa JPX",
            12 => "Datoteka je slika tipa JB2",
            13 => "Datoteka je slika tipa SWC",
            14 => "Datoteka je slika tipa IFF",
            15 => "Datoteka je slika tipa WBMP",
            16 => "Datoteka je slika tipa XBM",
            17 => "Datoteka je slika tipa ICO",
            18 => "Datoteka je slika tipa WEBP",
            19 => "Datoteka je slika tipa AVIF",
            default => "Datoteka nije slika!"
        };
    
        echo "<h4>$result</h4>";
    }

    $uploadDir = __DIR__ . "/uploads";

    if (!empty($_FILES)) {
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir);
        }

        $file = $_FILES["file"]["name"];
        $fileName = $uploadDir . "/" . $file;        

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $fileName)) {
            echo "<h4>File dodan</h4>";
            echo "<a href=uploads/$file><h4>Prikaži</h4></a>";
        } else {
            die("<br>Problem kod spremanja datoteke!");
        }

        isItPicture($fileName);

    } else {
        die("<br>Niste dodali datoteku!");
    }