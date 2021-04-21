@extends('layouts.app')
@section('content')
    @include('tablas.clientesEdit',['cliente'=>$cliente,'sitios'=>$sitios,'paquete'=>$paquete])
@endsection