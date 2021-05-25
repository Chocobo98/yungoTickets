<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'tipoProblema',
        'Fecha',
        'descripcion',
        'estado',
        'fk_cliente'
    ];

    protected $primaryKey = 'idTicket';

    protected $table = 'ticket';

    public $timestamps = false;

    


    public function cliente()
    {
        return $this->hasOne(Clientes::class);
    }

    public static function clienteTick()
    {
        $consulta = Ticket::select('clientes.nombre','ticket.*')
        ->join('clientes','idCliente','=','fk_cliente')
        ->get();
        return $consulta;
    }

    public static function infoTicket($id)
    {
        $consulta = Ticket::select('clientes.nombre','ticket.*')
        ->join('clientes','idCliente','=','fk_cliente')
        ->where('idTicket',$id)
        ->get();

        return $consulta;
    }

    public function comentarios()
    {
        return $this->hasMany(Comentarios::class)->orderBy('idTicket','desc');
    }

    public static function estadoMensual()
    {  
        $estados = ['Nuevo'=>0,'Abierto'=>0,'Resuelto'=>0];

        $mes= Carbon::now()->month;

        $query = Ticket::select(DB::raw('estado as Estado,count(*) as Registros'))
        ->where(DB::raw('Month(Fecha)'),'=',$mes)
        ->groupby(DB::raw('1'))
        ->pluck('Registros','Estado')
        ->all();

        foreach ($query as $k => $v) 
        {
            if(array_key_exists($k,$estados))
            {
                $estados[$k] = $v;
            }
        }
        return $estados;
    }

    public static function estadoGeneral()
    {
        $estados = ['Nuevo'=>0,'Abierto'=>0,'Resuelto'=>0];

        $query = Ticket::select(DB::raw('estado as Estado, count(*) as Registros'))
        ->groupby(DB::raw(1))
        ->pluck('Registros','Estado')
        ->all();

        foreach ($query as $k => $v) 
        {
            if(array_key_exists($k,$estados))
            {
                $estados[$k] = $v;
            }
        }
        return $estados;
    }

    public static function historialTickets($id,$tipoProblema)
    {
        $query = Ticket::select('idTicket', 'Fecha', 'estado')
        ->where([
            ['fk_cliente','=',$id],
            ['tipoProblema','=',$tipoProblema]])
        ->get();

        return $query;
    }

    //Aartado para las consultas de los tickets del mes[MULTIPLES CONSULTAS]

    //Consulta para mostrar los tickets registrados en el mes actual
    public static function pdfTMensual()
    {
        $data = Ticket::where(DB::raw('date_format(Fecha,"%m")'),'=', DB::raw('MONTH(CURDATE())'))->get();
        //dd($data);

        return $data;
    }

    //Consulta para mostrar los ticket resueltos en el mes actual
    public static function pdfTMensualEstado()
    {
        $data = Ticket::where([
            [DB::raw('date_format(Fecha,"%m")'),'=', DB::raw('MONTH(CURDATE())')],
            ['estado','=','Resuelto']
            ])->get();

        //dd($data);
        return $data;
    }

    //Consulta para mostrar el conteo del tipo de problema registrado en el mes
    public static function pdfTConteoTP()
    {
        $data = Ticket::select(DB::raw('count(tipoProblema) as Registros'),'tipoProblema')
        ->where(DB::raw('date_format(Fecha,"%m")'),'=',DB::raw('MONTH(CURDATE())'))
        ->groupby('tipoProblema')
        ->get();

        //dd($data);

        return $data;
    }

    public static function pdfTConteoZona()
    {
        $data = Ticket::select(DB::raw('count(*) as Registros'),'sitios.zona')
        ->join('clientes','idCliente','=','fk_cliente')
        ->join('sitios','idSitios','=','fk_sitios')
        ->where(DB::raw('date_format(Fecha,"%m")'),'=',DB::raw('MONTH(CURDATE())'))
        ->groupby('zona')
        ->orderby('Registros','desc')
        ->get();

        //dd($data);

        return $data;
    }
}
