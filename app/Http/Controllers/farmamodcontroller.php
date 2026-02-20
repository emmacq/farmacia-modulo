<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Medicamento;
use App\Models\Servicio;
use App\Models\Categoriasm;
use App\Models\Categoriass;

class farmamodcontroller extends Controller
{
    public function alta()
    {
        $clientes = Cliente::orderBy('nombre')->get();
        $empleados = Empleado::orderBy('nombre')->get();
        $medicamentos = Medicamento::all();
        $servicios = Servicio::all();
        $categorias_m = Categoriasm::all();
        $categoria_servicios = Categoriass::all();

        return view('alta', compact('clientes', 'empleados', 'medicamentos', 'servicios', 'categorias_m','categorias_servicios'));
    }

    public function guardar(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'nombre'   => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'edad'     => 'required|integer|min:0',

            // Teléfono: valida longitud (8 a 10 dígitos)
            'telefono' => 'required|digits_between:8,10',

            'direccion' => 'required|string|max:255',
            'email'     => 'required|email|max:255',

            // ENUM M / F
            'sexo' => 'required|in:M,F',

            // Llaves foráneas
            'id_c' => 'required|exists:clientes,id_c',
            'id_empleado' => 'required|exists:empleados,id_empleado',
            'id_s'        => 'required|exists:servicios,id_s',
            'id_cats'        => 'required|exists:servicios,id_cats',
            'id_med'      => 'required|exists:medicamentos,id_m',
            'id_catm'      => 'required|exists:categorias_m,id_catm',
            
        ]);

        Alta::create($request->all());

        return redirect()->back()->with('success', 'Paciente guardado correctamente');
    }

    public function medicamentosPorCategoria($idCat)
{
    $meds = Medicamento::where('id_catm', $idCatm)
        ->get(['id_m','nombre','precio']);  // <- IMPORTANTE

    return response()->json($meds);
}

 public function serviciosPorCategoria($idCats)
{
    $serv = Servicio::where('id_cats', $idCat)
        ->get(['id_m','nombre','precio']);  // <- IMPORTANTE

    return response()->json($meds);
}

    public function reporte()
{
    
}

}
