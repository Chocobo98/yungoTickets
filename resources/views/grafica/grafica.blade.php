<div class="container h-auto w-auto inline-flex box-border ">
  <div id="graficaTickets" class="flex-grow-0 w-2/5 self-auto mt-6 ml-5 pb-8">
  </div>
  <div class="flex flex-col flex-grow-0 space-y-5 mt-9 p-5">
    <!--Boton para mostrar los registros de los meses en el año actual-->
    <button id="btnMensual" class="text-green-500 bg-transparent border border-solid border-green-500 hover:bg-green-500 hover:text-white active:bg-green-600 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
    Mensual
    </button>
    <!--Boton para mostrar registro de la semana (Desde el dia actual de la maquina)-->
    <button id="btnSemanal" class="text-red-500 bg-transparent border border-solid border-red-500 hover:bg-red-500 hover:text-white active:bg-red-600 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
    Semanal
    </button>
  </div>
  {{-- Apartado de la tabla con los numeros de ticket por estado --}}}
  @include('tablas.tablasNumerosTickets',['ticketMensual'=>$ticketMensual,'ticketGeneral'=>$ticketGeneral])
</div>

{{-- Barra para descargar el reporte --}}
<div class="ml-10 mt-2 flex">
  <a href="{{ route('pdf.download') }}">
     <button class="bg-gray-300 hover:bg-gray-400 text-gray-900 font-bold py-2 px-4 rounded inline-flex items-center">
        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
        <span>Generar reporte mensual</span>
      </button>
  </a>
</div>

<!-- Charting library -->
<script src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script>
<!-- Chartisan -->
<script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>

                
<script>
    //Por defecto se muestra los registros de la semana

    const registros = new Chartisan({
      el: '#graficaTickets',
      url: "@chart('grafica_index')",
      hooks: new ChartisanHooks()
        .stepSize(1,'y')
        .colors(['#f54444'])
        .borderColors(),
    });

    $(document).ready(function(){
      $('#btnMensual').click(function(){
        registros.update({
          url:"@chart('grafica_mensual')"
        })
      });

      $('#btnSemanal').click(function(){
        registros.update({
          url:"@chart('grafica_index')"
        })
      });
    });
    
    //console.log(registros);

</script>
   