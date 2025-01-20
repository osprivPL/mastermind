<?php
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
?>