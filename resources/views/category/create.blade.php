@extends('layouts.main')

@section('content')
{{ Form::open(['route' => 'categories.store']) }}
@include('category._form')
{{ Form::close() }}
@endsection