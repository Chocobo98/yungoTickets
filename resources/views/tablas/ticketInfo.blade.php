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

<div class="prueba">
    <button id="test">Prueba</button>
    <div id ="comentarios"></div>
</div>



<script>
    $(document).ready(function(){
        $('#test').on('click',function(){
            var id = "{{ $dato->idTicket }}";
            $.ajax({
                url:`/tickets/${id}/comments`,
                type:"GET",
                dataType:"json",
                success:function(data)
                {
                    for(var i=0; i<data.length;i++)
                    {
                        var temp = data[i];
                        console.log('Dentro del arreglo antes del JSON', temp);
                        
                        console.log(temp['comentario']);
                        console.log(temp['created_at']);
                        //FALTA ARREGLAR ESTA PARTE Y METERLE MAS DESMADRE
                        /*
                        for( const[k,v] of Object.entries(temp))
                        {
                            var msg = `<p>${v}</p>`;
                            $('#comentarios').append(msg);
                            console.log(`Entro ${k}: ${v}`);
                        }
                        */
                        
                        //console.log('Entro',Object.values(temp));
                        
                    }
                    /*
                    var msg = `<p>${data}</p>`;
                    $('#comentarios').append(msg);
                    console.log(data);
                    */
                    
                },
                error:function(data)
                {
                    console.log('Error',data);
                }
            })
        });
    });

</script>
