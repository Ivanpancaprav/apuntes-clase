
@forelse ($photos as $photo)
<li> 
{{$photo->descripcion}} {{$photo->fecha_toma}} 
     <a href="{{ route('editar', $photo->id)}}" >Edit</a> <!--añadimos también EDITAR-->
     <form action="{{ route('borrar', $photo->id)}}" method="post"> <!--añadimos también BORRAR-->
        @csrf
        @method('DELETE')
        <button type="submit">borrar</button>
    </form>
</li>
@empty
   <li>NO HAY NADA </li>
@endforelse