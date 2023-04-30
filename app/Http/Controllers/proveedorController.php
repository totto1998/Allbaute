<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\proveedor;

class proveedorController extends Controller
{
    
    function __construct()
    {
        $this->middleware('permission:ver-proveedor | crear-proveedor | editar-proveedor | borrar-proveedor',['only'=>['index']]);
        $this->middleware('permission:crear-proveedor', ['only'=>['create','store']]);
        $this->middleware('permission:editar-proveedor', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-proveedor', ['only'=>['edit','detroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedor = proveedor::paginate(10);
        return view('proveedor.index', compact('proveedor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proveedor = Proveedor::all();
       return view('provee$proveedor.crear', compact('provee$proveedor'));
    }

    /**
     * Store a newly created resource in storage.
     */
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
    public function edit(proveedor $id)
    {
        return view('proveedor.editar', compact('provedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // request()->validate([

        // ]);
        // $proveedor->update($request->all());
        // return redirect()->route('proveedor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(proveedor $proveedor)
    {
        $proveedor->delete();
        return redirect()->route('proveedor.index');

    }
}