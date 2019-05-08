@extends('layouts.main')

@section('content')
{{ Form::model($tag, ['route' => ['tags.update', $tag->id]]) }}
@method('PUT')
@include('tag._form')
{{ Form::close() }}
@endsection