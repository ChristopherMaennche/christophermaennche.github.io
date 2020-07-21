<?php
    $boxes = [
        "1"=>"",
        "2"=>"",
        "3"=>"",
        "4"=>"",
        "5"=>"",
        "6"=>"",
        "7"=>"",
        "8"=>"",
        "9"=>""
    ];
    $score = 0;
    
    if(isset($_POST["NewGame"])){
        setcookie('boxes', '',time() - 3600);
        setcookie('turn', '',time() - 3600);
        header("refresh: 0");
        die();
    }
    
    if(isset($_COOKIE['boxes'])) {
        $boxes = $_COOKIE['boxes'];
        $boxes = unserialize($boxes);
    } else {
        //echo "Cookie is not set!";
    }
    
    
    $turn = "P";
    
    if(isset($_COOKIE['turn'])) {
        $turn = $_COOKIE['turn'];
    } else {
        //echo "Cookie is not set!";
    }
    $isDisabled = "";
    $winner = false;
    $looser = false;
    $defaultLetter = "X";
    $aiLetter = "O";
    $btnClicked = "";
    $turnTaken = false;
    
    //Winning
    if($boxes["1"] == "X" && $boxes["1"] === $boxes["2"] && $boxes["3"] === $boxes["2"]){
        $winner = true;
        $dohavespace = false;
    }
    if($boxes["4"] == "X" && $boxes["4"] === $boxes["5"] && $boxes["6"] === $boxes["5"]){
        $winner = true;
        $dohavespace = false;
    }
    if($boxes["7"] == "X" && $boxes["7"] === $boxes["8"] && $boxes["9"] === $boxes["8"]){
        $winner = true;
        $dohavespace = false;
    }
    if($boxes["1"] == "X" && $boxes["1"] === $boxes["5"] && $boxes["9"] === $boxes["5"]){
        $winner = true;
        $dohavespace = false;
    }
    if($boxes["3"] == "X" && $boxes["3"] === $boxes["5"] && $boxes["7"] === $boxes["5"]){
        $winner = true;
        $dohavespace = false;
    }
    if($boxes["1"] == "X" && $boxes["1"] === $boxes["4"] && $boxes["7"] === $boxes["4"]){
        $winner = true;
        $dohavespace = false;
    }
    if($boxes["2"] == "X" && $boxes["2"] === $boxes["5"] && $boxes["8"] === $boxes["5"]){
        $winner = true;
        $dohavespace = false;
    }
    if($boxes["3"] == "X" && $boxes["3"] === $boxes["6"] && $boxes["9"] === $boxes["6"]){
        $winner = true;
        $dohavespace = false;
    }
    
    if($winner){
        echo '<center><h1 class="WinnerText">WINNER</h1></center>';
        $score = $score + 1;
        $looser = false;
    }
    
    //Loosing
    if($boxes["1"] == "O" && $boxes["1"] === $boxes["2"] && $boxes["3"] === $boxes["2"]){
        $looser = true;
        $dohavespace = false;
    }
    if($boxes["4"] == "O" && $boxes["4"] === $boxes["5"] && $boxes["6"] === $boxes["5"]){
        $looser = true;
    }
    if($boxes["7"] == "O" && $boxes["7"] === $boxes["8"] && $boxes["9"] === $boxes["8"]){
        $looser = true;
    }
    if($boxes["1"] == "O" && $boxes["1"] === $boxes["5"] && $boxes["9"] === $boxes["5"]){
        $looser = true;
    }
    if($boxes["3"] == "O" && $boxes["3"] === $boxes["5"] && $boxes["7"] === $boxes["5"]){
        $looser = true;
    }
    if($boxes["1"] == "O" && $boxes["1"] === $boxes["4"] && $boxes["7"] === $boxes["4"]){
        $looser = true;
    }
    if($boxes["2"] == "O" && $boxes["2"] === $boxes["5"] && $boxes["8"] === $boxes["5"]){
        $looser = true;
    }
    if($boxes["3"] == "O" && $boxes["3"] === $boxes["6"] && $boxes["9"] === $boxes["6"]){
        $looser = true;
    }
    
    if($looser){
        echo '<center><h1 class="LooserText">LOOSER</h1></center>';
        $score = $score - 1;
        if($score >= 0){
            $score = $score -1;
        }else{
            $score = 0;
        }
        $winner = false;
    }
    
    $dohavespace = false;
    $openSpaces = array();
    $icnt = 1;
    foreach($boxes as $box){
        if($box === ""){
            $openSpaces[] = $icnt;
            $dohavespace = true;
        }
        $icnt ++;
    }
    
    //var_dump($openSpaces);
    if($turn === "C" && $dohavespace){
        $rand = array_rand($openSpaces);
        $boxes[$openSpaces[$rand]] = $aiLetter;
        $turn = "P";
        $turnTaken = true;
    }
    
    //Was a Button C?
    if(isset($_POST["box"]) && $turn === "P"){
        if($_POST["box"] === "1"){
            $boxes["1"] = $defaultLetter;
            $turn = "C";
            $turnTaken = true;
        }
        if($_POST["box"] === "2"){
            $boxes["2"] = $defaultLetter;
            $turn = "C";
            $turnTaken = true;
        }
        if($_POST["box"] === "3"){
            $boxes["3"] = $defaultLetter;
            $turn = "C";
            $turnTaken = true;
        }
        if($_POST["box"] === "4"){
            $boxes["4"] = $defaultLetter;
            $turn = "C";
            $turnTaken = true;
        }
        if($_POST["box"] === "5"){
            $boxes["5"] = $defaultLetter;
            $turn = "C";
            $turnTaken = true;
        }
        if($_POST["box"] === "6"){
            $boxes["6"] = $defaultLetter;
            $turn = "C";
            $turnTaken = true;
        }
        if($_POST["box"] === "7"){
            $boxes["7"] = $defaultLetter;
            $turn = "C";
            $turnTaken = true;
        }
        if($_POST["box"] === "8"){
            $boxes["8"] = $defaultLetter;
            $turn = "C";
            $turnTaken = true;
        }
        if($_POST["box"] === "9"){
            $boxes["9"] = $defaultLetter;
            $turn = "C";
            $turnTaken = true;
        }
    }
    
    if($turnTaken){
        setcookie('boxes', serialize($boxes));
        setcookie('turn', $turn);
        header("refresh: 0");
        die();
    }
  
    $dohavespace = false;
    $openSpaces = array();
    $icnt = 1;
    foreach($boxes as $box){
        if($box === ""){
            $openSpaces[] = $icnt;
            $dohavespace = true;
        }
        $icnt ++;
    }
    if(!$dohavespace){
        echo '<center><h1 class="GameOverText">Game Over</h1></center>';

        //die();
    }
    echo implode($box, $openSpaces);