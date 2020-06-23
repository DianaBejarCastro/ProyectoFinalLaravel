<?php

namespace App\Http\Controllers;

use App\Mail\MessageRecived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Estudiante;
use Dotenv\Result\Success;

class EstudianteController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth')->only('store', 'edit', 'destroy');
    // }


    public function index()
    {

        $data = Estudiante::all();

        return view('estudiantes.lista', compact('data'));
    }
    public function register()
    {
        return view('estudiantes.registro');
    }
    public function store(Request $request)
    {
        $estudiante = new Estudiante();
        $message =  $request->validate([
            'ci' => ['required', 'regex:/^[0-9]+$/', 'unique:estudiantes'],
            'nombre' => ['required', 'regex:/^[\pL\s\-]+$/u'],
            'apellido' => ['required', 'regex:/^[\pL\s\-]+$/u'],
            'correo' => ['required', 'email', 'unique:estudiantes'],

        ]);
        //  DB::table('estudiantes')->insert([
        //    'ci' => $request->ci, 'nombre' => $request->nombre, 'apellido' => $request->apellido, 'correo' => $request->correo
        //]);
        $estudiante->ci = $request->ci;
        $estudiante->nombre = $request->nombre;
        $estudiante->apellido = $request->apellido;
        $estudiante->correo = $request->correo;

        $estudiante->saveOrFail();

        Mail::to('dianabejar78@gmail.com')->send(new MessageRecived($message));

        return response()->json(['success' => "Datos Registrados"]);
    }

    public function getDates($id)
    {
        $data = Estudiante::findOrFail($id);
        return view('estudiantes.editar', compact('data'));
    }
    public function edit(Request $request)
    {
        $request->validate([
            'ci' => ['required', 'regex:/^[0-9]+$/', 'unique:estudiantes,ci,' . $request->id],
            'nombre' => ['required', 'regex:/^[\pL\s\-]+$/u'],
            'apellido' => ['required', 'regex:/^[\pL\s\-]+$/u'],
            'correo' => ['required', 'email', 'unique:estudiantes,correo,' . $request->id],

        ]);
        //  DB::table('estudiantes')->insert([
        //    'ci' => $request->ci, 'nombre' => $request->nombre, 'apellido' => $request->apellido, 'correo' => $request->correo
        //]);
        $data = Estudiante::findOrFail($request->id);
        $data->ci = $request->ci;
        $data->nombre = $request->nombre;
        $data->apellido = $request->apellido;
        $data->correo = $request->correo;

        $data->saveOrFail();


        return redirect('estudiantes');
    }

    public function destroy($id)
    {
        $data = Estudiante::findOrFail($id);
        $data->delete();
        return redirect()->route('estudiantes.index');
    }
    public function list()
    {
        $data = Estudiante::all();

        return view('estudiantes.lista', compact('data'));
    }


    public function search(Request $request)
    {

        //$datoSearch = Estudiante::findOrFail($request->$id);
        $datoSearch = Estudiante::all($request->id);
        return view('estudiantes.index', compact('datoSearch'));
    }
}
