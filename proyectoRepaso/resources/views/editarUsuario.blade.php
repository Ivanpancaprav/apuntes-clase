@extends('layouts.app')

@if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif





<form method="post" action="{{ route('updateUsuario', $user->id_usuario) }}">  
          <div> 
              @method('PATCH')
              @csrf
              
              <label for="name">nombre:</label>
              <input type="text"  name="name" value="{{ $user->name }}"/>
          </div>
          <div >
              <label for="descripcion">descripcion</label>
              <input type="text"  name="email" value="{{ $user->email }}"/>
          </div>

          <div >
              <label for="password">Password</label>
              <input type="password"  name="password_c"/>
              <input type="hidden" name="password" value=" {{$user->password}}">
          </div>
         
          <button type="submit" >Actualizar</button>
      </form>
  </div>
</div>




<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
@if (session('success'))
swal("Buen Trabajo!", "{{ session('success') }}", "success");
@endif
</script>