<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Michał Ożdżyński">

    <link rel="stylesheet" href="../style.css">

    <title>main</title>
</head>
<body>
    <h2>GRA W MASTERMIND'A</h2>
    <?php
        //        if(session_status() == PHP_SESSION_ACTIVE){
        //          session_unset();
        //        }

        $ansARR = array();


        function pokazAns($ansARR): void
{
    echo "<table id = 'ans'>";
    echo "<tr>";
    for ($i = 0; $i < count($ansARR); $i++) {
        echo '<td style = "background-color: ' . $ansARR[$i] . '; width: 200px; height: 100px">';
    }
    echo "</tr>";
    echo "</table>";
}

        function printArr(&$arr): void
{
    foreach ($arr as $key => $value) {
        echo $key . " => " . $value . "<br>";
    }
}


        pokazAns($ansARR);

        echo '<table>';
            echo "<form>";
                echo '<tr>';
                    for ($i = 1; $i <= count($ansARR); $i++) {
                        echo '<td class="guess">';
                        echo '<input type="radio" value="red" id = "red' . $i . '" name="g' . $i . '"><label for="red' . $i . '" style="color:red">Czerwony</label><br>';
                        echo '<input type="radio" value="white" id = "white' . $i . '" name="g' . $i . '"><label for="white' . $i . '" style="color:white">Biały</label><br>';
                        echo '<input type="radio" value="orange" id = "orange' . $i . '" name="g' . $i . '"><label for="orange' . $i . '" style="color:orange">Pomarańczowy</label><br>';
                        echo '<input type="radio" value="cyan" id = "cyan' . $i . '" name="g' . $i . '"><label for="cyan' . $i . '" style="color:cyan">Niebieski</label><br>';
                        echo '<input type="radio" value="yellow" id = "yellow' . $i . '" name="g' . $i . '"><label for="yellow' . $i . '" style="color:yellow">Żółty</label><br>';
                        echo '<input type="radio" value="pink" id = "pink' . $i . '" name="g' . $i . '"><label for="pink' . $i . '" style="color:pink">Różowy</label><br>';
                        echo '<input type="radio" value="green" id = "green' . $i . '" name="g' . $i . '"><label for="green' . $i . '" style="color:green">Zielony</label><br>';
                        echo '</td>';
                    }
                echo '</tr>';
                echo '<br>';
                echo '<input type="submit" id = "send">';
            echo '</form>';
        echo "</table>";


        echo '<div>';
            printArr($_SESSION);
        echo '</div>';
    ?>
</body>
</html>



