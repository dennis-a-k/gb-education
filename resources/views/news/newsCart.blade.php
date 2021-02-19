@extends('layouts.main')

@section('title')
{{ __('lang.the-news') }}-{{ $news->id }}
@endsection

@section('main')
    <h1>{{ $news->title }}</h1>
    <h4>{{ $news->category->description }}</h4>
    <p class="source">{{ __('lang.source') }}: {{ $news->source->name }}</p>
    <p class="source">{{ __('lang.author') }}: {{ $news->author }}</p>
    <img src="/img/{{ $news->img }}" class="card-img-top" style="width: 10%; padding: 10px" alt="news-img">
    <p class="text-justify">
        {{ $news->content }}
    </p>
    <a href="{{ $news->link }}" style="display: block;" target="_blank">{{ __('lang.next') }}...</a><br>
    <span class="text-secondary float-right">
        <em>
            {{ $news->publish_date }}
        </em>
    </span>
@endsection