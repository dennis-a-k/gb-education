@extends('layouts.main')

@section('title')
  {{ $category->name }}
@endsection

@section('main')
<h1>
  {{ $category->name }}
</h1>
<div class="card" style="margin-bottom: 10px">
  <div class="row no-gutters">
    <div class="col-md-2">
      <img src="/img/news.png" class="card-img" style="width: 30%; padding: 10px" alt="news-img">
    </div>
    <div class="col-md-10">
      <div class="card-body">
        <h5 class="card-title">Новость 1</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <a href="{{ route('news-cart', 1) }}" class="card-link">Далее...</a>
      </div>
    </div>
  </div>
</div>
<div class="card" style="margin-bottom: 10px">
  <div class="row no-gutters">
    <div class="col-md-2">
      <img src="/img/news.png" class="card-img" style="width: 30%; padding: 10px" alt="news-img">
    </div>
    <div class="col-md-10">
      <div class="card-body">
        <h5 class="card-title">Новость 2</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <a href="{{ route('news-cart', 2) }}" class="card-link">Далее...</a>
      </div>
    </div>
  </div>
</div>
@endsection