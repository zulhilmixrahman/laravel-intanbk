@extends('layouts.main')

@section('content')
{{ Form::open(['url' => 'profile-form']) }}
<div class="form-group">
    <div class="col">
        {{ Form::label('Nombor 1') }}
        {{ Form::text('no1', old('no1'), ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    <div class="col">
        {{ Form::label('Nombor 2') }}
        {{ Form::text('no2', old('no2'), ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-group">
    <div class="col">
        {{ Form::label('Alamat') }}
        {{ Form::textarea('address', old('no2'), ['class' => 'form-control', 'rows' => 5]) }}
    </div>
</div>

<div class="form-group">
    <div class="col">
        {{ Form::label('Dropdown') }}
        {{ Form::select('list', ['m' => 'Medium', 'l' => 'Large', 'xl' => 'Extra Large'], 
                old('list'), ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-group">
    <div class="col-2">
        {{ Form::label('Jantina') }}
    </div>
    <div class="col">
        {{ Form::radio('gender', 'M', true) }}
        {{ Form::radio('gender', 'F', false) }}
    </div>
</div>

<div class="form-group">
    <div class="col-2">
        {{ Form::label('Admin Pengguna') }}
        {{ Form::checkbox('is_admin', 1, true) }}
    </div>
</div>

<div class="form-group">
    <div class="col text-center">
        {{ Form::submit('Post Data', ['class' => 'btn btn-primary']) }}
    </div>
</div>
{{ Form::close() }}
@endsection