<?php

    if (!empty($_POST)) {
        echo " = rezultat";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator</title>
</head>
<body>

    <h2>File upload</h2>

    <form method="POST">

        <label for="input">Unesite izraz:</label><br>
        <input type="text" id="input" name="input"><br><br>

        <input type="submit" value="Pošalji">

    </form> 
  
</body>
</html>