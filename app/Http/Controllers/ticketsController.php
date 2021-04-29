<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Carbon;
use App\Models\Clientes;
use App\Models\Comentarios;

use Illuminate\Support\Facades\DB;

class ticketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tickets.index');
    }

    //API de Datatables
    public function data(Request $request)
    {
        if($request->ajax())
        {
            $data = Ticket::clienteTick();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action',function($row)
            {
                $btn="<a href='/tickets/$row->idTicket' class='bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 border border-indigo-700 rounded'>Revisar</a>";
                return $btn;
            })
            ->editColumn('Fecha',function($date)
            {
                //return $date->Fecha ? with(new Carbon($date->fecha))->format('d/m/Y h:i'):'';
                return date('m-d-Y H:i A',strtotime($date->Fecha));
            })
            ->editColumn('estado',function($status)
            {
                switch($status->estado)
                {
                    case 'Nuevo':
                        $labelStatus="<span class='text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-green-600 bg-green-200 last:mr-0 mr-1'>Nuevo</span>";
                        break;
                    case 'Abierto':
                        $labelStatus="<span class='text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-yellow-600 bg-yellow-200 last:mr-0 mr-1'>Abierto</span>";
                        break;
                    case 'Resuelto':
                        $labelStatus="<span class='text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-gray-600 bg-gray-200 last:mr-0 mr-1'>Resuelto</span>";
                        break;
                }
                return $labelStatus;
            })
            ->escapeColumns('estado')
            ->make(true);
        }
        return view('tablas.tablaTickets');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Clientes::select('idCliente','nombre')->get();
        return view('tickets.create')->with('clientes',$clientes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$request->validate();

        $ticket = Ticket::create([
            'tipoProblema'=>$request->input('tipoProblema'),
            'descripcion'=>$request->input('descripcion'),
            'estado'=>$request->input('estado'),
            'fk_cliente'=>$request->input('clientes'),
            'Fecha'=>Carbon::now('-8')
        ]);
        return redirect('/tickets');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Ticket::infoTicket($id);  
        //$comments = Ticket::comentariosTickets($id);
        return view('tickets.show')->with('data',$data/*'comments'=>$comments]*/);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /*
    public function estadoMensual()
    {
        $mes= Carbon::now()->month;

        $data = Ticket::select(DB::raw('estado as Estado,count(*) as Registros'))
        ->where(DB::raw('Month(Fecha)'),'=',$mes)
        ->groupby(DB::raw('1'))
        ->pluck('Registros','Estado')
        ->all();

        //dd($data);

        return view('tablas.tablasNumerosTickets')->with('data',$data);
    }

    public function estadoGeneral()
    {

    }
    */
}
