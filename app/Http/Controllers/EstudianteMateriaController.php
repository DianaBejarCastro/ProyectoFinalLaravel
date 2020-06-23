<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Estudiante_Materia;
use App\Materia;
use App\Estudiante;

class EstudianteMateriaController extends Controller
{
    public function  index()

    {
        // $dataMa = Estudiante_Materia::all();
        //$dataEs = Estudiante::all();
        //$dataMateria = Materia::all();

        $data = Estudiante_Materia::join(
            'estudiantes',
            'estudiantes_materia.estudiante_id',
            '=',
            'estudiantes.id'
        )->join(
            'materias',
            'estudiantes_materia.materia_id',
            '=',
            'materias.id'
        )->select('estudiantes.nombre', 'materias.nombre as materianame')->get();


        return view('estudiantes-materias.lista', compact('data'));
    }

    public function getDates($id)
    {
        $data = Estudiante::findOrFail($id);
        $dataMa = Materia::all();
        return view('estudiantes-materias.registro', compact('data', 'dataMa'));
    }
    public function store(Request $request)
    {
        $estudianteMateria = new Estudiante_Materia();
        $request->validate([
            'id' => 'required',
            'materia' => 'required',
        ]);

        $estudianteMateria->estudiante_id = $request->id;
        $estudianteMateria->materia_id = $request->materia;


        $estudianteMateria->saveOrFail();

        return response()->json(['success' => "Datos Registrados"]);
    }

    public function list()
    {
        $data = Estudiante_Materia::all();

        return view('estudiantes-materias.lista', compact('data'));
    }
}
