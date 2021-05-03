<div class="flex-auto border-2 border-gray-700 rounded bg-gray-300 mr-5 mt-6 p-1">
    <div class="grid grid-cols-3 grid-rows-7">
        @if(isset($ticketMensual))
        <h1 class="col-start-2 row-start-1 text-center text-black font-semibold text-lg">
            Ticktes de {{ \Carbon\Carbon::now()->locale('Es')->isoFormat('MMMM') }}
        </h1>
            @foreach ($ticketMensuals as $estado=>$registro)
                @switch($estado)
                    @case('Nuevo')
                        <p class="col-start-1 col-end-1 row-start-2 text-center text-green-700 font-bold text-4xl">{{ $registro }}</p>
                        <p class="col-start-1 col-end-1 row-start-3 text-center text-green-700 font-bold text-lg">Nuevos</p>
                        @break
                    @case('Abierto')
                        <p class="col-start-2 col-end-2 row-start-2 text-center text-yellow-700 font-bold text-4xl">{{ $registro }}</p>
                        <p class="col-start-2 col-end-2 row-start-3 text-center text-yellow-700 font-bold text-lg">Abiertos</p>
                        @break
                    @case('Resuelto')
                        <p class="col-start-3 col-end-3 row-start-2 text-center text-gray-700 font-bold text-4xl">{{ $registro }}</p>
                        <p class="col-start-3 col-end-3 row-start-3 text-center text-gray-700 font-bold text-lg">Solucionados</p>
                        @break
                    @default      
                @endswitch
            @endforeach
        @else
            <p class="text-center text-purple-700 font-bold text-4xl">No hay tickets registrados en este mes</p>
        @endif
        <h1 class="col-start-2 row-start-4 text-center text-black font-semibold text-lg">
            Ticktes {{ \Carbon\Carbon::now()->locale('Es')->isoFormat('YYYY') }}
        </h1>
        @foreach ($ticketGeneral as $estado=>$registro)
            @switch($estado)
                @case('Nuevo')
                    <p class="col-start-1 col-end-1 row-start-5 text-center text-green-700 font-bold text-4xl">{{ $registro }}</p>
                    <p class="col-start-1 col-end-1 row-start-6 text-center text-green-700 font-bold text-lg">Nuevos</p>
                    @break
                @case('Abierto')
                    <p class="col-start-2 col-end-2 row-start-5 text-center text-yellow-700 font-bold text-4xl">{{ $registro }}</p>
                    <p class="col-start-2 col-end-2 row-start-6 text-center text-yellow-700 font-bold text-lg">Abiertos</p>
                    @break
                @case('Resuelto')
                    <p class="col-start-3 col-end-3 row-start-5 text-center text-gray-700 font-bold text-4xl">{{ $registro }}</p>
                    <p class="col-start-3 col-end-3 row-start-6 text-center text-gray-700 font-bold text-lg">Solucionados</p>
                    @break
                @default      
            @endswitch
        @endforeach
    </div>
</div>

