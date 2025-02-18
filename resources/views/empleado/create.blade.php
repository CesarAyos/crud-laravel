Formulario de creacion de empleados

<form action="{{ url('/empleado') }}" method="post" enctype="multipart/form-data">
 <!-- llave de seguridad    -->
@csrf
@include('empleado.form');

</form>