<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidarMAC;
use App\Models\Inventario;
use App\Models\Clientes;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use function PHPUnit\Framework\stringContains;

class inventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inventario.index');
    }

    //API de Datatables
    public function data(Request $request)
    {
        
        if($request->ajax())
        {
            $data = Inventario::all();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row)
            {
                $btn="<a href='/inventario/$row->idInventario/edit' class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded'>Editar</a>
                <a href='/inventario/asignarEquipo/$row->idInventario' class='bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 border border-purple-700 rounded'>Asignar</a>";
                return $btn;
            })
            
            ->rawColumns(['action'])
            ->make(true);
        }
        
        return view('tablas.equipoTabla');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarMAC $request)
    {
        $equipo = Inventario::create([
            'marca'=>$request->input('marca'),
            'tipoEquipo'=>$request->input('tipoEquipo'),
            'modelo'=>$request->input('modelo'),
            'MAC'=>$request->input('mac')
            ]);

            return redirect('/inventario');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Inventario::find($id);
        return view('inventario.edit')->with('equipo',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarMAC $request, $id)
    {
        $request->validated();

        $data = Inventario::find($id)->update([
            'marca' => $request->input('marca'),
            'tipoEquipo' => $request->input('tipoEquipo'),
            'modelo' => $request->input('modelo'),
            'mac' => $request->input('mac')
        ]);

        return redirect('/inventario');
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

    
    public function getUserDetails($id)
    {
       
       $infoCliente = Clientes::mostrarCliente($id);

       return response()->json($infoCliente);
    }

    public function asignar($id)
    {
        $data = Inventario::find($id);
        $clientes = Clientes::select('*')->get();
        return view('inventario.asignar')->with(['equipos'=>$data,'clientes'=>$clientes]);
    }
    
}
