@extends('layouts.app')
@section('content')
    @foreach ($data as $dato)
        @include('tablas.ticketInfo',['dato'=>$dato])
    @endforeach
   @foreach ($comment as $comm)
       @include('tablas.commentTicket',['comm'=>$comm])
   @endforeach
@endsection