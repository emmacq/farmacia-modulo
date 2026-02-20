<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleados';
    protected $primaryKey = 'id_empleado';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apellido',
        'cargo',
        'telefono',
        'sexo',
    ];

    /**
     * Relación:
     * Un empleado puede tener muchos clientes
     */
    public function clientes()
    {
        return $this->hasMany(Alta::class, 'id_empleado');
    }
}
