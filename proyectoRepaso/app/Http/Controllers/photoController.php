<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;

class photoController extends Controller
{


    public function insertar(Request $request){

        $user = User::find($request->id_usuario);
 
        $photo = new Photo(['descripcion'=>$request->descripcion,'fecha_toma'=>$request->fecha_toma]);

        $user->photos()->save($photo);

        return  redirect()->route('verUsuarios')->with('success','Foto añadidad con éxito');

    
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = Photo::all();
        return view('index',compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function  create($id_usuario)
    {
        $user = User::findOrFail($id_usuario);
        return view('insertarPhoto',compact('user',));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
