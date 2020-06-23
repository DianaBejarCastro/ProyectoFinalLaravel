<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Materia;

class MateriaController extends Controller
{
    //
    public function index()
    {

        $data = Materia::all();
        return view('materias.lista', compact('data'));
    }

    public function register()
    {
        return view('materias.registro');
    }
    public function store(Request $request)
    {
        $materia = new Materia();
        $request->validate([
            'nombre' =>  ['required', 'regex:/^[\pL\s\-]+$/u'],
            'turno' => 'required',
            'fechaInicio' => ['required', 'date', 'after:today'],
            'fechaFinal' => ['required', 'date', 'after:fechaInicio'],
        ]);
        //DB::table('materias')->insert([
        //    'nombre' => $request->nombre,
        //    'turno' => $request->turno,
        //    'fechaInicio' => $request->fechaInicio,
        //    'fechaFinal' => $request->fechaFinal
        //]);
        $materia->nombre = $request->nombre;
        $materia->turno = $request->turno;
        $materia->fechaInicio = $request->fechaInicio;
        $materia->fechaFinal = $request->fechaFinal;

        $materia->saveOrFail();

        return $this->index();
    }

    public function getDates($id)
    {
        $data = Materia::findOrFail($id);
        return view('materias.editar', compact('data'));
    }


    public function edit(Request $request)
    {

        $request->validate([
            'nombre' =>  ['required', 'regex:/^[\pL\s\-]+$/u'],
            'turno' => 'required',
            'fechaInicio' => ['required', 'date', 'after:today'],
            'fechaFinal' => ['required', 'date', 'after:fechaInicio'],
        ]);
        //  DB::table('estudiantes')->insert([
        //    'ci' => $request->ci, 'nombre' => $request->nombre, 'apellido' => $request->apellido, 'correo' => $request->correo
        //]);
        $data = Materia::findOrFail($request->id);
        $data->nombre = $request->nombre;
        $data->turno = $request->turno;
        $data->fechaInicio = $request->fechaInicio;
        $data->fechaFinal = $request->fechaFinal;

        $data->saveOrFail();


        return $this->index();
    }

    public function destroy($id)
    {
        $data = Materia::findOrFail($id);
        $data->delete();
        return redirect()->route('materias.index');
    }
    public function list()
    {
        $data = Materia::all();

        return view('materias.lista', compact('data'));
    }
}
