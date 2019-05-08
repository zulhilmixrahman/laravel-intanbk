@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col text-right">
        <a href="{{ route('categories.create') }}" class="btn btn-primary">New Category</a>
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
    @foreach ($categories as $category)
    <tr>
        <td>{{ ($categories->perPage() * ($categories->currentPage() - 1)) + $loop->iteration }}</td>
        <td>{{ $category->name }}</td>
        <td class="text-center">
            <!-- Delete Button using submit form -->
            {!! Form::open(['route' => ['categories.destroy', $category->id]]) !!}
            @method('DELETE')

            <!-- Edit Button -->
            <a href="{{ route('categories.edit', ['id' => $category->id]) }}" class="btn btn-warning">Edit</a>

            <button type="submit" class="btn btn-danger">Delete</button>
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
</table>

{{ $categories->links() }}

@endsection