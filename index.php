<?php
    session_start();
    session_unset();
    error_reporting(E_ERROR | E_PARSE);
?>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="author" content="Michał Ożdżyński">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="index.css">
    <title>index</title>
</head>
<body>

    <div class = "container">
        <h1>GRA W MASTERMIND'A</h1>
        <form method="post" action = "game.php">
            <div class="message">
                <label for = "ilePol">Jak długi ciąg chcesz odgadnąć?</label><input class="num" type="number" name = "ilePol" id = "ilePol" min="3" max="10" value = "4"><br>
                <label for = "ileProb">Ile chcesz prób?</label><input class = "num" type="number" name = "ileProb" id = "ileProb" min="3" max="10" value ="6" ><br>
                <a href = "game.php"><input type="submit" id = "send" value="START"></a>
            </div>
        </form>
    </div>
</body>
</html>