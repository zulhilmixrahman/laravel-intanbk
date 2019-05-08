

<div class="form-group">
    <div class="col">
        {{ Form::label('Nama') }}
        {{ Form::text('name', old('name'), ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-group">
    <div class="col text-right">
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>
</div>