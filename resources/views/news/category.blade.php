@extends('layouts.main')

@section('title')
  {{ $category->name }}
@endsection

@section('main')
  <h1>
  You have {{ $category->news->count() }} {{ $category->name }}
  </h1>
  @foreach($category->news as $item)
  <div class="card" style="margin-bottom: 10px">
    <div class="row no-gutters">
      <div class="col-md-2">
        <img src="/img/{{ $item->img }}" class="card-img" style="width: 30%; padding: 10px" alt="news-img">
      </div>
      <div class="col-md-10">
        <div class="card-body">
          <h5 class="card-title">{{ $item->title }}</h5>
          <a href="{{ route('news-cart', $item->id) }}" class="card-link">Далее...</a>
        </div>
      </div>
    </div>
  </div>
  @endforeach
@endsection