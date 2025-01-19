<?php
session_start();
error_reporting(E_ERROR | E_PARSE);

function printColor($ansARR): void {
//        print_r($ansARR);
    echo "<table id = 'ans'>";
    echo "<tr>";
    for ($i = 0; $i < count($ansARR); $i++) {
        echo '<td style = "background-color: ' . $ansARR[$i] . '; width: 200px; height: 100px">';
    }
    echo "</tr>";
    echo "</table>";
}
?>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="author" content="Michał Ożdżyński">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href ="end.css">
    <title>KONIEC GRY</title>

</head>
<body>
<div class="container">
    <h1>GRA W MASTERMIND'A</h1>
    <div class="message">Gra zakończona!</div>
    <?php
    if ($_SESSION["wygrana"]){
        echo '<div class="message">';
            echo "Udało ci się wygrać w ".$_SESSION["_actualAttempts"]." próbach!";
        echo '</div>';
    }
    else{
        echo '<div class="message">Przegrałeś!</div>';
    }
    echo "<div class='message'>Poprawna odpowiedź:</div>";
    printColor(explode(" ",$_SESSION["_correctAns"]));
    ?>


    <a href="index.php" id="send">Zagraj ponownie</a>
</div>
</body>
</html>