<div class= "overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
    <div class="flex items-center justify-center">
        <div class="inset-x-0 bottom-0">
            <table class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
                <thead class="text-white">
                  @if(isset($userInner))
                    @foreach ($userInner as $user)  
                    <tr class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                        <th class="p-3 text-left">Cliente</th>
                        <th class="p-3 text-left">Email</th>
                        <th class="p-3 text-left">Telefono</th>
                        <th class="p-3 text-left">Sitio</th>
                        <th class="p-3 text-left" width="110px" >Problema</th>
                    </tr>
                    @endforeach
                  @endif
                </thead>
                <tbody class="flex-1 sm:flex-none">
                  @if(isset($userInner))
                    @foreach ($userInner as $user)
                    <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate ">{{ $user->nombre }}</td>
                        
                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate ">{{ $user->email }}</td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">{{ $user->telefono}}</td>
                        
                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">{{ $user->zona }}</td>
                        <td id="problemaTicket" class="border-grey-light border hover:bg-gray-100 p-3 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer"><a href="/tickets/{{ $user->idTicket }}">{{ $user->tipoProblema }}</a></td>
                    </tr>
                    @endforeach
                  @endif     
                </tbody> 
            </table>
        </div>
    </div>
</div>

<script>
  /*
  $(document).ready(function(){
    $('#problemaTicket').on("click",function(){
      //Arreglar para que tome el valor de la ultima casilla de los tickets
      prueba = $(this).val();
      console.log(prueba);
      //url=`tickets/${value}`;
      //window.location.replace(url);
    });
  });
  */
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
