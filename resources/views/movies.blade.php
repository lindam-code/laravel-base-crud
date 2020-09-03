<h1>Lista dei film</h1>

@foreach ($movies as $movie)
  <div>
    <h2>{{$movie->title}}</h2>
    <a href={{ route('movies.show',$movie->id)}}>Vedi info film</a>
  </div>
@endforeach
