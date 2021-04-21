<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    use HasFactory;
    protected $fillable =[
        'nombrePaquete',
        'capacidad',
        'precio'
    ];

    protected $hidden = [
        'idPaquete'
    ];

    protected $table = 'paquete';
    protected $primaryKey = 'idPaquete';

    public function cliente()
    {
        return $this->hasMany(Clientes::class,'idPaquete');
    }
}
