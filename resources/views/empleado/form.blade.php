<label for="nombre">Nombre</label>    
<input type="text" name="nombre" value="{{ isset($empleado->nombre) ? $empleado->nombre : '' }}" placeholder="Nombre">
<br>
<label for="primerApellido">primerApellido</label>
<input type="text" name="primerApellido" value="{{ isset($empleado->primerApellido) ? $empleado->primerApellido :'' }}" placeholder="primerApellido">
<br>
<label for="segundoApellido">segundoApellido</label>
<input type="text" name="segundoApellido" value="{{isset($empleado->segundoApellido)?$empleado->segundoApellido :''}}" placeholder="segundoApellido">
<br>
<label for="correo">correo</label>
<input type="email" name="correo" value="{{isset($empleado->correo) ? $empleado->correo : ''}}" placeholder="correo">
<br>
<label for="Foto">foto</label>
@if(isset($empleado->foto))
<img style="heigth: 200px;width: 200px;" src="{{ asset('storage'.'/'.$empleado->foto) }}" alt="">
@endif
<input type="file" name="Foto"  placeholder="foto">
<br>
<input type="submit"  value="Guardar datos">