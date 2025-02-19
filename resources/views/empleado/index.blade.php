@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-center p-4">
<button class="btn btn-primary"><a href="{{'empleado/create'}}"  class="text-decoration-none text-white">Registrar nuevo empleado</a></button>
</div>

@if(Session::has('mensaje'))
    {{ Session::get('mensaje') }}
@endif    

<div
    class="table-responsive"
>
    <table
        class="table table-striped table-hover table-borderless table-primary align-middle"
    >
        <thead class="table-light">
            <caption>
                Table Name
            </caption>
            <tr>
                <th>id</th>
                <th>foto</th>
                <th>Nombre</th>
                <th>primer Apellido</th>
                <th>segundo Apellido</th>
                <th>correo</th>
                <th>acciones</th>
            </tr>
        </thead>


        <tbody class="table-group-divider">
    @foreach($empleados as $empleado)
            <tr>
                <td>{{ $empleado ->id}}</td>
                <td>
                <img class="img-thumbnail img-fluid" style="heigth: 100px;width: 100px;" src="{{ asset('storage'.'/'.$empleado->foto) }}" alt="">
                </td>
                <td>{{ $empleado ->nombre}}</td>
                <td>{{ $empleado ->primerApellido}}</td>
                <td>{{ $empleado ->segundoApellido}}</td>
                <td>{{ $empleado ->correo}}</td>
                <td>
                    
                <button class="btn btn-success m-2"><a href="{{ url('/empleado/'.$empleado->id.'/edit') }}" class="text-white text-decoration-none">
                    Editar
                </a>
                </button>
                    
                <form action="{{ url('/empleado/'.$empleado->id) }}" method="post">
                @csrf
                {{ method_field('DELETE') }}
                <input type="submit" class="btn btn-danger m-2" value="Borrar" onclick="return confirm('¿Quieres borrar?')">
                </form>
                </td>
            </tr>
    @endforeach        
        </tbody>
        <tfoot>
            
        </tfoot>
    </table>
</div>
@endsection
