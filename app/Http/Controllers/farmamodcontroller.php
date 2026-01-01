<?php

namespace App\Http\Controllers;

use App\Http\Controllers\farmamodcontroller;
use Illuminate\Http\Request;

class farmamodcontroller extends Controller
{
    public function main()
{
    return view('main');
}
    public function productos()
{
    return view('productos');
}
    public function contacto()
{
    return view('contacto');
}

   public function guardar()
{
    return view('guardar');
}

}
