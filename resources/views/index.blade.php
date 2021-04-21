@extends('layouts.app')
@section('content')
   @include('grafica.grafica')
   
   <p class="font-sans font-bold text-center text-lg subpixel-antialiased ">Ultimos cinco reportes registrados</p>
   <!--<x-tabla-index/>-->
   @include('tablas.tabla-index',['userInner'=>$prueba])

@endsection
