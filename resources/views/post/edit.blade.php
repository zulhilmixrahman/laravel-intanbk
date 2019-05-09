@extends('layouts.main')

@section('content')
{{ Form::model($post, ['route' => ['posts.update', $post->id], 'files' => true]) }}
@method('PUT')
@include('post._form')
{{ Form::close() }}
@endsection