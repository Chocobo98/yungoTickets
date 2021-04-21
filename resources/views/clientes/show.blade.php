@extends('layouts.app')
@section('content')

<div class ="sm:mt-0 px-6">
    <div class="md:grid md:grid-cols-5 md:gap-6 md:mt-5">
        @foreach ($data as $da)
            <!--Apartado de los datos del cliente-->
            @include('tablas.clienteInfo',['d'=>$da])      
        @endforeach
         <!--Apartado para la tabla de Tickets del Usuario-->
    @include('tablas.clientesTickets',['ticket'=>$ticket]) 
    </div>
   
</div>

@endsection