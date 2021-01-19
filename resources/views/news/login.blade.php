@extends('layouts.main')

@section('title')
  {{ __('lang.login') }}
@endsection

@section('main')
<form class="form">
  <div class="form-group">
    <label for="exampleInputEmail1">{{ __('lang.email') }}</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">{{ __('lang.password') }}</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <!-- <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <button type="submit" class="btn btn-danger">{{ __('lang.login') }}</button>
</form>
@endsection