@extends('layouts.app')
@section('content')
<div class=" sm:mt-0 ">
    <p class="text-center mt-1 font-mono text-xl font-bold relative">Nuevo Ticket</p>
    <div class="md:grid md:grid-cols-4 md:gap-6 md:mt-5">
    <!--Form Style-->
    <div class="md:mt-0 md:col-start-2 col-end-4">
        <!--Form Action-->
        <form action="/tickets" method="POST">
          @csrf
          <div class="shadow overflow-hidden sm:rounded-md ">
            <div class="px-4 py-5 bg-white sm:p-6">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 ">
                    <label for="clientes" class="block text-sm font-medium text-gray-700">Cliente</label>
                        <select id="clientes" name="clientes" autocomplete="cliente" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @foreach ($clientes as $cliente)
                                <option value={{ $cliente->idCliente }}>{{ $cliente->nombre }}</option>
                            @endforeach
                        </select>
                </div>
  
                <div class="col-span-6 ">
                    <label for="tipoProblema" class="block text-sm font-medium text-gray-700">Tipo de Problema</label>
                        <select id="tipoProblema" name="tipoProblema" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            {{-- Option tipoProblema --}}
                            <option value="Ancho de Banda">Ancho de Banda</option>
                            <option value="Bloqueo de Paginas">Bloqueo de Paginas</option>
                            <option value="Cobertura">Cobertura</option>
                            <option value="Desconexiones">Desconexiones</option>
                            <option value="Problemas con Aplicaciones">Problemas con Aplicaciones</option>
                            <option value="Problemas con Otros Dispositivos">Problemas con Otros Dispositivos</option>
                            <option value="Radio Defectuoso">Radio Defectuoso</option>
                            <option value="Red no Detectada">Red no Detectada</option>
                            <option value="Otros">Otros</option>
                        </select>
                </div>
                <div class="col-span-6">
                    <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripcion</label>
                    <textarea type="text" name="descripcion" id="descripcion" autocomplete="street-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                </div>
                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
                        <select id="estado" name="estado" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            {{-- Option Estado --}}
                            <option value="Abierto">Abierto</option>
                            <option value="Nuevo">Nuevo</option>
                            <option value="Resuelto">Resuelto</option>
                        </select>
                  </div>
              </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Registar Ticket
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <script>
    $(document).ready(function(){
      $("form").submit(function(){
        Swal.fire(
          'Registrado!',
          'Un ticket ha sido registrado!',
          'success'
        )
      })
    });
  </script>
@endsection