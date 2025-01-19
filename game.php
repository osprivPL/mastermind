<?php
    session_start();
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
    function generujAns($length = 4): string{
        $colors = array("red", "white", "orange", "cyan", "yellow", "pink", "green");
        $correctAns = "";
        for ($i = 0; $i < $length; $i++) {
            $correctAns = $correctAns . $colors[rand(0, 6)] . " ";
        }
        return substr($correctAns, 0, -1);
    }
    function printArr(&$arr): void {
        foreach ($arr as $key => $value) {
            echo $key . " => " . $value . "<br>";
        }
    }
    function zlicz($arr): void{
        $ans = explode(" ", substr($_SESSION["_correctAns"], 0));
        $black =0;
        $white = 0;
        for ($i = 0; $i < count($arr); $i++){
//            print_r($arr);
//            echo"<br>";
//            print_r($ans);
            if (in_array($arr[$i], $ans)){
                if ($arr[$i] == $ans[$i]){
                    $black++;
                    $ans[$i] = "used";
                }
                else {
                    $found = array_search($arr[$i], $ans);
                    if (gettype($found) == "integer") {
                        $white++;
                        $ans[$found] = "used";
                    }
                }
            }
        }
//        echo $black." ".$white."<br>";
        $arr[] = "transparent";
        for ($i = 0; $i < $black; $i++){
            $arr[] = "black";
        }
        for ($i = 0; $i < $white; $i++){
            $arr[] = "white";
        }
        for($i = 0; $i < count($ans) - ($black + $white); $i++){
            $arr[] = "transparent";
        }
        printColor($arr);
    }

    error_reporting(E_ERROR | E_PARSE);

    if (!isset($_SESSION["_actualAttempts"])){
        $_SESSION["_actualAttempts"] = -1;
        $_SESSION["_attempts"] = $_POST["ileProb"];
        $_SESSION["_correctAns"] = generujAns($_POST["ilePol"]);
        $_SESSION["listOfAns"] = array();
        $_SESSION["wygrana"] = false;
    }
//    print_r($_SESSION["listOfAns"]);
//    echo "<br>";
//    print_r($_SESSION["_correctAns"]);
    foreach ($_SESSION["listOfAns"] as $key => $value){
        if ($value == $_SESSION["_correctAns"]){
            $_SESSION["wygrana"] = true;
        }
    }

    if ($_SESSION["_attempts"]-1 == $_SESSION["_actualAttempts"] || $_SESSION["wygrana"]){
        header("Location: end.php");
        exit();
    }
    else{
        $_SESSION["_actualAttempts"]++;
    }

    ?>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Michał Ożdżyński">

    <link rel="stylesheet" href="style.css">
    <link rel = "stylesheet" href = "game.css">

    <title>main</title>
</head>
<body>
<h2>GRA W MASTERMIND'A</h2>
<?php
    $ansARR = explode(" ", $_SESSION["_correctAns"]);
//    printColor($ansARR);
    if($_SESSION['_actualAttempts']!= 0){
            $ans = "";
            for ($i = 1; $i <= count($ansARR);$i++){
                $dot = $_POST["g".$i];
                if ($dot == 'r'){
                    $ans = $ans."red ";
                }
                else if ($dot == 'w'){
                    $ans = $ans."white ";
                }
                else if ($dot == 'o'){
                    $ans = $ans."orange ";
                }
                else if ($dot == 'c'){
                    $ans = $ans."cyan ";
                }
                else if ($dot == 'y'){
                    $ans = $ans."yellow ";
                }
                else if ($dot == 'p'){
                    $ans = $ans."pink ";
                }
                else if ($dot == 'g'){
                    $ans = $ans."green ";
                }
            }
            $_SESSION["listOfAns"][] = substr($ans, 0, -1);
        }
    for ($i = 0; $i < count($_SESSION["listOfAns"]); $i++){
            zlicz(explode(" ", $_SESSION["listOfAns"][$i]));
        }
    foreach ($_SESSION["listOfAns"] as $key => $value){
        if ($value == $_SESSION["_correctAns"]){
            $_SESSION["wygrana"] = true;
        }
    }

    if ($_SESSION["wygrana"]){
        header("Location: end.php");
        exit();
    }
        echo '<table>';
            echo '<form method = "post">';
                echo '<tr>';
                    for ($i = 1; $i <= count($ansARR); $i++) {
                        echo '<td class="guess">';
                        echo '<input type="radio" value="r" id = "red' . $i . '" name="g' . $i . '"><label for="red' . $i . '" style="color:red">Czerwony</label><br>';
                        echo '<input type="radio" value="w" id = "white' . $i . '" name="g' . $i . '"><label for="white' . $i . '" style="color:white">Biały</label><br>';
                        echo '<input type="radio" value="o" id = "orange' . $i . '" name="g' . $i . '"><label for="orange' . $i . '" style="color:orange">Pomarańczowy</label><br>';
                        echo '<input type="radio" value="c" id = "cyan' . $i . '" name="g' . $i . '"><label for="cyan' . $i . '" style="color:cyan">Niebieski</label><br>';
                        echo '<input type="radio" value="y" id = "yellow' . $i . '" name="g' . $i . '"><label for="yellow' . $i . '" style="color:yellow">Żółty</label><br>';
                        echo '<input type="radio" value="p" id = "pink' . $i . '" name="g' . $i . '"><label for="pink' . $i . '" style="color:pink">Różowy</label><br>';
                        echo '<input type="radio" value="g" id = "green' . $i . '" name="g' . $i . '"><label for="green' . $i . '" style="color:green">Zielony</label><br>';
                        echo '</td>';
                    }
                echo '</tr>';
                echo '<br>';
                echo '<div style = "clear:both"></div>';
                echo '<tr>';
                    echo '<td colspan="'.count($ansARR).'"><input type="submit" id = "send" value = "Strzel"></td>';
                echo '</tr>';
            echo '</form>';
        echo "</table>";

    //        echo '<div>';
//            printArr($_SESSION);
//            print_r($_SESSION["listOfAns"]);
//        echo '</div>';
    ?>
</body>
</html>



