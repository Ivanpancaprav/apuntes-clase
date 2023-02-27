<?php

namespace App\Http\Controllers;

use App\Models\Hechizo;
use App\Models\User;
use Illuminate\Http\Request;

class HechizoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request){

        $validacion = $request->validate(['nombre' =>'required','coste_mana'=>'required','danyo'=>'required']);
        Hechizo::create($validacion);

        return redirect()->route('verUsuarios')->with('success','Hechizo creado con éxito');
    }

    public function formHechizo(string $id_usuario){

        $hechizos = Hechizo::all();
        $user = User::find($id_usuario);
        return view('anyadeHechizos',compact('user','hechizos'));

    }

    public function guardarHechizo(Request $request, string $id_usuario){

        $hechizo = Hechizo::findOrFail($request->id_hechizo);
        
        $user  = User::find($id_usuario);
        $user->hechizo()->attach($hechizo);
        return back()->with('success','Hechizo añadido con éxito');

    }
    /**
     * 
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
        $hechizo = Hechizo::findOrFail($id);
        $hechizo->delete();
        return  redirect()->route('verUsuarios')->with('success','Hechizo eliminado con éxito');

    }
}
