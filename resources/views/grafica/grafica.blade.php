<div id="graficaTickets" style="flex: auto; width: 40%; align-self: center;
margin-top: 25px;">
</div>
<div class="self-center p-3">
  <!--Boton para mostrar los registros de los meses en el año actual-->
  <button id="btnMensual" class="text-green-500 bg-transparent border border-solid border-green-500 hover:bg-green-500 hover:text-white active:bg-green-600 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
  Mensual
  </button>
  <!--Boton para mostrar registro de la semana (Desde el dia actual de la maquina)-->
  <button id="btnSemanal" class="text-red-500 bg-transparent border border-solid border-red-500 hover:bg-red-500 hover:text-white active:bg-red-600 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
  Semanal
  </button>
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
   