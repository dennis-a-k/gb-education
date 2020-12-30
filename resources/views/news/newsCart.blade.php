@extends('layouts.main')

@section('title')
    Новость-{{ $news->id }}
@endsection

@section('main')
    <h1>{{ $news->title }}</h1>
    <img src="/img/{{ $news->img }}" class="card-img-top" style="width: 10%; padding: 10px" alt="news-img">
    <p class="text-justify">
        {{ $news->content }}
    </p>    
@endsection