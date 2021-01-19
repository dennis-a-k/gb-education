@extends('layouts.main')

@section('title')
  {{ __('lang.profile') }}
@endsection

@section('main')
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h1>{{ __('lang.profile') }}</h1>
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
                @endforeach
          </ul>
        </div>
      @endif
      <form action="{{route('profile::update')}}" method="post">
        @csrf
        <div class="form-group">
          <label>{{ __('lang.name') }}</label>
          <input class="form-control" type="text" name="name" value="{{$user->name ?? old('name')}}">
        </div>
        <div class="form-group">
          <label>{{ __('lang.email') }}</label>
          <input class="form-control" type="email" name="email" value="{{$user->email ?? old('email')}}">
        </div>
        <div class="form-group">
          <label>{{ __('lang.new-password') }}</label>
          <input class="form-control" type="password" name="password">
        </div>
        <div class="form-group">
          <label>{{ __('lang.current-password') }}</label>
          <input class="form-control" type="password" name="current_password">
        </div>
        <div class="form-group">
          <input class="btn btn-danger" type="submit" value="{{ __('lang.save') }}">
        </div>
      </form>
    </div>
  </div>
@endsection