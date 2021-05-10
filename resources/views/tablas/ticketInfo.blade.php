<div class="md:mt-0 md:col-start-1 col-end-4">
    <p class="text-center mt-1 font-mono text-xl font-bold relative">Informacion de Ticket</p>
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-2">
                    <label for="nombre" class="block text-sm font-medium text-gray-700 bold">Cliente:</label>
                    <p class="font-bold">{{ $dato->nombre }}</p>
                </div>
                
                <div class="col-span-1">
                    <label for="email" class="block text-sm font-medium text-gray-700 bold">No.ticket:</label>
                    <p class="font-bold">{{ $dato->idTicket }}</p>
                </div>

                <div class="col-span-3">
                    <label for="domicilio" class="block text-sm font-medium text-gray-700 bold">Tipo de Problema:</label>
                    <p class="font-bold">{{ $dato->tipoProblema }}</p>
                </div>

                <div class="col-span-6">
                    <label for="telefono" class="block text-sm font-medium text-gray-700 bold">Descripcion:</label>
                    <p class="font-bold">{{ $dato->descripcion }}</p>
                </div>

                <div class="col-span-6">
                    <label for="sitios" class="block text-sm font-medium text-gray-700 bold">Estado del ticket</label>
                    <p class="font-bold">{{ $dato->estado }}</p>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="paquete" class="block text-sm font-medium text-gray-700 bold">Fecha Registrada</label>
                    <p class="font-bold">{{ $dato->Fecha }}</p>
                </div>                
            </div>
        </div>
    </div>
</div>

{{-- Caja de comentarios registrados --}}
<div class="md:col-start-4 md:col-end-7">
    <p class="text-center mt-1 font-mono text-xl font-bold relative">Comentarios</p>
    <div class="grid gap-6 mb-8">
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 md:overflow-y-auto md:h-72" id="comentarios">    
        </div>
    {{-- <buttonid="test">Prueba</button> --}}
    </div>
</div>

{{-- Caja para poner comentarios --}}
<div class="md:col-start-4 md:col-end-7 md:row-start-2">
    <form name="registrar" id="registrar" class="registrar">
        @csrf
        <textarea type="text" id="comentario" name="comentario" class="min-w-full resize-none p-4 rounded-lg" placeholder="Agregar comentario..."></textarea>
        <button id="comentar" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Comentar
        </button>
    </form>
</div>

<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var id = "{{ $dato->idTicket }}";
        $.ajax({
            url:`/tickets/${id}/comments`,
            type:"GET",
            dataType:"json"}). //Fin de Ajax
            done(function(data)
            {
                for(var i=0; i<data.length;i++)
                {
                    var temp = data[i];
                    //console.log('Dentro del arreglo antes del JSON', temp);
                    var msg = `<h4 class="mb-1 font-semibold text-gray-600 dark:text-gray-300">${temp['Fecha']}</h4>\n<p class="mb-4 text-gray-600 dark:text-gray-400">${temp['comentario']}</p>`;
                    $('#comentarios').append(msg);
                }
            });//Fin de cargar la pagina
               
        
        $('#registrar').submit(function(event){
            var comentario = $('#comentario').val();
            $.ajax({
            url:`/tickets/${id}/comments`,
            type:'POST',
            data:{
                comentario:comentario,
                fk_ticket: id,
            },
            success:function(data){
                //Se agrega el comentario a la caja sin cargar la pagina
                var msg = `<h4 class="mb-1 font-semibold text-gray-600 dark:text-gray-300">${data['Fecha']}</h4>\n<p class="mb-4 text-gray-600 dark:text-gray-400">${data['comentario']}</p>`;
                $('#comentarios').prepend(msg);

                //Notificacion de comentario agregado
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: 'Comentario agregado'
                })
            },
            error:function(data){
                //Notificacion de error en el comentario
                Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Ocurrio un error al intentar comentar'
                })
            }
            });
            event.preventDefault();
        });
    });

</script>
