<p class="text-center mt-1 font-mono text-xl font-bold relative">Datos Personales</p>
<div class="md:mt-0 md:col-start-0 col-end-1">
    
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6">
                    <label for="nombre" class="block text-sm font-medium text-gray-700 bold">Nombre Completo:</label>
                    <p class="font-bold">{{ $d->nombre }}</p>
                </div>
                
                <div class="col-span-6">
                    <label for="email" class="block text-sm font-medium text-gray-700 bold">Email:</label>
                    <p class="font-bold">{{ $d->email }}</p>
                </div>

                <div class="col-span-6">
                    <label for="domicilio" class="block text-sm font-medium text-gray-700 bold">Domicilio:</label>
                    <p class="font-bold">{{ $d->domicilio }}</p>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="telefono" class="block text-sm font-medium text-gray-700 bold">Telefono:</label>
                    <p class="font-bold">{{ $d->telefono }}</p>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="sitios" class="block text-sm font-medium text-gray-700 bold">Sitio Conectado</label>
                    <p class="font-bold">{{ $d->zona }}</p>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="paquete" class="block text-sm font-medium text-gray-700 bold">Paquete</label>
                    <p class="font-bold">{{ $d->nombrePaquete }}</p>
                </div>

                <div class="col-span-6 sm:col-span-3 ">
                    <label for="paquete" class="block text-sm font-medium text-gray-700 bold">MAC del Equipo</label>
                    @if(isset($d->fk_mac))
                        <p class="font-bold">{{ $d->fk_mac }}</p>
                    @else
                        <p class="font-bold text-cool-gray-500">Sin asignar</p>
                    @endif
                   
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <a href="/clientes/{{ $d->idCliente }}/edit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-700 rounded">Editar</a>
                </div>
            </div>

        </div>

    </div>
</div>
