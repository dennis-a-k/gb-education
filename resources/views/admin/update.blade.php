@extends('layouts.main')

@section('title')
    {{ __('lang.update') }}
@endsection

@section('main')
    <h1>{{ __('lang.update') }} {{ __('lang.the-news') }}</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form class="create" action="{{ route('update-submit', $news->id) }}" method="post">
    @csrf
        <!-- <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose Image</label>
        </div> -->
        <input class="form-control" type="text" placeholder="{{ __('lang.title') }}" name="title" value="{{ $news->title }}">
        <div class="border rounded p-2 mb-2">
            <h6>{{ __('lang.category') }}<h6>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline1" name="category" class="custom-control-input" value="1" checked>
                <label class="custom-control-label" for="customRadioInline1">{{ __('lang.good-news') }}</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline2" name="category" class="custom-control-input" value="2">
                <label class="custom-control-label" for="customRadioInline2">{{ __('lang.bad-news') }}</label>
            </div>
        </div>
        <div class="border rounded p-2">
            <h6>{{ __('lang.source') }}<h6>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline3" name="source" class="custom-control-input" value="1" checked>
                <label class="custom-control-label" for="customRadioInline3">{{ __('lang.internet') }}</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline4" name="source" class="custom-control-input" value="2">
                <label class="custom-control-label" for="customRadioInline4">{{ __('lang.tv') }}</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline5" name="source" class="custom-control-input" value="3">
                <label class="custom-control-label" for="customRadioInline5">{{ __('lang.newspaper') }}</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline6" name="source" class="custom-control-input" value="4">
                <label class="custom-control-label" for="customRadioInline6">{{ __('lang.other-news') }}</label>
            </div>
        </div>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="20" placeholder="{{ __('lang.text') }}" name="content">
            {{ $news->content }}
        </textarea>
        <a href="{{ route('admin::news') }}" class="btn btn-outline-dark" style="width: 200px">{{ __('lang.cancel') }}</a>
        <button type="submit" class="btn btn-danger" style="width: 200px">{{ __('lang.update') }}</button>
    </form>
@endsection