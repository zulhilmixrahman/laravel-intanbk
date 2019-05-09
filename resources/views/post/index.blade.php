@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col text-right">
        <a href="{{ route('posts.create') }}" class="btn btn-primary">New Post</a>
    </div>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Category</th>
            <th>Name</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Action button</th>
        </tr>
    </thead>
    <!-- Loop data from DB here -->
    @foreach ($posts as $post)
    <tr>
        <td>{{ ($posts->perPage() * ($posts->currentPage() - 1)) + $loop->iteration }}</td>
        <td>{{ $post->date->format('d-m-Y') }}</td>
        <td>{{ $post->category->name }}</td>
        <td>{{ $post->title }}</td>
        <td>
            @if($post->image != null)
            <img src="{{ asset($post->image) }}" style="width: 200px;">
            @endif
        </td>
        <td>
            <ol>
                @foreach ($post->tags as $tag)
                    <li>{{ $tag->name }}</li>
                @endforeach
            </ol>
        </td>
        <td class="text-center">
            <!-- Delete Button using submit form -->
            {!! Form::open(['route' => ['posts.destroy', $post->id]]) !!}
            @method('DELETE')

            <!-- Edit Button -->
            <a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="btn btn-warning">Edit</a>

            <button type="submit" class="btn btn-danger">Delete</button>
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
</table>

{{ $posts->links() }}

@endsection