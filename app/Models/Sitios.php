<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sitios extends Model
{
    use HasFactory;

    protected $fillable = [
        'zona'
    ];

    protected $hidden = [
        'idSitios'
    ];

    protected $primaryKey = 'idSitios';

    public function cliente()
    {
        return $this->hasMany(Clientes::class,'idSitios');
    }
}
