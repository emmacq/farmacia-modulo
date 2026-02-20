<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apellido',
        'edad',
        'telefono',
        'direccion',
        'email',
        'sexo',
        'id_empleado',   // 👈 LLAVE FORÁNEA
        
    ];

    // Relación: un cliente pertenece a un empleado
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }
}
