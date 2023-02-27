@extends('layouts.app')

@section('content')
@auth    <!--sirve para mostrar en caso de estar autentificado, estar logeado-->
{{auth()->user()->name}}
@endauth

<!--tambien cambiar la ruta de middleware en caso de estar autentificado y 
volver hacer login peta y te manda a home por tanto cambiar a raiz.-->

@if(auth()) <!--si el usuario está autentificado-->

@endif

@endsection


