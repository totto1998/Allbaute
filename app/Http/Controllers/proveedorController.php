<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Insumo;

use App\Models\parametrizacion;
use Illuminate\Support\Facades\Http;

class proveedorController extends Controller
{
    
    public function index()
    {
        $data = Proveedor::all();
        return view('proveedor.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $proveedor = Proveedor::all();
       $response = Http::get('https://www.datos.gov.co/resource/xdk5-pm3f.json?$query=SELECT%20%60region%60%2C%20%60departamento%60%2C%20%60municipio%60');
       $locations = $response->json();
     
       return view('proveedor.create', compact('proveedor','locations'));
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
            'region' => 'required',
            'departamento' => 'required',
            'municipio' => 'required',
            'email' => 'required',
            'nombre_contacto' => 'required',
            'tags' => 'required',
        ]);
 
        $proveedor = new proveedor();
        $proveedor->nombre_contacto = $validatedData['nombre_contacto'];
        $proveedor->email = $validatedData['email'];
        $proveedor->razon_social = $validatedData['razon_social'];
        $proveedor->nit = $validatedData['nit'];
        $proveedor->telefono_fijo = $validatedData['telefono_fijo'];
        $proveedor->celular = $validatedData['celular'];
        $proveedor->direccion = $validatedData['direccion'];
        $proveedor->region = $validatedData['region'];
        $proveedor->departamento = $validatedData['departamento'];
        $proveedor->municipio = $validatedData['municipio'];

        $proveedor->tags = $validatedData['tags'];
        


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
    public function edit($id)
    {
        $proveedor = proveedor::findOrFail($id);
        $response = Http::get('https://www.datos.gov.co/resource/xdk5-pm3f.json?$query=SELECT%20%60region%60%2C%20%60departamento%60%2C%20%60municipio%60');
        $locations = $response->json();

    
        return view('proveedor.editar', compact('proveedor','locations'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'nombre_contacto' => 'required|string',
            'email' => 'required|email',
            'razon_social' => 'required|string',
            'nit' => 'nullable|numeric',
            'telefono_fijo' => 'required|numeric',
            'celular' => 'required|numeric',
            'direccion' => 'required|string',
            'region' => 'required|string',
            'departamento' => 'required|string',
            'municipio' => 'required|string',
            'tags' => 'required|string',
            // Otros campos del formulario
        ]);
    
        // Obtener el proveedor a actualizar
        $proveedor = Proveedor::findOrFail($id);
    
        // Actualizar los datos del proveedor con los valores del formulario
        $proveedor->nombre_contacto = $validatedData['nombre_contacto'];
        $proveedor->email = $validatedData['email'];
        $proveedor->razon_social = $validatedData['razon_social'];
        $proveedor->nit = $validatedData['nit'];
        $proveedor->telefono_fijo = $validatedData['telefono_fijo'];
        $proveedor->celular = $validatedData['celular'];
        $proveedor->direccion = $validatedData['direccion'];
        $proveedor->region = $validatedData['region'];
        $proveedor->departamento = $validatedData['departamento'];
        $proveedor->municipio = $validatedData['municipio'];
        $proveedor->tags = $validatedData['tags'];
    
        // Guardar los cambios en la base de datos
        $proveedor->save();
    
        // Redireccionar a la página de detalles del proveedor o a otra vista de tu elección
        return redirect()->route('proveedor.index');
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