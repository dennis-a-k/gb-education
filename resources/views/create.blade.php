<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NEWS</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Syncopate:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/css/style.css">
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
      <form class="create">
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="customFile">
          <label class="custom-file-label" for="customFile">Choose Image</label>
        </div>
        <input class="form-control" type="text" placeholder="News Title">
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="20" placeholder="News Text"></textarea>
        <a href="/admin/news" class="btn btn-outline-danger" style="width: 200px">Сancel</a>
        <button type="submit" class="btn btn-danger" style="width: 200px">Create</button>
      </form>
    </main>
    <footer>
      <hr>
      &copy; NEWS
    </footer>
</body>
</html>