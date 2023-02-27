
@extends('layouts.app')
<form action="{{ route('guardarHechizo', $user->id_usuario) }}" method="post">

@csrf
<select name="id_hechizo" id="hechizo">

@forelse ($hechizos as $hechizo)
        <option name="id_hechizo" value="{{$hechizo->id_hechizo}}">
        <p><strong>Nombre: </strong>{{$hechizo->nombre}}</p>
        <p><strong>Coste de mana: </strong>{{$hechizo->coste_mana}} </p>
        <p><strong>Daño : </strong>{{$hechizo->danyo}}</p>
        </option>

@empty
<li>NO HAY HECHIZOS </li>
@endforelse

</select>

<button type="submit">añadir</button>
</form>
  

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    @if(session('success'))
    swal("Buen Trabajo!", "{{ session('success') }}", "success");
    @endif
</script>

