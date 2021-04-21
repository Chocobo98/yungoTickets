<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'idInventario';

    protected $fillable = [
        'MAC',
        'modelo',
        'marca',
        'tipoEquipo'
    ];

    public $timestamps = false;

    protected $table = 'inventario';

    public function cliente()
    {
        return $this->hasOne(Clientes::class,'MAC');
    }
}
