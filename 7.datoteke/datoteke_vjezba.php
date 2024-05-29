<?php

    // 1. Pročitajte podatke iz datoteke polaznici.json, te ih ispišite u HTML tablicu.
    // 2. Dodajte novog polaznika u datoteku polaznici.json, te podatke iz nje ponovo ispišite.


    // u terminalu:
    // sudo usermod -aG bozidar www-data  ->  dodavanje apache u vlastitu grupu "bozidar"
    // sudo chmod 664 ./podaci/polaznici.json  ->  dodavanje korisnicima u vlastitoj grupi write ovlasti nad datotekom polaznici.json
    // sudo systemctl reload apache2  ->  restart apache servera


    const FILE_PATH = __DIR__ . "/podaci/polaznici.json";


    // funkcija dohvaća podatke iz datoteke i pretvara ih u array
    function getDecode(string $filePath): array
    {
        return json_decode(file_get_contents($filePath), true);
    }
    

    // funkcija pretvara podatke u json tip i sprema ih u datoteku
    function encodePut(array $newData, string $filePath): void
    {
        file_put_contents($filePath, json_encode($newData));
    }


    // funkcija za brisanje zadnjeg elementa iz json datoteke (sa ciljem kako bi se prva i druga tablica razlikovale nakon reloada stranice) 
    function getPopPut(string $filePath): void
    {
        $tempArray = getDecode($filePath);
        array_pop($tempArray);
        encodePut($tempArray, $filePath);
    }

?>


<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Datoteke vježba</title>
    </head>
    <body>

        <table border="1">  
            <thead>
                <tr>
                <?php
                $students = getDecode(FILE_PATH);
                $key = array_key_first($students);
                foreach ($students[$key] as $attribute => $value): ?>  
                    <th>
                    <?= $attribute; ?>
                    </th>  
                <?php endforeach; ?>
                </tr> 
            </thead>
            <tbody>
                <?php foreach ($students as $student => $data): ?>
                    <tr>
                    <?php foreach ($data as $attribute => $value): ?>
                        <td>
                        <?= $value; ?>
                        </td>
                    <?php endforeach; ?>
                    </tr>   
                <?php endforeach; ?>
            </tbody>
        </table> 

        <br>

        <table border="1">  
            <thead>
                <tr>
                <?php
                $students[] = [
                    "name" => "Borna",
                    "surname" => "Borić",
                    "age" => 29,
                    "email" => "borna.boric@gmail.com",
                    "phone" => 38595666777
                ];
                $students = array_unique($students, SORT_REGULAR);  // ugrađena php funkcija koja rješava problem duplikata
                encodePut($students, FILE_PATH);
                $students = getDecode(FILE_PATH);
                $key = array_key_first($students);
                foreach ($students[$key] as $attribute => $value): ?>  
                    <th>
                    <?= $attribute; ?>
                    </th>  
                <?php endforeach; ?>
                </tr> 
            </thead>
            <tbody>
                <?php foreach ($students as $student => $data): ?>
                    <tr>
                    <?php foreach ($data as $attribute => $value): ?>
                        <td>
                        <?= $value; ?>
                        </td>
                    <?php endforeach; ?>
                    </tr>   
                <?php endforeach; ?>
            </tbody>
        </table>
    
    </body>
</html>

<?php getPopPut(FILE_PATH); ?>
    