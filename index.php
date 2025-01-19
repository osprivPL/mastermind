<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Michał Ożdżyński">

    <link rel="stylesheet" href="../style.css">

    <title>index</title>
</head>
<body>
    <?php
//    error_reporting(E_ERROR | E_PARSE);
    session_unset();
    session_start();
    $_SESSION["_attempts"] = 0;
    $_SESSION["_ans"] = "";

    function printArr(&$arr): void{
        foreach($arr as $key => $value){
            echo $key . " => " . $value . "<br>";
        }
    }
    function generujAns($length = 4): string{
        $colors = array("red", "white", "orange", "cyan", "yellow", "pink", "green");
        $ans = "";
        for ($i = 0; $i < $length; $i++) {
            $ans = $ans . $colors[rand(0, 6)] . " ";
        }
        return substr($ans, 0, -1);
    }
    function rozpocznij(): void{
        echo '<form method="post" action = "main.php">';
            echo '<label for = "ilePol">Jak długi ciąg chcesz odgadnąć?</label><input type="number" name = "ilePol" id = "ilePol" min="3" max="10" value ='.$_POST["ilePol"].'><br>';
            echo '<label for = "ileProb">Ile chcesz prób?</label><input type="number" name = "ileProb" id = "ileProb" min="3" max="10" value ='.$_POST["ileProb"].' ><br>';
            echo '<a href = "main.php"><input type="submit" id = "send" onclick=""></a>';
            $_SESSION["_attempts"] = $_POST["ileProb"];
            $ile = $_POST["ilePol"];
            $_SESSION["_ans"] = generujAns($ile);
        echo '</form>';

    }

    rozpocznij();

    printArr($_SESSION);
    ?>
</body>
</html>