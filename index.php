<?php
    echo 'Задание №1<br>';
    $a=0;
    while($a < 100){
        $a++;
        if($a%3==0){
            echo "$a ";
        } 
    }
    echo '<br><hr><br>';

    echo 'Задание №2<br>';
    $i = 0;
    do{
        if($i == 0){
            echo "$i - ноль<br>";
        }elseif ($i%2 == 0) {
            echo "$i - четное число<br>";
        }else {
            echo "$i - нечетное число<br>";
        }
        $i++;
    }
    while ($i <= 10);
    echo '<hr><br>';

    echo 'Задание №3<br>';
    $cityes = [
        'Московская обл.' => ['Зеленоград', 'Клин', 'Подольск'],
        'Ленинградская обл.' => ['Всеволожск', 'Павловск', 'Кронштадт', 'Выборг'],
        'Ростовкая обл.' => ['Ростов', 'Шахты']
    ];
    foreach ($cityes as $key => $value) {
        if(is_array($value)){
            $city = implode(', ',$value).';';
        }
        echo $key.' состоит из таких городов как: '.$city.'<br>';
    }
    echo '<hr><br>';

    echo 'Задание №4<br>';
    $alphabet = [
        'а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'yo','ж'=>'zh','з'=>'z','и'=>'i','й'=>'y','к'=>'k',
        'л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'ts','ч'=>'ch',
        'ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya'
    ];
    echo strtr('русский алфавит', $alphabet);
    echo '</br><hr></br>';

    echo 'Задание №5<br>';
    function spaces($str){
        $symbol = [' ' => ' - '];
        $text = strtr($str, $symbol);
        echo "$text";
    }
    spaces('заменяем пробелы на дефис');
    echo '</br><hr></br>';

    echo 'Задание №6<br>';
    $menu = [
        'Города' => [
            'Московская обл.' => ['Зеленоград', 'Клин', 'Подольск'],
            'Ленинградская обл.' => ['Всеволожск', 'Павловск', 'Кронштадт', 'Выборг'],
            'Ростовкая обл.' => ['Ростов', 'Шахты']
        ]
    ];
    
    function menuRender($arr){
        $renderArr[] = '<ul>';
        foreach ($arr as $key => $value) {
            if (is_array($value)) {
                $renderArr[] = '<li>'.$key.menuRender($value).'</li>';
            } else {
                $renderArr[] = '<li>'.$value.'</li>';
            }
        }
        $renderArr[] = '</ul>';
        return implode($renderArr);
    }
    echo menuRender($menu);
    echo '<hr><br>';

    echo 'Задание №7*<br>';
    for ($i = 0; $i < 10; print $i++ . ' ') {};
    echo '<br><hr><br>';

    echo 'Задание №8*<br>';
    echo '<br><hr><br>';

    echo 'Задание №9*<br>';
    spaces(strtr('замена русских букв английскими и пробелы дефисом', $alphabet));
?>