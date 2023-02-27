@if ($errors->any())
<ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
<br />
@endif
@extends('layouts.app')

@section('content')
@forelse ($users as $user)

<ol>
    <li>

        <p><strong>Nombre: </strong>{{$user->name}}</p>
        <p><strong>Email: </strong>{{$user->email}} </p>
        <p><strong>Numero: </strong>{{$user->phone->numero}}</p>

        <ol>Hechizos:
            @forelse ($user->hechizo as $hechizo)
         
            <li>        
        <p><strong>Nombre: </strong>{{$hechizo->nombre}}</p>
        <p><strong>Coste de mana: </strong>{{$hechizo->coste_mana}} </p>
        <p><strong>Daño : </strong>{{$hechizo->danyo}}</p>
            </li>
            @empty
            <li>no tiene hechizos </li>
            @endforelse

        </ol>

        <a href="{{ route('editarUser', $user->id_usuario)}}">Edit</a>
        <a href="{{ route('verUsuario', $user->id_usuario)}}">Ver</a>
        <a href="{{ route('createPhoto', $user->id_usuario)}}">Añadir foto</a>
        <a href="{{ route('formHechizo', $user->id_usuario)}}">Añadir hechizo</a>
        <form action="{{ route('borraUsuario', $user->id_usuario)}}" method="post"> <!--añadimos también BORRAR-->
            @csrf
            @method('DELETE')
            <button type="submit">borrar</button>
        </form>
    </li>
</ol>

@empty
<li>NO HAY USUARIOS </li>
@endforelse

<form action="{{route('creaUsuario')}}" method="post">

    @csrf
    <label for="nombre">Nombre:</label>
    <input type="text" name="name" value="{{old('name')}}">
    {!! $errors->first('name', '<small>:message</small><br>' )!!}


    <label for="email">Email:</label>
    <input type="text" name="email" value="{{old('email')}}">
    {!! $errors->first('email', '<small>:message</small><br>' )!!}


    <label for="password">Password:</label>
    <input type="password" name="password">
    {!! $errors->first('email', '<small>:message</small><br>' )!!}

    <label for="numero">Numero:</label>
    <input type="text" name="numero" value="{{old('numero')}}">
    {!! $errors->first('numero', '<small>:message</small><br>' )!!}



    <button type="submit">Confirmar</button>

</form>


<h1>Añadir Hechizos</h1>




@forelse ($hechizos as $hechizo)
<ol>
    <li>

        <p><strong>Nombre: </strong>{{$hechizo->nombre}}</p>
        <p><strong>Coste de mana: </strong>{{$hechizo->coste_mana}} </p>
        <p><strong>Daño : </strong>{{$hechizo->danyo}}</p>


        <form action="{{ route('borraHechizo', $hechizo->id_hechizo)}}" method="post"> <!--añadimos también BORRAR-->
            @csrf
            @method('DELETE')
            <button type="submit">borrar</button>
        </form>
    </li>
</ol>


@empty
<li>NO HAY HECHIZOS </li>
@endforelse


<form action="{{route('creaHechizo')}}" method="post">

    @csrf
    <label for="nombre">Nombre hechizo:</label>
    <input type="text" name="nombre" value="{{old('name')}}">
    {!! $errors->first('nombre', '<small>:message</small><br>' )!!}

    <label for="coste_mana">Coste de mana:</label>
    <input type="text" name="coste_mana">
    {!! $errors->first('coste_mana', '<small>:message</small><br>' )!!}

    <label for="danyo">Daño:</label>
    <input type="text" name="danyo" value="{{old('danyo')}}">
    {!! $errors->first('danyo', '<small>:message</small><br>' )!!}

    <button type="submit">Confirmar</button>

</form>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    @if(session('success'))
    swal("Buen Trabajo!", "{{ session('success') }}", "success");
    @endif
</script>

@endsection