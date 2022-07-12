@extends('layouts.app')

@section('content')
<div class="container create">
    <h1 class="my-5">Crea un nuovo Post!</h1>

    @if($errors->any())
        <div class="alert-danger py-3">
            <ul>
                @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label for="title" class="form-label">Titolo post</label>
          <input type="text" value="{{ old('title') }}"
          class="form-control @error('title') is-invalid @enderror"
          id="title" name="title" >

          @error('title')
            <p>{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-3">
          <label for="image" class="form-label">Link immagine</label>
          <input type="text" value="{{ old('image') }}"
          class="form-control @error('image') is-invalid @enderror"
          id="image" name="image" >

          @error('image')
            <p>{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-3">

            <select class="form-select p-2" name="category_id">
                <option value="">Scegli una categoria</option>
                @foreach ($categories as $category)

                <option
                 {{ $category->id == old('category_id')? 'selected': '' }}
                value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach

            </select>

        </div>

        <div class="mb-3">
          <label for="author" class="form-label">Autore</label>
          <input type="text" value="{{ old('author') }}"
          class="form-control @error('author') is-invalid @enderror"
          id="author" name="author" >

          @error('author')
            <p>{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-3">
            <label for="reading_time" class="form-label">Tempo di lettura</label>
            <input type="text" value="{{ old('reading_time') }}"
            class="form-control @error('reading_time') is-invalid @enderror"
            id="reading_time" name="reading_time" placeholder="per es: 5">

            @error('reading_time')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Tetsto</label>
            <textarea
            class="form-control @error('content') is-invalid @enderror"
            name="content" id="content" cols="30" rows="10">{{ old('reading_time') }}</textarea>
            @error('content')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mr-4 rounded-pill">Pubblica Post</button>
        <h5 class="d-inline back">
            <i class="fa-solid fa-arrow-left"></i>
            <a href="{{ route('admin.posts.index') }}">Torna alla lista</a>
        </h5>
      </form>


@endsection
