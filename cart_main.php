
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title?></title>

    <link rel="stylesheet" href="css/style.css">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
</head>
<body>

<div class="top_header">
    <div class="container">
        <div class="offers">

        </div>
        <div class="login_header">
            <ul>
                <li><a href="registered.php">Регистрация</a></li>
                <li><a href="login.php">Войти</a></li>

            </ul>
        </div>
        <div class="product_list_header">
            <form action="#" method="post" class="last">
                <a class="view-cart" href="cart.php">
                    <i class="fa fa-cart-arrow-down"></i>
                </a>
            </form>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<div class="logo_products">
    <div class="container">
        <div class="logo_products_left1">
            <ul class="phone_email">
                <li><i class="fa fa-phone" aria-hidden="true"></i>Закажите online или позвоните нам: (+0123) 234 567</li>
            </ul>
        </div>
        <div class="logo_products_left">
            <img class="logo" src="images/unnamed.png" alt="logo">
            <h1><a href="index.php"><?= $title?></a></h1>
        </div>
    </div>
</div>

<div class="navigation">
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php" class="act">Главная</a></li>
                    <li><a href="contact.php">Отзывы</a></li>
                </ul>
            </div>
        </nav>
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
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
