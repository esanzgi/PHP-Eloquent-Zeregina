<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\DireccionesController;
use App\Http\Controllers\PostsController;

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

// Usuarios
Route::get('/usuarios', [UsuariosController::class, 'index'])->name('userIndex');
Route::post('/usuarios/create', [UsuariosController::class, 'addUser'])->name('addUser');
Route::get('/usuarios/{id}/edit', [UsuariosController::class, 'editView'])->name('editView');
Route::put('/usuarios/{id}', [UsuariosController::class, 'eguneratu'])->name('editUser');
Route::delete('/usuarios/{id}', [UsuariosController::class, 'ezabatu'])->name('deleteUser');

// Direcciones
Route::get('/direcciones', [DireccionesController::class, 'index'])->name('addressIndex');
Route::post('direcciones/{id}', [DireccionesController::class, 'addDireccion'])->name('addDireccion');
Route::delete('direcciones/{id}', [DireccionesController::class, 'ezabatu'])->name('deleteDireccion');

// Posts
Route::get('/posts', [PostsController::class, 'index'])->name('postIndex');
Route::get('/posts/{userId}/create', [PostsController::class, 'createPostView'])->name('createPostView');
Route::delete('/posts/{id}', [PostsController::class, 'ezabatu'])->name('deletePost');
Route::post('/posts/{userId}', [PostsController::class, 'createPost'])->name('createPost');
Route::put('/posts/{id}', [PostsController::class, 'updatePost'])->name('updatePost');
Route::get('/posts/{id}', [PostsController::class, 'updatePostView'])->name('updatePostView');