<?php

namespace App\Http\Controllers;

use App\Models\Comentarios;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function detail (Request $request, $id)
    {
        $comment = Comentarios::find($id);
        return view('tickets.show')->with('comment',$comment);
    }
}
