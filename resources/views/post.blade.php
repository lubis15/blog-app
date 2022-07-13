@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h2 class="text-decoration-none mb-3"> {{ $post->judul }} </h2>
                <p>By.<a href="/posts?user={{ $post->user->username }}" class="text-info text-decoration-none">
                        {{ $post->user->name }}
                    </a> in <a href="/posts?category={{ $post->category->slug }}" class="text-info text-decoration-none">
                        {{ $post->category->name }}</a> </p>

                @if ($post->image)
                    <div style="max-height: 350px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top mt-4"
                            alt="{{ $post->category->name }}" class="img-fluid ">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top mt-4"
                        alt="{{ $post->category->name }}" class="img-fluid ">
                @endif
                <articel class="my-4 fs-6">
                    {!! $post->body !!}
                </articel>

                <br>
                <a class="text-decoration-none btn btn-info mt-4" href="/posts"><i
                        class="bi bi-arrow-left-short"></i>Back</a>
            </div>
        </div>
    </div>
@endsection
