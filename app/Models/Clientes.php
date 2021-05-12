<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;

    protected $primaryKey = 'idCliente';
    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'domicilio',
        'fk_paquete',
        'fk_sitios',
        'fk_mac'
    ];

    public $foreignKey = ['fk_paquete','fk_sitios','fk_mac']; 

    public $timestamps = false;

    public function sitios()
    {
        //$consulta = $this->hasOne(Sitios::class,'fk_sitios','idSitios');
        //return compact($consulta);

        return $this->belongsTo(Sitios::class,'fk_sitios','idSitios');
    }

    public function inventario()
    {
        return $this->belongsTo(Inventario::class,'fk_mac','MAC');
    }

    public function paquete()
    {
        return $this->belongsTo(Paquete::class,'fk_paquete','idPaquete');
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function todos()
    {
        return $this->all();
    }

    public static function lastFive()
    {
        $userInner = Clientes::select('clientes.nombre','clientes.email','clientes.telefono','sitios.zona','ticket.idTicket','ticket.tipoProblema')
        ->join('sitios','fk_sitios','=','idSitios')
        ->join('ticket','idCliente','=','fk_cliente')
        ->distinct('idCliente')
        ->where('ticket.estado','<>','Resuelto')
        ->orderBy('Fecha','desc')
        ->limit(5)
        ->get();

        return $userInner->all();
    }

    
    public static function mostrarCliente($id)
    {   
        $data = Clientes::select(
            'clientes.*',
            'sitios.zona',
            'paquete.nombrePaquete'
            )
            ->join('sitios','fk_sitios','=','idSitios')
            ->join('paquete','fk_paquete','=','idPaquete')
            ->where('idCliente','=',$id)
            ->get();

        return $data;
    }  

    public static function mostrarTicket($id)
    {
        $data = Ticket::select('ticket.*')->where('fk_cliente','=',$id)->get();
        return $data;
    }

}
