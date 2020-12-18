@extends('layouts.main')

@section('title')
    Список новостей
@endsection

@section('main')
<a href="{{ route('create') }}" class="btn btn-danger" style="margin-bottom: 10px; display: block">+ Add News</a>
<div class="card" style="margin-bottom: 10px">
  <div class="row no-gutters">
    <div class="col-md-2">
      <img src="/img/news.png" class="card-img" style="width: 30%; padding: 10px" alt="news-img">
    </div>
    <div class="col-md-10">
      <div class="card-body">
        <h5 class="card-title">Новость 1</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <a href="{{ route('admim::news-cart', 1) }}" class="card-link">Далее...</a>
        <a href="{{ route('update', 1) }}" class="btn btn-danger">Update</a>
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
        <a href="{{ route('admim::news-cart', 2) }}" class="card-link">Далее...</a>
        <a href="{{ route('update', 2) }}" class="btn btn-danger">Update</a>
      </div>
    </div>
  </div>
</div>
@endsection