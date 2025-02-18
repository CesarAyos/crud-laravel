<?php

namespace App\Http\Controllers;

use App\Models\empleado;
use Illuminate\Http\Request;


class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // con este metodo traemos todos los datos de la tabla empleados
        $datos['empleados']=Empleado::paginate(5);
        return view('empleado.index' ,$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // con este metodo traemos  todos los resultados
        //$datosEmpleado = request()->all();

        // con este metodo traemos solo los resultados que queremos, en este caso todos menos el token
        $datosEmpleado = request()->except('_token');


        // con este metodo validamos si es una ftoto y la guardamos en la carpeta uploads y en la base de datos
        if($request->hasFile('Foto')){
            $datosEmpleado['Foto']=$request->file('Foto')->store('uploads','public');
        }

        // con este metodo insertamos los datos en la base de datos
        Empleado::insert($datosEmpleado);
        return response()->json($datosEmpleado);
    }

    /**
     * Display the specified resource.
     */
    public function show(empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(empleado $empleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, empleado $empleado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // con este metodo eliminamos un registro de la base de datos
        Empleado::destroy($id);
         return redirect('empleado');
    }
}
