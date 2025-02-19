<h1 class="text-center">{{$modo}} empleado</h1>

<div class="card p-5">
<label for="nombre">Nombre</label>    
<input type="text" name="nombre" value="{{ isset($empleado->nombre) ? $empleado->nombre : '' }}" placeholder="Nombre" required>
<label for="primerApellido">Primer Apellido</label>
<input type="text" name="primerApellido" value="{{ isset($empleado->primerApellido) ? $empleado->primerApellido :'' }}" placeholder="Primer Apellido" required>
<label for="segundoApellido">Segundo Apellido</label>
<input type="text" name="segundoApellido" value="{{isset($empleado->segundoApellido)?$empleado->segundoApellido :''}}" placeholder="segundoApellido" required>
<label for="correo">correo</label>
<input type="email" name="correo" value="{{isset($empleado->correo) ? $empleado->correo : ''}}" placeholder="correo" required>
<label for="Foto">foto</label>
@if(isset($empleado->foto))
<img class="img-thumbnail img-fluid" style="heigth: 80px;width: 80px;" src="{{ asset('storage'.'/'.$empleado->foto) }}" alt="">
@endif
<input type="file" name="Foto"  placeholder="foto" required>

<div class="row">
<div class="col-5 m-2 form-group">
<input type="submit" class="btn btn-success"  value="{{$modo}} datos">
</div>
<div class="col-6 m-2 form-group text-end">
<button class="btn btn-warning"><a href="{{url('empleado/')}}" class="text-decoration-none text-white " >Inicio</a></button>
</div>
</div>
</div>

