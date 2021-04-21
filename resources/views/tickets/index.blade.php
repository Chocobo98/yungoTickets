@extends('layouts.app')
@section('content')
<div class="pageHeader">
    <div class="overflow-hidden flex flex-shrink p-4 md:flex-shrink-0">
      <div class="flex space-x-2 box-border ">
        <p class="font-sans text-xl">Tickets</p>
        <form action="/tickets/create">
          <input type="submit"  value="+"class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded focus:ring-2">
        </form>
      </div>
    </div>
  </div>
    @include('tablas.tablaTickets')
@endsection