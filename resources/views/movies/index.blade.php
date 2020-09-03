<h1>Lista dei film</h1>

<ul>
  @foreach ($movies as $movie)
    <li> Titolo: {{ $movie->title }}
      <a href={{ route('movies.show',$movie->id)}}>Vedi info film</a>
    </li>
  @endforeach
</ul>
