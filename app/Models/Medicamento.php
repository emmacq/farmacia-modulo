<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use HasFactory;

    // Si tu tabla se llama diferente a "medicamentos"
    protected $table = 'medicamentos'; 

    // Si tu PK no es "id"
    protected $primaryKey = 'id_m'; 

    // Si no quieres que Laravel gestione created_at y updated_at
    public $timestamps = false;

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'descripcion',
        'stock',
        'precio',
        'fecha_cad',
        'existencia',
        'receta'
    ];
}
