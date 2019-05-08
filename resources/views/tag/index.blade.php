@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col text-right">
        <a href="{{ route('tags.create') }}" class="btn btn-primary">New Tag</a>
    </div>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Action button</th>
        </tr>
    </thead>
    <!-- Loop data from DB here -->
    @foreach ($tags as $tag)
    <tr>
        <td>{{ ($tags->perPage() * ($tags->currentPage() - 1)) + $loop->iteration }}</td>
        <td>{{ $tag->name }}</td>
        <td class="text-center">
            <!-- Delete Button using submit form -->
            {!! Form::open(['route' => ['tags.destroy', $tag->id]]) !!}
            @method('DELETE')

            <!-- Edit Button -->
            <a href="{{ route('tags.edit', ['id' => $tag->id]) }}" class="btn btn-warning">Edit</a>

            <button type="submit" class="btn btn-danger">Delete</button>
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
</table>

{{ $tags->links() }}

@endsection