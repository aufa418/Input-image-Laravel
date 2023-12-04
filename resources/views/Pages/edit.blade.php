@extends('app')

@section('content')
    <h2 class="text-center">Edit Data</h2>
    <hr>
    <div class="mt-5">
        <form action="{{ route('input-images.update', $post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" type="file" name="imgOld" value="{{ $post->image }}">
            <img class="img-fluid" id="img-preview" style="display: block; width:300px;"
                src="{{ asset('storage/' . $post->image) }}">
            <br>
            <label for="image" class="form-label">Input gambar</label>
            <input class="form-control" type="file" id="image-input" name="image" onchange="changeImage()">

            <button type="submit" class="btn btn-primary mt-4">Kirim</button>
            <a href="/" class="btn mt-4">Back</a>
        </form>
    </div>

    <script>
        // Logic

        function changeImage() {
            const imagePreview = document.querySelector('#img-preview');
            const imageInput = document.getElementById('image-input');
            const fileReader = new FileReader();

            fileReader.onload = function(event) {
                imagePreview.src = event.target.result;
            }

            if (imageInput.files[0]) {
                fileReader.readAsDataURL(imageInput.files[0]);
            }
        }
    </script>
@endsection
