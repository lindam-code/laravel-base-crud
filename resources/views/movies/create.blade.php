<h1>Inserisci un nuovo film</h1>
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

{{-- Form per inserire un nuovo film nel database --}}
<form action="{{ route('movies.store') }}" method="post">
  @csrf
  @method('POST')
  <div >
    <label>Titolo</label>
    <input type="text" name="title" value="{{ old('title') }}">
  </div>

  <div >
    <label>Descrizione</label>
    <textarea name="description" rows="8" cols="80">{{ old('description') }}</textarea>
  </div>

  <div >
    <label>Anno</label>
    <input type="number" name="year" value="{{ old('year') }}">
  </div>

  <div >
    <label>Rating</label>
    <input type="number" name="rating" value="{{ old('rating') }}">
  </div>

  <div>
    <input type="submit" value="Salva">
  </div>
</form>
