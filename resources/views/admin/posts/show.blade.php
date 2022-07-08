@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-5">Post:{{ $post->title }}</h1>
    <h3 class="my-5">Ultima modifica: {{ $post->updated_at }}</h3>

    <div class="row">
        <div class="col-6 post">
            <img class="img-fluid" src="{{ $post->image }}" alt="{{ $post->title }}">
        </div>
        <div class="col-6">
            <p>#ID {{ $post->id }}</p>
            <h3>Titolo:{{ $post->title }}</h3>
            <p>Tempo di lettura:{{ $post->reading_time }} minuti</p>
            <p>Autore:{{ $post->author }}</p>
            <p>Categoria: {{ $post->category }}</p>
            <h5>Contenuto:</h5>
            <p>{{ $post->content }}</p>
        </div>
    </div>
    <div class="row mt-5">
        <a type="button" class="btn btn-info" href="{{ route('admin.posts.index') }}">Back to list</a>
        <a type="button" class="btn btn-warning mx-4" href="{{ route('admin.posts.edit', $post) }}">Edit</a>
    </div>


</div>
@endsection
