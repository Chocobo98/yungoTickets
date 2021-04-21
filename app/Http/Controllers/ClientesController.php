<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidarCliente;
use App\Models\Clientes;
use Illuminate\Http\Request;
use App\Models\Paquete;
use App\Models\Sitios;
use App\Models\Ticket;
use Yajra\DataTables\Facades\DataTables;

//use App\View\Components\TablaClientesComponent;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        //dd($clientesTable);
        //$datos=tablaClientesController::tabla();
        $data = Clientes::all();
        if($request->ajax())
        {
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row)
            {
                
                $btn="<a href='/clientes/$row->idCliente' class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 border border-blue-700 rounded'>Show</a>
                <a href='/clientes/$row->idCliente/edit' class='bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-3 border border-green-700 rounded'>Edit</a>
                <a href='' id='btn-delete' data-value='$row->idCliente' class=' btn-delete btn-danger bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 border border-red-700 rounded'>Delete</a>";
                return $btn;
                //return $this->getActionColumn($row);
            })

            ->rawColumns(['action'])
            ->make(true);
        }
        return view('clientes.index');
    }

    //API de Datatables
    public function data()
    {
        $prueba = Clientes::all();
        return datatables()->of($prueba)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sitios = Sitios::all();
        $paquete = Paquete::all();
        return view('clientes.create')->with([
            'sitios'=>$sitios,
            'paquete'=>$paquete
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarCliente $request)
    {
        $request->validated();

        $cliente = Clientes::create([
            'nombre'=> $request->input('nombre'),
            'email'=> $request->input('email'),
            'domicilio' => $request->input('domicilio'),
            'telefono' => $request->input('telefono'),
            'fk_paquete' => $request->input('paquete'),
            'fk_sitios' => $request->input('sitios')  
        ]);

        return redirect('/clientes')->with('Exitoso','Se ha registrado un cliente con Exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Clientes::mostrarCliente($id);
        $ticket = Clientes::mostrarTicket($id);
        
        //dd($data);
        //dd($ticket);
        return view('clientes.show')->with([
            'data'=>$data,
            'ticket'=>$ticket]);
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Clientes::find($id);
        $sitios = Sitios::all();
        $paquete = Paquete::all();
        return view('clientes.edit')->with([
            'cliente'=>$cliente,
            'sitios'=>$sitios,
            'paquete'=>$paquete
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarCliente $request, $id)
    {
        $request->validated();

        $cliente = Clientes::where('idCliente',$id)->update([
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'domicilio' => $request->input('domicilio'),
            'telefono' => $request->input('telefono'),
            'fk_paquete' => $request->input('paquete'),
            'fk_sitios' => $request->input('sitios')
        ]);

        return redirect('/clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Clientes::find($id);
        $data->delete();

        return view('/clientes');
    }

    public function asignar($id,$mac)
    {
        $data = Clientes::find($id);
        $data->fk_mac=$mac;
        $data->save();

        //dd($data);

        return redirect("/clientes/$id");
    }
    
}
