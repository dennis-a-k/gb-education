@extends('layouts.main')

@section('title')
  Создать Новость
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
    <form class="create" action="{{ route('submit') }}" method="post">
    @csrf
        <!-- <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose Image</label>
        </div> -->
        <input class="form-control" type="text" placeholder="Заголовок" name="title">
        <div class="border rounded p-2 mb-2">
          <h6>Категория Новости<h6>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline1" name="category" class="custom-control-input" value="1" checked>
                <label class="custom-control-label" for="customRadioInline1">Good News</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline2" name="category" class="custom-control-input" value="2">
                <label class="custom-control-label" for="customRadioInline2">Bed News</label>
            </div>
        </div>
        <div class="border rounded p-2">
          <h6>Источник<h6>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline3" name="source" class="custom-control-input" value="1" checked>
                <label class="custom-control-label" for="customRadioInline3">Интернет</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline4" name="source" class="custom-control-input" value="2">
                <label class="custom-control-label" for="customRadioInline4">Телевидение</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline5" name="source" class="custom-control-input" value="3">
                <label class="custom-control-label" for="customRadioInline5">Газеты</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline6" name="source" class="custom-control-input" value="4">
                <label class="custom-control-label" for="customRadioInline6">Сарафан</label>
            </div>
        </div>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="20" placeholder="Текст" name="content"></textarea>
        <a href="{{ route('admin::news') }}" class="btn btn-outline-dark" style="width: 200px">Отмена</a>
        <button type="submit" class="btn btn-danger" style="width: 200px">Создать</button>
    </form>
@endsection