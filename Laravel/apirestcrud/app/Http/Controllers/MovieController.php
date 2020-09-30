<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //seleccionando todos los registros de la tabla
        //por medio del modelo Movie
        $movies = Movie::all();
        //imprimiendo en json la lista de registros
        echo json_encode($movies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //para mostrar los param del request
        //print_r($request->all());
        //creando objeto del modelo Movie
        $movie = new Movie();
        //Asignando datos del request a los atributos del modelo
        $movie->name=$request->input('name');
        $movie->description=$request->input('description');
        $movie->year=$request->input('year');
        $movie->genre=$request->input('genre');
        $movie->duration=$request->input('duration');
        //insertando data en bd
        $movie->save();
        echo json_encode($movie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $movie_id)
    {
        //buscando registro por medio de id con el modelo
        $movie = Movie::find($movie_id);
        //Asignando datos del request a los atributos del modelo
        $movie->name=$request->input('name');
        $movie->description=$request->input('description');
        $movie->year=$request->input('year');
        $movie->genre=$request->input('genre');
        $movie->duration=$request->input('duration');
        //guardando cambios en el registro
        $movie->save();        
        echo json_encode($movie);
    }

    public function show($movie_id){
        $movie = Movie::find($movie_id);
        echo json_encode($movie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($movie_id)
    {
        //buscando registro por id con ayuda del modelo
        $movie = Movie::find($movie_id);
        //eliminando registro
        $movie->delete();
    }
}
