@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Create new post</h2>
    </div>
    <div class="col-lg-8">
        <form action="/dashboard/posts" method="post" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul post</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul"
                    required autofocus value="{{ old('judul') }}">
                @error('judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug post</label>
                <input type="text" class="form-control" id="slug" name="slug" readonly
                    value="{{ old('slug') }}">
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Pilih Category Post</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                        @if (old('category_id') == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Post Gambar</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                    name="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

            {{-- with trix-editor
            <div class="mb-3">
                <label for="body" class="form-label">Isi Blog</label>
                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                <trix-editor input="body"></trix-editor>
            </div> --}}


            {{-- with ck-editor --}}
            <div class="mb-3">
                <label for="editor" class="form-label">Isi Blog</label>
                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <textarea id="editor" type="hidden" name="body">{{ old('body') }}</textarea>
            </div>


            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

    {{-- Using the Fetch API --}}
    <script>
        const judul = document.querySelector('#judul');
        const slug = document.querySelector('#slug');

        judul.addEventListener('change', function() {
            fetch('/dashboard/posts/checkSlug?judul=' + judul.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        //supaya file upload tidak bisa di jalankan
        document.addEventListener('trix-file-accept', function(event) {
            event.preventDefault();
        });

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            // perintah untuk ambil data gambarnya
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            //load gambar yang mau ditampilkan
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
