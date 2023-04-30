<?php

namespace App\Http\Controllers;

use App\Models\parametrizacion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;

use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Arr; 

class parametrizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parametrizacion = parametrizacion::paginate(10);
        return view('parametrizacion.index', compact('parametrizacion'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $parametrizacion = Parametrizacion::all();
       return view('parametrizacion.crear', compact('parametrizacion'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $parametrizacion = new parametrizacion;
        $parametrizacion->id_tipo = $request->id_tipo;
        $parametrizacion->nombre = $request->name;
        $parametrizacion->descripcion = $request->description;
        $parametrizacion->estado = $request->estado;
        $parametrizacion->save();

        return redirect()->route('parametrizacion.index')->with('success', 'La parametrización ha sido creada exitosamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}