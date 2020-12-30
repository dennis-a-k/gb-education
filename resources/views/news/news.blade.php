@extends('layouts.main')

@section('title')
    Список новостей
@endsection

@section('main')
<h1>Сhoose!</h1>
<div class="category-news">
    <a href="{{ route('category', $categories[0]->url) }}" class="good-news">{{ $categories[0]->name }}</a>
    <a href="{{ route('category', $categories[1]->url) }}" class="bad-news">{{ $categories[1]->name }}</a>
</div>
<div class="news-items">
    @foreach($news as $item)
    <div class="card">
        <img src="/img/{{ $item->img }}" class="card-img-top" style="width: 30%; padding: 10px" alt="news-img">
        <div class="card-body">
            <h5 class="card-title">{{ $item->title }}</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        <div class="card-body">
            <a href="{{ route('news-cart', $item->id) }}" class="card-link">Далее...</a>
        </div>
    </div>
    @endforeach
</div>
@endsection