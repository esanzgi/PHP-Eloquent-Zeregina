<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;

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

Route::get('/usuarios', [UsuariosController::class, 'index'])->name('userIndex');
Route::post('/usuarios/create', [UsuariosController::class, 'addUser'])->name('addUser');
Route::get('/usuarios/{id}/edit', [UsuariosController::class, 'editView'])->name('editView');
Route::put('/usuarios/{id}', [UsuariosController::class, 'eguneratu'])->name('editUser');
Route::delete('/usuarios/{id}', [UsuariosController::class, 'ezabatu'])->name('deleteUser');