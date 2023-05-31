<?php

namespace App\Http\Controllers;

use App\Models\OrdenCompra;
use App\Models\Proveedor;
use App\Models\Insumo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ordenCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $ordencompra = OrdenCompra::paginate(5);
       return view('ordenCompra.index', compact('ordencompra'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $itemsPerPage = 10; // Cantidad de elementos por página
    
        // $proveedores = Proveedor::all();
    
        return view('ordenCompra.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function registrar()
    {
       return view('ordenCompra.registrar');
    }



    public function store(Request $request)
    {
        //
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