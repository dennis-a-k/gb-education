@extends('layouts.main')

@section('title')
  {{ __('lang.list-news') }}
@endsection

@section('main')
  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif
  <a href="{{ route('create') }}" class="btn btn-danger" style="margin-bottom: 10px; display: block">+ {{ __('lang.add-news') }}</a>
  @foreach($news as $item)
  <div class="card" style="margin-bottom: 10px">
    <div class="row no-gutters">
      <div class="col-md-2">
        <img src="/img/{{ $item->img }}" class="card-img" style="width: 30%; padding: 10px" alt="news-img">
      </div>
      <div class="col-md-10">
        <div class="card-body">
          <h5 class="card-title">{{ $item->title }}</h5>
          <a href="{{ route('admim::news-cart', $item->id) }}" class="card-link">{{ __('lang.next') }}...</a>
          <a href="{{ route('update', $item->id) }}" class="btn btn-danger">{{ __('lang.update') }}</a>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  <hr>
  <div class="row justify-content-center">
    {{ $news->onEachSide(5)->links('vendor.pagination.bootstrap-4') }}
  </div>
@endsection