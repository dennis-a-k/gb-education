@extends('layouts.main')

@section('title')
    Список новостей
@endsection

@section('main')
<h1>Сhoose!</h1>
<div class="category-news">
    <a href="{{ route('category', 'goodNews') }}" class="good-news">Good News</a>
    <a href="{{ route('category', 'badNews') }}" class="bad-news">Bad News</a>
</div>
<div class="news-items">
    <div class="card">
        <img src="/img/news.png" class="card-img-top" style="width: 30%; padding: 10px" alt="news-img">
        <div class="card-body">
            <h5 class="card-title">Новость 1</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        <div class="card-body">
            <a href="{{ route('news-cart', 1) }}" class="card-link">Далее...</a>
        </div>
    </div>
    <div class="card">
        <img src="/img/news.png" class="card-img-top" style="width: 30%; padding: 10px" alt="news-img">
        <div class="card-body">
            <h5 class="card-title">Новость 2</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        <div class="card-body">
            <a href="{{ route('news-cart', 2) }}" class="card-link">Далее...</a>
        </div>
    </div>
</div>
@endsection