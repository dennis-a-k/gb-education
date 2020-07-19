<?php
$title = "eShop";
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title?></title>
    <link rel="stylesheet" href="css/styles.css">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
</head>
<body>
<header>
    <a href="index.php" class="logo">eShop</a>
    <ul class="menu">
    </ul>
    <div class="cart">
        <form action="#" method="post" class="last">
            <a class="cart-button _margin" href="cart.php" type="button">Корзина</a>
        </form>
    </div>
</header>

<div class="minicart">
    <div class="container">
        <div class="main_cart">
            <h2 class="cart_header">Ваш заказ:</h2>
            <ul></ul>
            <div class="login-form-grids">
                <h3 class="cart_header">Отправить заказ</h3>
                <p><input type="text" id="ename" placeholder="Имя"></p>
                <p><input type="email" id="email" placeholder="Email"></p>
                <p><input type="text" id="ephone" placeholder="Телефон"></p>
                <p><button class="send-email">Заказать</button></p>
            </div>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="footer-copy">
        <div class="container">
            <p>© <?php
                $startYear = 2020;
                $thisYear = date('Y');
                if ($startYear == $thisYear) {
                    echo $thisYear;
                } else {
                    echo "{$startYear}&ndash;{$thisYear}";
                }
                echo ' ' . $title?> Все права защищены</p>
        </div>
    </div>
</footer>
<script type="text/javascript" src="js/jquery-3.5.1.js"></script>
<script type="text/javascript" src="js/cart.js"></script>

</body>
</html>

