@extends('app')

@section('content')
    <h2 class="text-center">Fitur input gambar</h2>
    <div class="mt-5">
        <form action="{{ route('input-images.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="image" class="form-label">Input gambar</label>
            <input class="form-control" type="file" id="image" name="image" required>

            <button type="submit" class="btn btn-primary mt-4">Kirim</button>
        </form>
    </div>
    <hr>
    <div class="mt-3">
        <div class="row">
            @if ($post->count() > 0)
                @foreach ($post as $post)
                    <div class="col-4">
                        {{-- http://127.0.0.1:8000/storage/{{ $post->image }} --}}
                        <img src="{{ asset('storage/' . $post->image) }}"
                            style="width: 300px; overflow:hidden; display:block;">

                        <a class="btn btn-warning d-inline-block"
                            href="{{ route('input-images.edit', $post->id) }}">Edit</a>

                        <form action="{{ route('input-images.destroy', $post->id) }}" method="POST">
                            {{-- <form action="input-images/{{ $post->id }}" method="POST"> --}}
                            <input type="hidden" name="imageOld" value="{{ $post->image }}">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger d-block d-inline-block">Delete</button>
                        </form>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center">
                    <p>Data Tidak ada</p>
                </div>
            @endif

        </div>
    </div>
@endsection
