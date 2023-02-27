<form  action="{{route('insertarPhoto', $user->id_usuario)}}" method="post" >
@csrf
<label for="descripcion">Descripción:</label>
<input type="text" name="descripcion" id="" placeholder="descripcion">

<label for="fecha_toma">Fecha:</label>
<input type="date" name="fecha_toma" id="" placeholder="fecha toma">

<button type="submit">insertar</button>
</form>