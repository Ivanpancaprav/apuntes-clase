<ol>
    <li>ID USUARO: {{$user->id_usuario}}</li>
    <li>NOMBRE: {{$user->name}}</li>
    <li>EMAIL: {{$user->email}}</li>
    <li>Fotos: 
    <ol>
    @forelse ($user->photos as $photo)
    <li> <strong> Descripción:</strong> {{$photo->descripcion}}</li>
    <li><strong> de la toma:</strong> {{$photo->fecha_toma}}</li>
    <br>
    @empty
    <li>No hay fotos</li>
    @endforelse
    </ol>

    </li>
       
</ol>