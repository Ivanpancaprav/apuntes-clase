<?php

use App\Http\Controllers\HechizoController;
use App\Http\Controllers\photoController;
use App\Http\Controllers\userController;
use App\Models\Hechizo;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/formInsertPhoto/{id_usuario}', [PhotoController::class,'create'])->name('createPhoto');
Route::post('/insertarPhoto/{id_usuario}', [PhotoController::class,'insertar'])->name('insertarPhoto');

Route::get('/verPhotos',[PhotoController::class,'index']);
Route::get('/getPhoto/{id_photo}',[PhotoController::class,'index']);
Route::delete('/borraPhotos/{id_photo}',[PhotoController::class,'delete'])->name('delete');
// Route::update('/actualizaPhoto/{id_photo}',[PhotoController::class,'update'])->name('update');

//rutas crea usuarios 
Route::view('/formUsuarios','creaUsuarios');
Route::get('/verUsuarios',[userController::class,'index'])->name('verUsuarios');

Route::post('/creaUsuario',[userController::class,'store'])->name('creaUsuario');
Route::delete('/borraUsuario/{id_usuario}',[userController::class,'destroy'])->name('borraUsuario');

Route::view('/editarUsuario','editarUsuario');
route::get('/editarUser/{id_usuario}',[userController::class,'edit'])->name('editarUser');

route::patch('/updateUsuario/{id_usuario}',[userController::class,'update'])->name('updateUsuario');
Route::get('/verUsuario/{id_usuario}',[userController::class,'show'])->name('verUsuario');


//rutas anyade hechizos
Route::post('/creaHechizo',[HechizoController::class,'create'])->name('creaHechizo');
Route::delete('/borraHechizo/{id_hechizo}',[HechizoController::class,'destroy'])->name('borraHechizo');

Route::get('/formHechizos/{id_usuario}',[HechizoController::class,'formHechizo'])->name('formHechizo');
Route::post('/guardarHechizo/{id_usuario}',[HechizoController::class,'guardarHechizo'])->name('guardarHechizo');


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/usuario','auth.usuario');

//LOGIN A MANO

Route::view('/loginUser', 'loginUser')->name('loginInicio');
Route::post('/login-usuario',[userController::class, 'login'])->name('loginUsuario');

Route::view('/registrarUser','registrarUser')->name('registrarUser');
Route::post('/registrar-usuario',[userController::class,'registro'])->name('registrar');



Route::group(['middleware' => 'admin'], function(){

    Route::get('/admin', [userController::class, 'admin'])->name('admin');
    // Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});