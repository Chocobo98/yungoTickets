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
        
        return view('index')->with('prueba',$prueba);
    }
}
