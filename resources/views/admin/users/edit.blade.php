@extends('layouts.main')

@section('title')
    {{ $user->name }}
@endsection

@section('main')
    <h1>{{ $user->name }}</h1>
    <h4>{{ $user->email }}</h4>
    @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
    @endif
    <form class="create" action="{{ route('user::update', $user->id) }}" method="post">
    @csrf
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
        <button type="submit" class="btn btn-outline-danger" style="width: 200px">{{ __('lang.update') }}</button>
        <a href="{{ route('user::delete', ['id' => $user->id]) }}" class="btn btn-danger" style="width: 200px">{{ __('lang.delete') }}</a>
    </form>
@endsection