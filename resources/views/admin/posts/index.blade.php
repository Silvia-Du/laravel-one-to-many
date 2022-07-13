@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="my-5">Tutti i tuoi post</h1>

    @if (session('prodotto cancellato'))
    <div class="debug p-3 mb-3 rounded-3">
        <p class="mb-0">{{ session('prodotto cancellato') }}</p>
    </div>
    @endif

    <table class="table">
        <thead class="table-light">
          <tr>
            <th scope="col">id</th>
            <th scope="col">Title</th>
            <th scope="col">Reading time</th>
            <th scope="col">Autore</th>
            <th scope="col">Categoria</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->reading_time }} min</td>
                <td>{{ $post->author }}</td>
                <td>{{ $post->category? $post->category->name: '-' }}</td>
                <td>
                    <a type="button" class="btn btn-info" href="{{ route('admin.posts.show', $post) }}">View more</a>
                    <a type="button" class="btn btn-light" href="{{ route('admin.posts.edit', $post) }}">edit</a>

                    <form class="d-inline"
                    action="{{ route('admin.posts.destroy', $post) }}"
                    onsubmit="return confirm('Confermi l\'eliminazione di{{ $post->title }}?')"
                    method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-dark">Elimina</button>
                    </form>

                </td>
            </tr>
        @endforeach

        </tbody>
      </table>
      {{ $posts->links() }}
    </div>
    <div class="category-section my-5 debug">
        <div class="container py-5">
            <h2 class="mb-4">Scegli per categoria</h2>


                @foreach ($categories as $category)
                <div class="_category p-1 debug mb-2">
                    <div class="box p-2 d-flex flex-wrap">

                        <h3 class="w-100 font-weight-bold ml-2 mb-3">{{ $category->name }}</h3>

                            @forelse ($category->posts as $post)
                                <div class="element p-3 mx-1 mb-2">
                                    <a href="{{ route('admin.posts.show', $post) }}">{{ $post->title }}</a>
                                </div>
                            @empty
                                <div class="element p-3 mx-1 mb-2">
                                    <p>Non ci sono post per questa categoria</p>
                                </div>
                            @endforelse
                    </div>


                </div>
                @endforeach


        </div>



    </div>
@endsection
