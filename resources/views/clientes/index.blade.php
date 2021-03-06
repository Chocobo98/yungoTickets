@extends('layouts.app')
@section('content')
<div class="pageHeader">
  <div class="overflow-hidden flex flex-shrink p-4 md:flex-shrink-0">
    <div class="flex space-x-2 box-border ">
      <p class="font-sans text-xl">Clientes</p>
      <form action="/clientes/create">
        <input type="submit"  value="+"class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded focus:ring-2">
      </form>
    </div>
  </div>
</div>

<div class= "overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
    <div class="flex items-center justify-center">
        <div class="inset-x-0 bottom-0">
            <table id="tabla-cliente" class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
                <thead class="text-white">
                    <tr class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                        <th class="p-3 text-left">Id</th>
                        <th class="p-3 text-left">Cliente</th>
                        <th class="p-3 text-left">Domicilio</th>
                        <th class="p-3 text-left">Email</th>
                        <th class="p-3 text-left">Telefono</th>
                        <th class="p-3 text-left">Action</th> 
                    </tr>  
                </thead>
                
            </table>
            <script type="text/javascript">

                $(function(){
                  
                  $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    }
                  });

                  var table = $('#tabla-cliente').DataTable({
                    ajax: '',
                    responsive: true,
                    method:'GET',
                    serverSide: true,
                    processing: true,
                    columns:[
                      {data:'idCliente', name:'idCliente' },
                      {data:'nombre', name:'nombre'},
                      {data: 'domicilio', name:'domicilio'},
                      {data: 'email', name: 'email'},
                      {data: 'telefono', name:'telefono'},
                      {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                  });

                  $('#tabla-cliente tbody').on('click','#btn-delete', function(){
                    //debugger;
                    var cliente_id = $(this).data("value");
                    //console.log(cliente_id);
                    var result = confirm('Esta seguro de eliminar a este usuario?');
                    if(result)
                    {
                      $.ajax({
                        type:"DELETE",
                        url:"/clientes"+"/"+cliente_id,
                        success: function(data)
                        {
                          table.draw();
                        },
                        error: function(data){
                          console.log('Error:',data);
                        }
                      });
                    }else{
                      return false;
                    }
                  });
                });
            </script>
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

@endsection