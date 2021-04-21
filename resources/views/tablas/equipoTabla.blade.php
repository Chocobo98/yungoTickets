<div class= "overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
    <div class="flex items-center justify-center">
        <div class="inset-x-0 bottom-0">
            <table id="tabla-equipo" class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
                <thead class="text-white">
                    <tr class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                        <th class="p-3 text-left">Id</th>
                        <th class="p-3 text-left">Marca</th>
                        <th class="p-3 text-left">Tipo de Equipo</th>
                        <th class="p-3 text-left">Modelo</th>
                        <th class="p-3 text-left">MAC</th>
                        <th class="p-3 text-left">Action</th>    
                    </tr>  
                </thead>
                
            </table>
            <script type="text/javascript">

                $(function(){
                  
                  var table = $('#tabla-equipo').DataTable({
                    ajax: {
                        url:'/inventario/api',
                        type:'GET'
                    },
                    serverSide: true,
                    processing: true,
                    columns:[
                      {data:'idInventario', name:'idInventario' },
                      {data:'marca', name:'marca'},
                      {data: 'tipoEquipo', name:'tipoEquipo'},
                      {data: 'modelo', name: 'modelo'},
                      {data:'MAC', name:'MAC'},
                      {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
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