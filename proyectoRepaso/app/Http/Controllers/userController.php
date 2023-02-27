<?php

namespace App\Http\Controllers;

use App\Models\Hechizo;
use App\Models\Phone;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Validator;


class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $hechizos = Hechizo::all();
        $users = User::all();
        return view('creaUsuarios',compact('users','hechizos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){

            $users = new User();
            return view('creaUsuarios',compact('users'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate(['name'=>'required|min:1|max:10', 'email'=>'required', 'password'=>'min:8','numero'=>'required|min:9|max:9']);
    
        $user =  User::create($validate);

        return back()->with('success','Usuario creado con éxito!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){
        
       $user  = User::findOrFail($id);
       return view('verUsuario',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){

        $user = User::findOrFail($id);
        return view('editarUsuario',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_usuario)
    {
        $validate = null;

        if($request->password_c !=null) {
            $validate = $request->validate(['name'=>'required|min:1|max:10', 'email'=>'required', 'password_c'=>'required|min:8','password'=>'required|min:8']);
            $validate['password'] = trim($request->password_c);
        }else{
            $validate = $request->validate(['name'=>'required|min:1|max:10', 'email'=>'required', 'password'=>'required' ]);
        }

        $user =  User::find($id_usuario)->update($validate);
        return  redirect()->route('verUsuarios')->with('success','Usuario editado con éxito');
        
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
    
        $user = User::findOrFail($id);
        $user->delete();
        return  redirect()->route('verUsuarios')->with('success','Usuario eliminado con éxito');

    }

    public function login(Request $request){

        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $credentials = $request->except(['_token']);

        if(auth()->attempt($credentials)){

            return redirect()->route('verUsuarios');

        }else{

            session()->flash('message', 'Invalid credentials');
            return redirect()->back();
        }
    }

    public function registro(Request $request){
        
        $validate = $request->validate(['name'=>'required|min:1|max:10', 'email'=>'required', 'password'=>'min:8','numero'=>'required|min:9|max:9']);
    
        $user = User::create([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'password' => Hash::make($validate['password']),
        ]);

        $user->phone()->save(new Phone(['numero'=>$validate['numero']]));

        return redirect()->route('loginInicio');
    }


    public function admin(){
        return view('adminUsuario');
    }

}
