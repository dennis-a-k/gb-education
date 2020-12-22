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
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="20" placeholder="News Text" name="content"></textarea>
  <a href="{{ route('admin::news') }}" class="btn btn-outline-danger" style="width: 200px">Сancel</a>
  <button type="submit" class="btn btn-danger" style="width: 200px">Create</button>
</form>
@endsection