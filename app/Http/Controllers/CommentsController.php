<?php

namespace App\Http\Controllers;

use App\Models\Comentarios;
use App\Models\Ticket;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function obtener($id)
    {   
        $data = Comentarios::comentariosTickets($id);
        return $data;
    }

    public function agregar(Request $request,$id)
    {
        $data = Comentarios::create([
            'comentario' => $request->input('comentario'),
            'fk_ticket' => $id
        ]);

        $getData = Comentarios::comentariosTickets($id);

        //Se obtiene el primero, debido a la forma que esta ordenada en el modelo
        return $getData->first(); 
        
    }
}
