@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col text-center">
        <a href="{{ url('profiles/create') }}" class="btn btn-primary">New Profile</a>
    </div>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Age</th>
            <th>Action button</th>
        </tr>
    </thead>
    <!-- Loop data from DB here -->
    @foreach ($profiles as $profile)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $profile->name }}</td>
        <td>{{ $profile->age }}</td>
        <td></td>
    </tr>
    @endforeach
</table>

@endsection