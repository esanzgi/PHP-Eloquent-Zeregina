<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use Illuminate\Validation\Rule;

class UsuariosController extends Controller
{
    public function index()
    {
        $users = Usuarios::all();
        return view('erabiltzaileaGehitu', ['users' => $users]);
    }

    public function addUser(Request $request) 
    {
        $this->validateUserInput($request);

        Usuarios::create([
            'izena' => $request->izena,
            'adina' => $request->adina,
            'email' => $request->email,
            'jaiotze_data' => $request->jaiotze_data,
            'generoa' => $request->generoa,
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
        $this->validateUserInput($request);

        $user = Usuarios::find($id);

        if($user) {
            $user->update([
                'izena' => $request->izena,
                'adina' => $request->adina,
                'email' => $request->email,
                'jaiotze_data' => $request->jaiotze_data,
                'generoa' => $request->generoa,
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

    private function validateUserInput(Request $request)
    {
        return $request->validate([
            'izena' => 'required|string|regex:/^[\pL\s]+$/u|max:255',
            'adina' => 'required|integer|between:16,110',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('usuarios', 'email')->ignore($request->id),
            ],
            'jaiotze_data' => 'required|date|before_or_equal:today',
            'generoa' => 'required|in:maskulinoa,femeninoa',
        ]);
    }

}
