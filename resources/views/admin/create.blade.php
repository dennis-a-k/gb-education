@extends('layouts.main')

@section('title')
  Create
@endsection

@section('main')
<form class="create" action="{{ route('submit') }}" method="post">
  @csrf
  <!-- <div class="custom-file">
    <input type="file" class="custom-file-input" id="customFile">
    <label class="custom-file-label" for="customFile">Choose Image</label>
  </div> -->
  <input class="form-control" type="text" placeholder="News Title" name="title">
  <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" id="customRadioInline1" name="category" class="custom-control-input" value="1" checked>
    <label class="custom-control-label" for="customRadioInline1">Good News</label>
  </div>
  <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" id="customRadioInline2" name="category" class="custom-control-input" value="2">
    <label class="custom-control-label" for="customRadioInline2">Bed News</label>
  </div>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="20" placeholder="News Text" name="content"></textarea>
  <a href="{{ route('admin::news') }}" class="btn btn-outline-danger" style="width: 200px">Сancel</a>
  <button type="submit" class="btn btn-danger" style="width: 200px">Create</button>
</form>
@endsection