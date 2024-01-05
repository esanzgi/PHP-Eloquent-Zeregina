<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use App\Models\Direcciones;
use Illuminate\Support\Facades\DB;


class DireccionesController extends Controller
{
    public function index()
    {
        $usuariosConDirecciones = Usuarios::with('direcciones')->get();
        return view('helbideaGehitu', compact('usuariosConDirecciones'));   
    }

    public function addDireccion(Request $request, $userId)
    {
        try{
            DB::beginTransaction();

            $user = Usuarios::find($userId);

            $currentDirection = $user->direcciones;

            if($currentDirection) {
                $currentDirection->delete();
            }

            $newDirection = new Direcciones([
                'helbidea' => $request->helbidea
            ]);

            $user->direcciones()->save($newDirection);

            DB::commit();

        }catch(Exception $e) {
            DB::rollBack();
        }finally {
            return redirect()->route('addressIndex');
        }
    }

    public function ezabatu($id)
    {
        $user = Usuarios::find($id);

        if($user) {
            $user->direcciones->delete();
        }
        
        return redirect()->route('addressIndex');
    }
}
