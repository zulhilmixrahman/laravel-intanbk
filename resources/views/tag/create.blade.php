@extends('layouts.main')

@section('content')
{{ Form::open(['route' => 'tags.store']) }}
@include('tag._form')
{{ Form::close() }}
@endsection