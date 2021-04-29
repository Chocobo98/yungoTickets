<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        $query = Comentarios::where("fk_ticket","=",$id)->get();
        return $query;
    }
}
