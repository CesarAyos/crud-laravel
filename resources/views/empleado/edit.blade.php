@extends('layouts.app')
@section('content')

<div class="container">

<form action="{{ url('/empleado/'.$empleado->id) }}" method="post" enctype="multipart/form-data">
    <!-- siempre debemos poner este comando que es la clave de seguridad -->
@csrf
{{ method_field('PATCH') }}    
@include('empleado.form',['modo'=>'Editar'])
</form>
</div>
@endsection
