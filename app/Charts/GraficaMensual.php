<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
//use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class GraficaMensual extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        
        $consulta = DB::table('ticket')
        ->select(DB::raw("count(1) as Cantidad, DATE_FORMAT(Fecha,'%m') as F"))
        ->groupBy(DB::raw('F'))
        ->pluck('Cantidad','F')
        ->all();

        $firstDayYear = Carbon::now()->firstOfYear();
        //dd($test);

        $data = collect(range(0,11))->map(function($f) use ($firstDayYear, $consulta){
            $meses = $firstDayYear->clone()->addMonth($f)->format('m');
            $tickets=0;
            if(array_key_exists($meses,$consulta))
            {
                $tickets = $consulta[$meses];
            }
            return[
                'Mes' => $meses,
                'tickets' => $tickets
            ];
            
        });
        
        return Chartisan::build()
        ->labels($data->pluck('Mes')->toArray())
        ->dataset('Tickets',$data->pluck('tickets')->toArray());
    }
}