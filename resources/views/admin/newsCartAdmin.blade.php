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
    <a href="{{ route('admin::news') }}" class="btn btn-outline-dark" style="width: 200px">Назад</a>
    <a href="{{ route('update', ['id' => $news->id]) }}" class="btn btn-outline-danger" style="width: 200px">Редактировать</a>
    <a href="{{ route('news::delete', ['id' => $news->id]) }}" class="btn btn-danger" style="width: 200px">Удалить</a>
@endsection