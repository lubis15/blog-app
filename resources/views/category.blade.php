
@extends('layouts.main')


@section('container')

    
    <h1 class="mb-5"> Post Categori {{$category}} </h1>
    @foreach ($posts as $post )
    <article class="mb-5">
       <h2>
       <a class="text-decoration-none" href="/posts/{{$post->slug}}">{{$post->judul}}</a>
       </h2>
        <p class="text-decoration-none"> {{$post->excerpt}} </p>
         </article>
    @endforeach
   

@endsection