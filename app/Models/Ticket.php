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
}
