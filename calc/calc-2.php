<?php
if ($_POST['do']) {
    require "math.php";
    $result = implode(" ", array($_POST['a'], $_POST['do'], $_POST['b']))." = ".mathOperation($_POST['a'], $_POST['b'], $_POST['do']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Calc</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="a">
        <input type="submit" value="+" name="do">
        <input type="submit" value="-" name="do">
        <input type="submit" value="*" name="do">
        <input type="submit" value="/" name="do">
        <input type="text" name="b">
    </form>
    <p><?= $result ? $result : ""; ?></p>
</body>
</html>