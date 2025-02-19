<?php

namespace App\Http\Controllers;

use App\Models\empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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
    public function edit($id)
    {
        // con este metodo traemos un registro de la base de datos
        $empleado = Empleado::findOrFail($id);

        // con este metodo retornamos la vista y le pasamos el registro
        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Obtenemos todos los datos excepto el token y el método
    $datosEmpleado = $request->except(['_token', '_method']);

    // Buscamos el empleado existente
    $empleado = Empleado::findOrFail($id);

    if ($request->hasFile('Foto')) {
        // Eliminamos la foto antigua
        Storage::delete('public/'.$empleado->Foto);

        // Guardamos la nueva foto
        $datosEmpleado['Foto'] = $request->file('Foto')->store('uploads', 'public');
    }

    // Actualizamos los datos del empleado
    Empleado::where('id', '=', $id)->update($datosEmpleado);

    // Volvemos a cargar el empleado actualizado
    $empleado = Empleado::findOrFail($id);

    // Con este código nos aseguramos que al actualizar la información vuelva a la vista principal
    return view('empleado.edit', compact('empleado'));
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
