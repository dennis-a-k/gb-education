@extends('layouts.main')

@section('title')
  {{ __('lang.users') }}
@endsection

@section('main')
  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif
  <a href="{{ route('user::create') }}" class="btn btn-danger" style="margin-bottom: 10px; display: block">+ {{ __('lang.add-user') }}</a>
  <div class="row">
  @foreach($users as $item)
    <div class="col-sm-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">{{ $item->name }}</h5>
          <p class="card-text">{{ $item->email }}</p>
          <a href="{{ route('users::edit', $item->id) }}" class="btn btn-danger">{{ __('lang.update') }}</a>
        </div>
      </div>
    </div>
  @endforeach
  </div>
  <hr>
  <div class="row justify-content-center">
    {{ $users->onEachSide(5)->links('vendor.pagination.bootstrap-4') }}
  </div>
@endsection