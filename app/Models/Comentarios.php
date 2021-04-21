<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    use HasFactory;

    protected $primaryKey = 'idComentario';
    protected $fillable = ['comentario'];
    public $foreignKey = 'fk_ticket';

    public static function obtenerCommentarios($id)
    {
        
    }
    
}
