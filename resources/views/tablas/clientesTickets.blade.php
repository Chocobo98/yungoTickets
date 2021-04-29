<p class="text-center mt-1 font-mono text-xl font-bold relative grid col-start-2 col-end-4 row-start-1 left-15">Tickets Registrados</p>
<div class= "md:mt-0 md:col-start-1 col-end-6" style="background: #edf2f7;">
    
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="inset-x-0 bottom-0">
            @if(count($ticket)>=1)
                <table class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
                    <thead class="text-white">
                        @foreach ($ticket as $tick)  
                            <tr class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                                <th class="p-2 text-center">Id</th>
                                <th class="p-2 text-center">Fecha</th>
                                <th class="p-2 text-center">Descripcion</th>
                                <th class="p-2 text-center">Estado</th>

                                <th class="p-2 text-left" width="110px" >Problematica</th>
                            </tr>
                        @endforeach
                    
                    </thead>
                    <tbody class="flex-1 sm:flex-none">
                        @foreach ($ticket as $tick)
                            <tr class="flex flex-col flex-no wrap sm:table-row mb-3 sm:mb-0">
                                <td class="border-grey-light border hover:bg-gray-100 p-2 truncate text-sm">{{ $tick->idTicket }}</td>
                                <td class="border-grey-light border hover:bg-gray-100 p-2 truncate text-sm">{{ $tick->Fecha }}</td>
                                <td class="border-grey-light border hover:bg-gray-100 p-2  text-sm">{{ $tick->descripcion}}</td>
                                @switch($tick->estado)
                                    @case('Nuevo')
                                        <td class="border-grey-light border hover:bg-gray-100 p-2 truncate text-sm"><span class='text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-green-600 bg-green-200 last:mr-0 mr-1'>Nuevo</span></td>
                                        @break
                                    @case('Abierto')
                                        <td class="border-grey-light border hover:bg-gray-100 p-2 truncate text-sm"><span class='text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-yellow-600 bg-yellow-200 last:mr-0 mr-1'>Abierto</span></td>
                                        @break
                                    @case('Solucionado')
                                        <td class="border-grey-light border hover:bg-gray-100 p-2 truncate text-sm"><span class='text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-gray-600 bg-gray-200 last:mr-0 mr-1'>Resuelto</span></td>
                                        @break
                                    @default     
                                @endswitch
                                {{--<td class="border-grey-light border hover:bg-gray-100 p-2 truncate text-sm">{{ $tick->estado }}</td>--}}
                                <td class="border-grey-light border hover:bg-gray-100 p-2 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer text-sm"><a href="/tickets/{{ $tick->idTicket }}">{{ $tick->tipoProblema }}</a></td>
                            </tr>
                        @endforeach   
                    </tbody>  
                </table>
            @else
                <p class="font-bold text-green-600 text-center text-lg p-7">No cuenta con tickets registrados</p>
            @endif 
        </div>
    </div>
</div>

<style>
    html,
    body {
        height: 100%;
    }

    @media (min-width: 640px) {
        table {
            display: inline-table !important;
        }

        thead tr:not(:first-child) {
            display: none;
        }
    }

    td:not(:last-child) {
        border-bottom: 0;
    }

    th:not(:last-child) {
        border-bottom: 2px solid rgba(0, 0, 0, .1);
    }
</style>