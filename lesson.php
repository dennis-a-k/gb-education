<?php
    echo "Задание №1<br>";
    $a = rand(-10,10);
    $b = rand(-10,10);
    if ($a>=0 && $b>=0){
        echo "a=$a ";
        echo "b=$b</br>";
        echo "c=".$c = $a - $b."</br></br>";
    }elseif ($a<0 && $b<0) {
        echo "a=$a ";
        echo "b=$b</br>";
        echo "c=".$c = $a * $b."</br></br>";
    }else {
        echo "a=$a ";
        echo "b=$b</br>";
        echo "c=".$c = $a + $b."</br></br>";
    }

    echo "Задание №2<br>";
    $a = rand(0,15);
    switch ($a) {
        case '0':
            echo '0 ';
        case '1':
            echo '1 ';
        case '2':
            echo '2 ';
        case '3':
            echo '3 ';
        case '4':
            echo '4 ';
        case '5':
            echo '5 ';
        case '6':
            echo '6 ';
        case '7':
            echo '7 ';
        case '8':
            echo '8 ';
        case '9':
            echo '9 ';
        case '10':
            echo '10 ';
        case '11':
            echo '11 ';
        case '12':
            echo '12 ';
        case '13':
            echo '13 ';
        case '14':
            echo '14 ';
        default:
            echo '15</br></br>';
            break;
    }

    echo "Задание №3<br>";
    echo 'a=6 b=3</br>';
    function sum($a,$b){
        return $x=$a+$b;
    }
    echo 'сумма='.sum(6,3).'</br>';
    function diff($a,$b){
        return $x=$a-$b;
    }
    echo 'разность='.diff(6,3).'</br>';
    function multi($a,$b){
        return $x=$a*$b;
    }
    echo 'произведение='.multi(6,3).'</br>';
    function divide($a,$b){
        return $x=$a/$b;
    }
    echo 'деление='.divide(6,3).'</br></br>';

    echo "Задание №4<br>";
    $mathOperation = ['сумма','разность','произведение','деление'];
    $operation = $mathOperation[rand(0,3)];
    function mathOperation($arg1, $arg2, $operation) {
        switch($operation) {
            case "сумма":
                return sum($arg1, $arg2);
                break;
            case "разность":
                return diff($arg1, $arg2);
                break;
            case "произведение":
                return multi($arg1, $arg2);
                break;
            case "деление":
                return divide($arg1, $arg2);
                break;
        }
      }
    echo 'a=6 b=3</br>';
    echo $operation.'='.mathOperation(6,3, $operation).'</br></br>';

    echo "Задание №6*<br>";
    function power($val, $pow){
        return ($pow == 1) ? $val : ($val * power($val, $pow - 1));
    }
    echo power(3,2).'</br></br>';

    echo "Задание №7*<br>";
    $hour = date("H");
    $minute = date("i");
    echo $hour.':'.$minute.'</br>';
    if ($hour == 1 || $hour == 21){
        echo $hour.' час ';
    }elseif (($hour>=2 && $hour<=4) || ($hour>=22 && $hour<=24)) {
        echo $hour.' часa ';
    }else {
        echo $hour.' часов ';
    }
    if ($minute%10 === 1){
        echo $minute.' минута';
    }elseif ($minute%10 == 0 || ($minute%10 >= 5) && ($minute%10 <= 9) || ($minute%100 >= 11) && ($minute%100 <= 14)) {
        echo $minute.' минут';
    }else {
        echo $minute.' минуты';
    }
?>