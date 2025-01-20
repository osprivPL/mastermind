<?php
    function printColor($ansARR): void {
    //  print_r($ansARR);
        echo "<table id = 'ans'>";
        echo "<tr>";
        for ($i = 0; $i < count($ansARR); $i++) {
            echo '<td style = "background-color: ' . $ansARR[$i] . '; width: 200px; height: 100px">';
        }
        echo "</tr>";
        echo "</table>";
    }
?>
