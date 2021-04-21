<?php

namespace App\View\Components;

//use App\Http\Controllers\ClientesController;
use App\Models\Clientes;
use Illuminate\View\Component;
//use Illuminate\Http\Request;

class TablaClientesComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
   

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        /*
        $clientesTable = Clientes::select('clientes.*','paquete.capacidad')
        ->join('paquete','fk_paquete','=','idPaquete')
        ->get();
        return $clientesTable;
        */
        
        
    }
}
