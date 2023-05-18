<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\insumos;
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
        $data = proveedor::paginate(10);
        $insumo = insumos::all();
        return view('proveedor.index', compact('data', 'insumo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $proveedor = Proveedor::all();
       $insumos = insumos::all();
     
       return view('proveedor.create', compact('proveedor', 'insumos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // 'tipo_parametrizacion' => 'required',
            // 'nombre' => 'required|max:255',
            // 'estado' => 'required',
            'razon_social' => 'required',
            'nit' => 'required',
            'telefono_fijo' => 'required',
            'celular' => 'required',
            'direccion' => 'required',
            'ciudad' => 'required',
            'email' => 'required',
            'nombre_contacto' => 'required',
            't_insumo' => 'required',
            'tags' => 'required',
        ]);
 
        $proveedor = new proveedor();
        $proveedor->razon_social = $validatedData['razon_social'];
        $proveedor->nit = $validatedData['nit'];
        $proveedor->telefono_fijo = $validatedData['telefono_fijo'];
        $proveedor->celular = $validatedData['celular'];
        $proveedor->direccion = $validatedData['direccion'];
        $proveedor->ciudad = $validatedData['ciudad'];
        $proveedor->email = $validatedData['email'];
        $proveedor->nombre_contacto = $validatedData['nombre_contacto'];
        $proveedor->t_insumo = $validatedData['t_insumo'];
        $proveedor->tags = $validatedData['tags'];
        
        // $proveedor->id_tipo = $validatedData['tipo_parametrizacion'];
        // $proveedor->nombre = $validatedData['nombre'];
        // $proveedor->descripcion = $request->descripcion;
        // $proveedor->estado = $validatedData['estado'];

        $proveedor->save();
 
        return redirect()->route('proveedor.index')->with('success', 'El Proveedor se ha creado exitosamente.');
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