@extends('layouts.main')

@section('title')
    Update
@endsection

@section('main')
    <h1>Update</h1>
    <a href="{{ route('admin::news') }}" class="btn btn-outline-danger" style="width: 200px">Сancel</a>
    <button type="submit" class="btn btn-danger" style="width: 200px">Update</button>
@endsection