<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoriass extends Model
{
    use HasFactory;

    protected $table = 'categorias_servicios';
    protected $primaryKey = 'id_cats';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        
        
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
