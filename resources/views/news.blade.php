<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NEWS</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Syncopate:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="antialiased container">
    <header>
        <a href="/" class="logo">NEWS</a>
        <menu class="menu">
            <a href="/news">News</a>
            <a href="/about">About us</a>
            <a href="/login">Login</a>
        </menu>
    </header>
    <main>
        <hr>
        <h1>Сhoose!</h1>
        <div class="category-news">
            <a href="/goodNews" class="good-news">Good News</a>
            <a href="/badNews" class="bad-news">Bad News</a>
        </div>
        <div class="news-items">
            <div class="card">
                <img src="/img/news.png" class="card-img-top" style="width: 30%; padding: 10px" alt="news-img">
                <div class="card-body">
                    <h5 class="card-title">Новость 1</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                <div class="card-body">
                    <a href="/news/1" class="card-link">Далее...</a>
                </div>
            </div>
            <div class="card">
                <img src="/img/news.png" class="card-img-top" style="width: 30%; padding: 10px" alt="news-img">
                <div class="card-body">
                    <h5 class="card-title">Новость 2</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                <div class="card-body">
                    <a href="/news/2" class="card-link">Далее...</a>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <hr>
        &copy; NEWS
    </footer>
</body>
</html>