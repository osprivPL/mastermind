<?php
    function generujAns($length = 4): string{
        $colors = array("red", "white", "orange", "cyan", "yellow", "pink", "green");
        $correctAns = "";
        for ($i = 0; $i < $length; $i++) {
            $correctAns = $correctAns . $colors[rand(0, 6)] . " ";
        }
        return substr($correctAns, 0, -1);
}
?>
