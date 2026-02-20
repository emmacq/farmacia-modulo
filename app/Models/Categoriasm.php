<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoriasm extends Model
{
    use HasFactory;

    protected $table = 'categorias_m';
    protected $primaryKey = 'id_catm';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'existencia',
        
    ];

    /**
     * Relación:
     * Un empleado puede tener muchos clientes
     */
    /*public function clientes()
    {
        return $this->hasMany(Alta::class, 'id_empleado');
    }*/
}
