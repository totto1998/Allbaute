<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoParametrizacion;

class TipoParametrizacionController extends Controller
{
    public function index()
    {
        $tipos_parametrizacion = TipoParametrizacion::paginate(10);;
        return view('parametrizacion.index', ['tipos_parametrizacion' => $tipos_parametrizacion]);
    }
}
