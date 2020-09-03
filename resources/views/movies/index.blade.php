<h1>Lista dei film</h1>
<div>
  <ul>
    @foreach ($movies as $movie)
      <li> Titolo: {{ $movie->title }}
        <a href={{ route('movies.show',$movie->id) }}>Vedi info film</a>
        <a href={{ route('movies.edit',$movie->id) }}>Modifica info film</a>

        <form action="{{ route('movies.destroy',$movie->id) }}" method="post">
          @csrf
          @method('DELETE')
          <input type="submit" value="Elimina">
        </form>
      </li>
    @endforeach
  </ul>

  <a href="{{ route('movies.create')}}">Crea un nuovo film</a>
</div>
