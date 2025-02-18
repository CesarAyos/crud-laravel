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
                <th>#</th>
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
                <td>{{ $empleado ->foto}}</td>
                <td>{{ $empleado ->nombre}}</td>
                <td>{{ $empleado ->primerApellido}}</td>
                <td>{{ $empleado ->segundoApellido}}</td>
                <td>{{ $empleado ->correo}}</td>
                <td>Editar |
                    
                <form action="{{ url('/empleado/'.$empleado->id) }}" method="post">
                @csrf
                {{ method_field('DELETE') }}
                <input type="submit" value="Borrar" onclick="return confirm('¿Quieres borrar?')">
                </form>
                </td>
            </tr>
    @endforeach        
        </tbody>
        <tfoot>
            
        </tfoot>
    </table>
</div>
