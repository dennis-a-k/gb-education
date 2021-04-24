@extends('layouts.main')

@section('title')
  {{ __('lang.create') }} {{ __('lang.profile') }}
@endsection

@section('main')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form class="create" action="{{ route('store') }}" method="post">
    @csrf
        <input class="form-control" type="text" placeholder="{{ __('lang.name') }}" name="name">
        <input class="form-control" type="email" placeholder="{{ __('lang.email') }}" name="email">
        <input class="form-control" type="password" placeholder="{{ __('lang.password') }}" name="password">
        <div class="border rounded p-2 mb-2">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline1" name="is_admin" class="custom-control-input" value="1" checked>
                <label class="custom-control-label" for="customRadioInline1">{{ __('lang.admin') }}</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline2" name="is_admin" class="custom-control-input" value="0">
                <label class="custom-control-label" for="customRadioInline2">{{ __('lang.user') }}</label>
            </div>
        </div>
        <a href="{{ route('admin::users') }}" class="btn btn-outline-dark" style="width: 200px">{{ __('lang.cancel') }}</a>
        <button type="submit" class="btn btn-danger" style="width: 200px">{{ __('lang.create') }}</button>
    </form>
@endsection