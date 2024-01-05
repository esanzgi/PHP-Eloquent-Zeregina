<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Temas;

class TemasController extends Controller
{
    public function index()
    {
        $temas = Temas::all();
        return view('temas', compact('temas'));
    }

    public function createTema(Request $request)
    {   
        Temas::create([
            'tema_izena' => $request->izena
        ]);
        return redirect()->route('temaIndex');
    }

    public function ezabatu($id)
    {
        Temas::find($id)->delete();
        return redirect()->route('temaIndex');
    }
}
