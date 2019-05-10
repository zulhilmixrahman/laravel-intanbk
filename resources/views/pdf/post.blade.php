<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Date</th>
                <th>Category</th>
                <th>Name</th>
                <th>Created At</th>
            </tr>
        </thead>
        <!-- Loop data from DB here -->
        @foreach ($posts as $post)
        <tr>
            <td>{{ $loop->iteration }}</td>
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
        </tr>
        @endforeach
    </table>

</body>

</html>