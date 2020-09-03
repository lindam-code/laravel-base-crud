<h2>Titolo: {{ $movie->title }}</h2>

<ul>
  <li>Descrizione: {{ $movie->description }}</li>
  <li>Anno: {{ $movie->year }}</li>
  <li>Rating: {{ $movie->rating }}</li>
</ul>
<div>
  <a href="{{ route('movies.index')}}">Torna alla lista dei film</a>
</div>
