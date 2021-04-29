@extends('layouts.app')
@section('content')
   <!--Grafica de los tickets por semana y anual-->
   @include('grafica.grafica', ['ticketMensuals'=>$ticketMensual,'ticketGeneral'=>$ticketGeneral])
   {{--@include('tablas.tablasNumerosTickets',['numerosTickets'=>$numerosTickets])--}}
   
   <div class="mt-5">
   <p class="font-sans font-bold text-center text-lg subpixel-antialiased ">Ultimos cinco reportes registrados</p>
   <!--<x-tabla-index/>-->
   @include('tablas.tabla-index',['userInner'=>$prueba])
   </div>

@endsection
