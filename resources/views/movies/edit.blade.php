@extends('layouts.layout')
@section('page_content')

<h1>Modifica il film: {{ $movie->title}} </h1>
{{-- Messaggio di errore della validazione dei dati del form --}}
@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
    </ul>
  </div>
@endif

{{-- Form per modificare i dati del film --}}
<form action="{{ route('movies.update',$movie->id) }}" method="post">
  @csrf
  @method('PUT')
  <div >
    <label>Titolo</label>
    <input type="text" name="title" value="{{ $movie->title }}">
  </div>

  <div >
    <label>Descrizione</label>
    <textarea name="description" rows="8" cols="80">{{ $movie->description }}</textarea>
  </div>

  <div >
    <label>Anno</label>
    <input type="number" name="year" value="{{ $movie->year }}">
  </div>

  <div >
    <label>Rating</label>
    <input type="number" name="rating" value="{{ $movie->rating }}">
  </div>

  <div>
    <input type="submit" value="Salva">
  </div>
</form>

@endsection
