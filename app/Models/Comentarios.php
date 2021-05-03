<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comentarios extends Model
{
    use HasFactory;

    public $table = 'comentarios';
    protected $primaryKey = 'idComentario';
    protected $fillable = ['comentario'];
    public $foreignKey = 'fk_ticket';
    public $timestamps = true;

    
    public function tickets()
    {
        return $this->belongsTo(Tickets::class);
    }

    public static function comentariosTickets($id)
    {
        $query = Comentarios::select(DB::raw("idComentario, comentario, fk_ticket as Ticket, date_format(created_at,'%d/%M/%Y %H:%i %p') as Fecha"))
        ->where('fk_ticket','=',$id)
        ->get();
        return $query;
    }
}
