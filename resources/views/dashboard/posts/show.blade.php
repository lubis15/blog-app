@extends('dashboard.layout.main')

@section('container')
    <div class="container">
        <div class="row  mb-5">
            <div class="col-lg-8">
                <h2 class="text-decoration-none mb-3"> {{ $post->judul }} </h2>
                <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span>Back to posts</a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning "><span data-feather="edit">
                    </span>Edit</a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger " onclick="return confirm('Are you sure?')"><span
                            data-feather="trash-2"></span>Delet</button>
                </form>
                @if ($post->image)
                    <div style="max-height: 350px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top mt-4"
                            alt="{{ $post->category->name }}" class="img-fluid mt-3">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top mt-4"
                        alt="{{ $post->category->name }}" class="img-fluid mt-3">
                @endif
                <articel class="my-4 fs-6">
                    {!! $post->body !!}
                </articel>

                <br>

            </div>
        </div>
    </div>
@endsection
