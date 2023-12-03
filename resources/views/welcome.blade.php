<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2 class="text-center mt-4">Fitur input gambar</h2>
        <div class="mt-5">
            <form action="/" method="post" enctype="multipart/form-data">
                @csrf
                <label for="image" class="form-label">Input gambar</label>
                <input class="form-control" type="file" id="image" name="image" required>

                <button type="submit" class="btn btn-primary mt-4">Kirim</button>
            </form>
        </div>
        <hr>
        <div class="mt-3">
            @foreach ($post as $post)
                <img class="ma-3" src="http://127.0.0.1:8000/storage/{{ $post->image }}"
                    style="max-width: 300px; overflow:hidden;">
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
