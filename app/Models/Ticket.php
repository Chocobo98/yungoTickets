<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
