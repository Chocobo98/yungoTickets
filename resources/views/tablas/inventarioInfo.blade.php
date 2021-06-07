
<div class="md:mt-0 md:col-start-2 col-end-5">
    <p class="text-center mt-1 font-mono text-xl font-bold relative">Informacion del Equipo</p>
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-4 bg-white sm:p-3">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-1">
                    <label for="marca" class="block text-sm font-medium text-gray-700 bold">Marca:</label>
                    <p class="font-bold">{{ $equipo->marca }}</p>
                </div>
                
                <div class="col-span-6 sm:col-span-1">
                    <label for="modelo" class="block text-sm font-medium text-gray-700 bold">Modelo:</label>
                    <p class="font-bold">{{ $equipo->modelo }}</p>
                </div>

                <div class="col-span-6 sm:col-span-2">
                    <label for="tipoEquipo" class="block text-sm font-medium text-gray-700 bold">Tipo de Equipo:</label>
                    <p class="font-bold">{{ $equipo->tipoEquipo }}</p>
                </div>

                <div class="sm:col-span-1">
                    <label for="mac" class="block text-sm font-medium text-gray-700 bold">MAC:</label>
                    <input class="font-bold" disabled name='mac' value={{ $equipo->MAC }}></input>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Select con los nombres de los clientes y como valores sus id-->
<div class="col-start-5">
    <p class="grid-cols-3 text-center mt-1 font-mono text-xl font-bold relative">Clientes</p>
    <select id="cliente" name="cliente" class="md:w-full sm:w-full w-full py-3 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm h-13">
        <option value="" selected disabled hidden></option>
        @foreach ($clientes as $cliente)
            <option value={{ $cliente->idCliente }}>{{ $cliente->nombre }}</option>
        @endforeach 
    </select>
</div>

<div class="md:row-start-2 place-items-center"> 
    <table id="infCliente" class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
    </table>
    <a id="btnAsignar"></a>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        $( "#cliente" ).change(function () {
            var str = "";
            $( "select option:selected" ).each(function() {
                    str += $( this ).val() + " ";
                });
            $.ajax({
                url:"/inventario/asignarEquipo/getUserDetails/"+str,
                type:"GET",
                datatype:"json",
                success:function(data)
                {
                    //Genera la tabla con la informacion del cliente seleccionada en el Select

                    $('#infCliente').empty();
                    $('#btnAsignar').empty();

                    var table = $('#infCliente');
                    var btn = '<a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-700 rounded justify-self-auto">Asignar</a>'; 
                    var tblHeader = '<thead class="text-white"><tr class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">';

                    for (var k in data[0])
                    {
                        if(k=='fk_paquete' || k=='fk_mac' || k=='fk_sitios')
                        {
                            continue;
                        }
                        tblHeader+=`<th class='p-3 text-left'>${k}</th>`;
                    }
                    tblHeader+="</tr></thead>";

                    $(tblHeader).appendTo(table);

                    var tblRow = "<tr class='flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0'>";
                    
                    $.each(data[0], function(index,value){
                        if(index=='fk_paquete' || index=='fk_mac' || index=='fk_sitios')
                        {
                            return;
                        }
                        tblRow += `<td class='border-grey-light border hover:bg-gray-100 p-3 truncate'>${value}</td>`;
                    });
                    tblRow += "</tr>";

                    $(table).append(tblRow);
                    $('#btnAsignar').append(btn);
                    //console.log(data);
                },
                error:function(data)
                {
                    console.log('Error',data);
                }
            })
        })
        .change();


        $('#btnAsignar').click(function (){
            var idCliente = $('#cliente').val();
            var datos = @json($clientes);
            //console.log(datos);
            datos.forEach(element => {
                if(idCliente==element.idCliente)
                {
                    cmac = "{{ $equipo->MAC }}";
                    url = `/inventario/asigCliente/${idCliente}/${cmac}`;
                    console.log(url);
                    
                    if(element.fk_mac!=null)
                    {
                        Swal.fire
                        ({
                            title: 'Advertencia!',
                            text: "Este cliente ya cuenta con un equipo registrado, aun desea continuar con el registro?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Confirmar'
                            }).then((result) => {
                            if (result.isConfirmed) 
                            {
                                Swal.fire(
                                    'Registrado!',
                                    'Un equipo ha sido asignado a un cliente',
                                    'success'
                                    )
                                window.location.replace(url);
                            }
                        })
                    }
                    else
                    {
                        //Si el cliente no cuenta con MAC, si dirige directamente al controlador
                        Swal.fire(
                            'Registrado!',
                            'Un equipo ha sido asignado a un cliente',
                            'success'
                            )
                        window.location.replace(url); 
                    }
                }
            });
        }); 
    });
</script>

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
