@extends('layouts.main')

@section('content')
{{ Form::model($category, ['route' => ['categories.update', $category->id]]) }}
@method('PUT')
@include('category._form')
{{ Form::close() }}
@endsection