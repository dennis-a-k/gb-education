@extends('layouts.main')

@section('title')
    Новость-{{ $news->id }}
@endsection

@section('main')
    <h1>{{ $news->title }}</h1>
    <h4>{{ $news->category->description }}</h4>
    <p class="source">Источник: {{ $news->source->name }}</p>
    <img src="/img/{{ $news->img }}" class="card-img-top" style="width: 10%; padding: 10px" alt="news-img">
    <p class="text-justify">
        {{ $news->content }}
    </p>
    <span class="text-secondary float-right">
        <em>
            {{ $news->publish_date }}
        </em>
    </span>
@endsection