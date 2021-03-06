<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $movies = Movie::all();

      return view('movies.index',compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // valida i dati passati nel form in base alle regole del database
      // le regole di validazione sono in una funzione
      $request->validate($this->getValidationRules());

        // prende tutti dati inseriti nel form
        $data_request = $request->all();

        // crea la nuova entità con i dati ineriti nel form
        $new_movie = new Movie;
        // popolo una variabile con i dati passati nel form
        // $new_movie->title = $data_request['title'];
        // $new_movie->description = $data_request['description'];
        // $new_movie->year = $data_request['year'];
        // $new_movie->rating = $data_request['rating'];

        // con il metodo fill popola direttamente con i dati passati nel form
        $new_movie->fill($data_request);
        $new_movie->save();

        // prende l'ultima entità appena inserita
        $movie = Movie::orderBy('id','desc')->first();
        // la passa alla pagina show per mostrarla
        return redirect()->route('movies.show',$movie);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
      // Forma esplicita
      // $movie = Movie::find($id);
      // oppure
      // $movies = Movie::where('id', $id)->first();
      // e poi se l'array è vuoto da errore:
      // if(empty($movie)) {
      //   abort('404');
      // }
      // dd($movie);

      return view('movies.show',compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        return view('movies.edit',compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
      // valida i dati passati nel form in base alle regole del database
      // le regole di validazione sono in una funzione
      $request->validate($this->getValidationRules());

      // prende tutti idati del form (sia che siano stati cabiati o no)
      $data_request = $request->all();

      // sostituisce i dati del database con quelli appena presi dal form
      $movie->update($data_request);

      // passa i nuovi dati alla pagina view pr vedere i cambiamenti
      return redirect()->route('movies.show',$movie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movies.index');
    }

    protected function getValidationRules(){
      return [
        'title' => 'required|max:255',
        'description' => 'required',
        'year' => 'required|integer|min:1985|max:2020',
        'rating' => 'required|integer|min:1|max:10'
      ];
    }
}
