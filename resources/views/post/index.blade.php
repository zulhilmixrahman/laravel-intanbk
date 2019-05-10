@extends('layouts.main')

@section('content')
<div class="row mb-2">
    <div class="col text-right">
        <a href="{{ route('posts.create') }}" class="btn btn-primary">New Post</a>
    </div>
</div>

<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Date</th>
            <th>Category</th>
            <th>Name</th>
            <th>Created At</th>
            <th style="width: 200px;">Action Button</th>
        </tr>
    </thead>
    <!-- Loop data from DB here -->
    @foreach ($posts as $post)
    <tr>
        <td>{{ ($posts->perPage() * ($posts->currentPage() - 1)) + $loop->iteration }}</td>
        <td>
            @if($post->image != null)
            <img src="{{ asset($post->image) }}" style="width: 100px;">
            @endif

            <a href="{{ asset($post->image) }}">Download</a>
        </td>
        <td>{{ $post->date->format('d-m-Y') }}</td>
        <td>{{ $post->category->name }}</td>
        <td>
            {{ $post->title }}<br>
            Tags: <br>
            @foreach ($post->tags as $tag)
            <span class="badge badge-info">{{ $tag->name }}</span>
            @endforeach
        </td>
        <td>{{ $post->created_at->format('d-m-Y, H:i A') }}</td>
        <td class="text-center">
            <!-- Delete Button using submit form -->
            {!! Form::open(['route' => ['posts.destroy', $post->id]]) !!}
            @method('DELETE')

            <!-- Edit Button -->
            <a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="btn btn-warning">Edit</a>

            <!-- Delete Button (Submit Form) -->
            <button type="submit" class="btn btn-danger">Delete</button>
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
</table>

{{ $posts->links() }}

@endsection