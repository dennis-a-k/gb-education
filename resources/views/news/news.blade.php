@extends('layouts.main')

@section('title')
{{ __('lang.list-news') }}
@endsection

@section('main')
<h1>{{ __('lang.choice') }}</h1>
<div class="category-news">
    <a href="{{ route('category', $categories[0]->url) }}" class="good-news">{{ __('lang.good-news') }}</a>
    <a href="{{ route('category', $categories[1]->url) }}" class="bad-news">{{ __('lang.bad-news') }}</a>
</div>
<div class="news-items">
    @foreach($news as $item)
    <div class="card">
        <img src="/img/{{ $item->img }}" class="card-img-top" style="width: 30%; padding: 10px" alt="news-img">
        <div class="card-body">
            <h5 class="card-title">{{ $item->title }}</h5>
            <p class="card-text text-hidden">{{ $item->content }}</p>
        </div>
        <div class="card-body">
            <a href="{{ route('news-cart', $item->id) }}" class="card-link">{{ __('lang.next') }}...</a>
        </div>
    </div>
    @endforeach
</div>
@endsection