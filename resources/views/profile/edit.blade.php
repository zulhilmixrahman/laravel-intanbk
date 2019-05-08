@extends('layouts.main')

@section('content')
{{ Form::model($profile, ['url' => 'profiles/update/' . $profile->id]) }}
<div class="form-group">
    <div class="col">
        {{ Form::label('Nama') }}
        {{ Form::text('name', old('name'), ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    <div class="col">
        {{ Form::label('Alamat') }}
        {{ Form::textarea('address', old('address'), ['class' => 'form-control', 'rows' => 5]) }}
    </div>
</div>
<div class="form-group">
    <div class="col">
        {{ Form::label('Poskod') }}
        {{ Form::text('postcode', old('postcode'), ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    <div class="col">
        {{ Form::label('Umur') }}
        {{ Form::number('age', old('age'), ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    <div class="col text-center">
        {{ Form::submit('Post Data', ['class' => 'btn btn-primary']) }}
    </div>
</div>
{{ Form::close() }}
@endsection