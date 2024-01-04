<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;

class UsuariosController extends Controller
{
    public function index()
    {
        $users = Usuarios::all();
        return view('erabiltzaileaGehitu', ['users' => $users]);
    }

    public function addUser(Request $request) 
    {
        Usuarios::create([
            'izena' => $request->izena
        ]);
        return redirect()->route('userIndex');
    }

    public function editView($id)
    {
        $user = Usuarios::findOrFail($id);
        return view('editErabiltzaile', compact('user'));
    }

    public function eguneratu(Request $request, $id)
    {
        $user = Usuarios::find($id);

        if($user) {
            $user->update([
                'izena' => $request->izena,
            ]);
        }

        return redirect()->route('userIndex');
    }

    public function ezabatu($id) 
    {
        $user = Usuarios::find($id);

        if($user) {
            $user->delete();
        }
        return redirect()->route('userIndex');
    }
}
