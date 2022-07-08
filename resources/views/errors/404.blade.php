@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-5">Errore:</h1>
    <h2>{{ $exception->getMessage() }}</h2>

@endsection
