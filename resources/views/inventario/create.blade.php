@extends('layouts.app')
@section('content')
<div class=" sm:mt-0 ">
    <p class="text-center mt-1 font-mono text-xl font-bold relative">Nuevo Equipo</p>
    <div class="md:grid md:grid-cols-4 md:gap-6 md:mt-5">
    <!--Form Style-->
    <div class="md:mt-0 md:col-start-2 col-end-4">
        <!--Form Action-->
        <form action="/inventario" method="POST">
          @csrf
          <div class="shadow overflow-hidden sm:rounded-md ">
            <div class="px-4 py-5 bg-white sm:p-6">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 ">
                    <label for="marca" class="block text-sm font-medium text-gray-700">Marca</label>
                    <input type="text" name="marca" id="marca" autocomplete="marca" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
  
                <div class="col-span-6 ">
                    <label for="tipoEquipo" class="block text-sm font-medium text-gray-700">Tipo de Equipo</label>
                        <select id="tipoEquipo" name="tipoEquipo" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="Radio">Radio</option>
                            <option value="Septorial">Septorial</option>
                            <option value="Rack">Rack</option>
                            <option value="Router">Router</option>
                            <option value="Omni">Omni</option>
                        </select>
                </div>
                <div class="col-span-6">
                    <label for="modelo" class="block text-sm font-medium text-gray-700">Modelo</label>
                    <input type="text" name="modelo" id="modelo" autocomplete="street-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></input>
                </div>
                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <label for="mac" class="block text-sm font-medium text-gray-700">Direccion MAC</label>
                        <input id="mac" name="mac" autocomplete="mac" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></input>
                </div>
              </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Registar Equipo
              </button>
            </div>
          </div>
        </form>
        @if($errors->any())
          <div>
            @foreach ($errors->all() as $error)
              <li style="color: red">
                {{ $error }}
              </li>
            @endforeach
          </div>
        @endif
      </div>
    </div>
  </div>

<script>
  $(document).ready(function(){
    $('form').submit(function(){
      Swal.fire(
        'Registrado!',
        'Un equipo ha sido registrado',
        'success'
        )
    });
  });
</script>
@endsection