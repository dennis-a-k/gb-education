@extends('layouts.main')

@section('title')
  Список новостей
@endsection

@section('main')
  <a href="{{ route('create') }}" class="btn btn-danger" style="margin-bottom: 10px; display: block">+ Добавить Новость</a>
  @foreach($news as $item)
  <div class="card" style="margin-bottom: 10px">
    <div class="row no-gutters">
      <div class="col-md-2">
        <img src="/img/{{ $item->img }}" class="card-img" style="width: 30%; padding: 10px" alt="news-img">
      </div>
      <div class="col-md-10">
        <div class="card-body">
          <h5 class="card-title">{{ $item->title }}</h5>
          <a href="{{ route('admim::news-cart', $item->id) }}" class="card-link">Далее...</a>
          <a href="{{ route('update', $item->id) }}" class="btn btn-danger">Редактировать</a>
        </div>
      </div>
    </div>
  </div>
  @endforeach
@endsection