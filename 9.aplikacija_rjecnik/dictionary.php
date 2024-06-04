<?php

    const FILE_PATH = __DIR__ . "/data/words.json";

    try {
        if (!file_exists(FILE_PATH)) {
            throw new Exception("File doesnt exist: " . FILE_PATH);
        } elseif (is_dir(FILE_PATH)) {
            throw new Exception("This is not a file: " . FILE_PATH);
        }
    } catch (\Exception $exception) {
        echo $exception->getMessage();
    }

    // funkcija dohvaća podatke iz datoteke i pretvara ih u array
    function getDecode(string $filePath): array
    {
        if (($tempArray = file_get_contents($filePath)) === false) {
            die("<br>Greška čitanja datoteke!");
        } else {
            if (($tempArray = json_decode($tempArray, true)) === false) {
                die("<br>Greška dekodiranja datoteke!");
            } elseif (!empty($tempArray)) {
                return $tempArray;
            } else {
                $tempArray = [];
                return $tempArray;
            }
        }
    }

    // funkcija pretvara podatke u json tip i sprema ih u datoteku
    function encodePut(array $newData, string $filePath): void
    {
        if (($tempArray = json_encode($newData)) === false) {
            die("<br>Greška kodiranja datoteke!");
        } else {
            if ((file_put_contents($filePath, $tempArray)) === false) { 
                die("<br>Greška spremanja datoteke!");
            }
        }
    }
    
    // funkcija za brojanje suglasnika
    function countConsonants(string $word) : int
    {  
        if (($consonants = preg_replace("/[aeiou]/i", "", $word)) !== false) {  // ovdje u funkciji preg_replace koristimo regularni izraz za pronalazak i brisanje samoglasnika iz riječi
            return mb_strlen($consonants);  // ugrađena funkcija koja ispravno broji slova u stringu (uključujući naše čćđšž)
        } else {
            return 0;
        }
    }

    // funkcija za brojanje samoglasnika
    function countVowels(string $word) : int
    {  
        if ((preg_match_all("/[aeiou]/i", $word, $vowels)) !== false) {  // ovdje u funkciji preg_match_all koristimo regularni izraz za pronalazak svih samoglasnika u riječi
            return count($vowels[0]); 
        } else {
            return 0;
        }
    }

    // funkcija za ispis tablice riječi
    function printWordRows(array $words) : void
    {
        foreach ($words as $word) {
            echo "<tr>";
                echo "<td>" . $word['name'] . "</td>";
                echo "<td>" . $word['letters'] . "</td>";
                echo "<td>" . $word['consonants'] . "</td>";
                echo "<td>" . $word['vowels'] . "</td>";
            echo "</tr>";     
        }
    }

?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rječnik</title>
    </head>
    <body>

        <br>
        <h2 align="center">Upišite željenu riječ!</h2>
        <br><br>

        <div id="parent" style="display: flex;">

            <div id="left" style="flex-basis: 50%;">

                <form method="POST" action="dictionary.php">

                    <label for="word">Upišite riječ:</label><br>
                    <input type="text" id="word" name="word" required><br><br>
                    <input type="submit" value="Pošalji">

                </form>

                <?php 

                    if (!empty($_POST["word"])) {

                        $word = $_POST["word"];

                        if (!preg_match("/^[-a-z_\x{100}-\x{17f}]{2,25}+$/ui", $word)) {  // funkcija preg_match koristi regularni izraz koji provjerava sastoji li se upisana riječ samo od slova
                            
                            die("<br>Niste upisali ispravnu riječ!");

                        } else {

                            $letters = mb_strlen($word); 
                            $consonants = countConsonants($word);
                            $vowels = countVowels($word);

                        }
                    } else {

                        die("<br>Morate upisati riječ!");

                    }

                    $words = getDecode(FILE_PATH); 

                    $words[] = [
                        "name" => $word,
                        "letters" => $letters,
                        "consonants" => $consonants,
                        "vowels" => $vowels
                    ];

                    $words = array_unique($words, SORT_REGULAR);  // ugrađena php funkcija koja rješava problem duplikata 

                    encodePut($words, FILE_PATH);

                    ?> 

            </div>

            <div id="right" style="flex-basis: 50%;">
                <br>
                <p>
                <table border="1">
                    <tr>
                        <th>Riječ</th>
                        <th>Broj slova</th>
                        <th>Broj suglasnika</th>
                        <th>Broj samoglasnika</th>
                    </tr>
                    
                    <?php

                        printWordRows($words);

                    ?>

                <br>

                </table>

            </div>
                
        </div> 

    </body>
</html>