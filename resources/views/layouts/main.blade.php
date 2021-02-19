<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NEWS::@yield('title')</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Syncopate:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>
<body class="antialiased container">
  <header>
    <a href="{{ route('index') }}" class="logo">NEWS</a>
    @include('blocks.menu')
  </header>
  <main>
    <hr>
    @yield('main')
  </main>
  <footer>
     <hr>
    &copy; NEWS
  </footer>
</body>
</html>