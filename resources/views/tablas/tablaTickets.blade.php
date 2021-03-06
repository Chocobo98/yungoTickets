<div class= "overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
    <div class="flex items-center justify-center">
        <div class="inset-x-0 bottom-0">
            <table id="tabla-tickets" class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
                <thead class="text-white">
                    <tr class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                        <th class="p-3 text-left">Id</th>
                        <th class="p-3 text-left">Nombre</th>
                        <th class="p-3 text-left">Tipo de Problema</th>
                        <th class="p-3 text-left">Descripcion</th>
                        <th class="p-3 text-left">Fecha</th>
                        <th class="p-3 text-left">Estado</th>
                        <th class="p-3 text-left">Action</th>
                        <!--<th class="p-3 text-left">Action</th>-->  
                    </tr>  
                </thead>
                
            </table>
            
            <script type="text/javascript">

                $(function(){
                  
                  var table = $('#tabla-tickets').DataTable({
                    ajax: {
                        url:'/tickets/api', 
                        type:'GET',
                    },
                    ordering:true,
                    serverSide: true,
                    processing: true,
                    columns:[
                      {data:'idTicket', name:'idTicket' },
                      {data:'nombre', name:'nombre'},
                      {data:'tipoProblema', name:'tipoProblema'},
                      {data: 'descripcion', name:'descripcion'},
                      {data: 'Fecha', name: 'Fecha'},
                      {data: 'estado', name: 'estado'},
                      {data: 'action', name: 'action', orderable: false, searchable: false}, 
                    ],
                    order:[[4,'desc']]
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