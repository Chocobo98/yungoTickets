@extends('layouts.app')
@section('content')
<div class=" sm:mt-0">
    <p class="text-center mt-1 font-mono text-xl font-bold relative">Nuevo Usuario</p>
    <div class="md:grid md:grid-cols-4 md:gap-6 md:mt-5">
    <!--Form Style-->
      <div class="md:mt-0 md:col-start-2 col-end-4">
        <!--Form Action-->
        <form action="/clientes" method="POST">
          @csrf
          <div class="shadow overflow-hidden sm:rounded-md ">
            <div class="px-4 py-5 bg-white sm:p-6">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 ">
                  <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre Completo</label>
                  <input type="text" name="nombre" id="nombre" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
  
                <div class="col-span-6 ">
                  <label for="email" class="block text-sm font-medium text-gray-700">Correo Electronico</label>
                  <input type="text" name="email" id="email" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
  
                <div class="col-span-6">
                  <label for="domicilio" class="block text-sm font-medium text-gray-700">Domicilio</label>
                  <input type="text" name="domicilio" id="domicilio" autocomplete="street-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="col-span-6 sm:col-span-3 ">
                  <label for="telefono" class="block text-sm font-medium text-gray-700">Telefono</label>
                  <input type="text" name="telefono" id="telefono" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
              </br>

                <div class="col-span-6 sm:col-span-3">
                  <label for="sitios" class="block text-sm font-medium text-gray-700">Sitio</label>
                  <select id="sitios" name="sitios" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach ($sitios as $sitio )
                      <option value={{ $sitio->idSitios }}>{{ $sitio->zona }}</option>
                    @endforeach
                  </select>
                </div>
                <!--
                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                  <label for="city" class="block text-sm font-medium text-gray-700">Ciudad</label>
                  <input type="text" name="city" id="city" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
              -->
              <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <label for="paquete" class="block text-sm font-medium text-gray-700">Paquete</label>
                <select id="paquete" name="paquete" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  @foreach ($paquete as $pack )
                    <option value={{ $pack->idPaquete }}>{{ $pack->nombrePaquete }}</option>
                  @endforeach
                </select>
              </div>
              </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Registrar
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
      $("form").submit(function(){
        Swal.fire(
          'Registrado!',
          'Un cliente ha sido registrado con exito!',
          'success'
        )
      })
    });
  </script>
  
@endsection