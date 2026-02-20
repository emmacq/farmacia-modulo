<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $table = 'servicios';
    protected $primaryKey = 'id_s';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        
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
