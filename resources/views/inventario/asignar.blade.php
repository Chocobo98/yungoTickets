@extends('layouts.app')
@section('content')
<div class ="sm:mt-0 px-6">
    <p class="tgrid-rows-1 grid-cols-3 text-center mt-1 font-mono text-xl font-bold relative">Asignacion de Equipo</p>
    <div class="md:grid md:grid-cols-6 md:gap-6 md:mt-5 grid-rows-2">
        <!--Apartado de los datos del equipo y de usuario-->
    @include('tablas.inventarioInfo',['equipo'=>$equipos, 'clientes'=>$clientes])
    </div>
   
</div>
@endsection
