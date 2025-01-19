<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
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
    <a href="index.php" id="send">Zagraj ponownie</a>
</div>
</body>
</html>