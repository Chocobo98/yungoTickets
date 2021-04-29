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

   public function store(Request $request, Ticket $ticket)
   {
        $comment = $ticket->comentarios()->create([
            'comentario' => $request->comentario,
            'fk_ticket' => $request->fk_ticket
        ]);

        $comment = Comentarios::where('idComentario',$comment->idComentario)->with('idTicket')->first();

        return $comment->toJson();
   }
}
