@extends('layouts.app')

@section('content')
<div class="container edit">
    <h1 class="my-5">Modifica il tuo post: {{ $post->title }}</h1>

    @if($errors->any())
        <div class="alert-danger py-3">
            <ul>
                @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('admin.posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- title --}}
        <div class="mb-3">
          <label for="title" class="form-label">Titolo post</label>
          <input type="text" value="{{ $post->title }}"
          class="form-control @error('title') is-invalid @enderror"
          id="title" name="title" >
          {{-- <p id="error_title"></p> --}}

          @error('title')
            <p id="error_title" >{{ $message }}</p>
          @enderror
        </div>

        {{-- image --}}
        <div class="mb-3">
          <label for="image" class="form-label">Link immagine</label>
          <input type="text" value="{{ $post->image }}"
          class="form-control @error('image') is-invalid @enderror"
          id="image" name="image" >

          @error('image')
            <p>{{ $message }}</p>
          @enderror
        </div>

        {{-- category --}}
        <div class="mb-3">
            <select class="form-select p-2" name="category_id">
                <option value="">Scegli una categoria</option>
                @foreach ($categories as $category)

                <option
                 {{ $category->id == old('category_id', $post->category->id)? 'selected': '' }}
                value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach

            </select>
        </div>

        {{-- author --}}
        <div class="mb-3">
          <label for="author" class="form-label">Autore</label>
          <input type="text" value="{{ $post->author }}"
          class="form-control @error('author') is-invalid @enderror"
          id="author" name="author" >

          @error('author')
            <p>{{ $message }}</p>
          @enderror
        </div>

        {{-- reading_time --}}
        <div class="mb-3">
            <label for="reading_time" class="form-label">Tempo di lettura</label>
            <input type="text" value="{{ $post->reading_time }}"
            class="form-control @error('reading_time') is-invalid @enderror"
            id="reading_time" name="reading_time" placeholder="per es: 5">

            @error('reading_time')
                <p>{{ $message }}</p>
            @enderror
        </div>

        {{-- content --}}
        <div class="mb-3">
            <label for="content" class="form-label">Tetsto</label>
            <textarea
            class="form-control @error('content') is-invalid @enderror"
            name="content" id="content" cols="30" rows="10">{{ $post->content }}</textarea>
            @error('content')
                <p>{{ $message }}</p>
            @enderror
        </div>

    </form>
    <button type="submit" class="btn btn-primary mr-4 rounded-pill">Pubblica corso</button>
    <h5 class="d-inline back">
        <i class="fa-solid fa-arrow-left"></i>
        <a href="{{ route('admin.posts.index') }}">Torna alla lista</a>
    </h5>

@endsection
