@extends('layouts.main')

@section('content')
{{ Form::open(['route' => 'posts.store', 'files' => true]) }}
@include('post._form')
{{ Form::close() }}
@endsection