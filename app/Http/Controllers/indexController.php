<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class indexController extends Controller
{
    public function index()
    {   

        $prueba = Clientes::lastFive();
        $ticketMensual = Ticket::estadoMensual();
        $ticketGeneral = Ticket::estadoGeneral();
        return view('index')->with(['prueba'=>$prueba,'ticketMensual'=>$ticketMensual,'ticketGeneral'=>$ticketGeneral]);
    }

    /*
    Consulta para sacar todos los registros levantados en el mes actual
    SELECT tipoProblema, count(*) as reportes, date_format(Fecha,'%m') as Mes
        FROM ticket
        WHERE Month(Fecha) = Month(Now())
        GROUP BY 1
        ORDER BY Mes

    Consulta para sacar la cantidad de los tickets registrados por su estado
    Select estado, count(*) as Registros
        FROM ticket
        GROUP BY 1

    Consulta para sacar la cantidad de los ticket registrados por su estado en el mes actual
    Select estado, count(*) as Registros
        FROM ticket
        WHERE Month(Fecha) = Month(Now())
        GROUP BY 1

    Consulta para sacar la informacion de los comentarios respectivos al id del ticket
    SELECT idComentario, comentario,fk_ticket, date_format(created_at, '%d/%M/%Y %H:%i %p') as Fecha 
        FROM `comentarios` 
        WHERE fk_ticket = 20;
    
    */
}
