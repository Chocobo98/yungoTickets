<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Object_;

class GraficaIndex extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        
        //Consulta para contabilizar todos los tickets registrados en la BD
        $consulta = DB::table('ticket')
        ->select(DB::raw('count(1) as Cantidad,date(Fecha) as Fecha'))
        //->where('Fecha',[Ticket::now()->startOfWeek, Ticket::now()->endOfWeek()]
        ->groupBy(DB::raw('2'))
        ->pluck('Cantidad','Fecha')->all();
        //->get();

        $date = Carbon::now()->subWeek();
        $data = collect(range(0,7))->map(function($days) use ($date,$consulta){
            $daysWeek = $date->clone()->addDays($days)->toDateString();
            $tickets=0;
            if(array_key_exists($daysWeek,$consulta)){
                $tickets=$consulta[$daysWeek];
            }
            return [
                'Semana' => $daysWeek,
                'tickets' => $tickets
            ];
        });
        
        return Chartisan::build()
            //->labels($diasSemana)
            ->labels($data->pluck('Semana')->toArray())
            ->dataset('Tickets',$data->pluck('tickets')->toArray());
    }
}