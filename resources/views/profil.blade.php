<html>

<head>
    <title>Profil</title>
</head>

<body>
    <h1>Profil Pengguna</h1>
    <h3>{{ $nama }}</h3>

    <ol>
        @foreach ($array as $item)
        <li>{{ $item }}</li>
        @endforeach
    </ol>

</body>

</html>