<?php

namespace App\Http\Controllers;

use App\Models\insumos;
use App\Models\parametrizacion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class insumosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $data = insumos::paginate(8);
       return view('insumos.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     $paramcateg = Parametrizacion::where('id_tipo', 1)->get();
    //     return view('insumos.create', ['paramcateg' => $paramcateg]);
    // }
    public function create()
{
    $paramcateg = parametrizacion::all();
    return view('insumos.create', compact('paramcateg'));
}

    

public function store(Request $request)
{
    $request->validate([
          'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
          'tags' => 'required',
          'categ' => 'required',
          'precio' => 'required|numeric',
          'stock' => 'required|numeric',
          'estado' => 'required|numeric',
          'descuento' => 'required|numeric',
          'color' => 'required',
          'unidad' => 'required',
          'ancho' => 'required|numeric',
    ]);
        // Obtener la imagen del formulario
        $image = $request->file('img');

        // Generar un nombre único para la imagen
        $imageName = time() . '.' . $image->extension();

        // Mover la imagen a la carpeta de almacenamiento
        $image->move(public_path('images'), $imageName);

        $insumo = Insumos::create([
            'img' => $imageName,
            'tags' => $request->tags,
            'categ' => $request->categ,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'descuento' => $request->descuento,
            'color' => implode(',', $request->color), // Convertir el array en una cadena separada por comas
            'unidad' => $request->unidad,
            'ancho' => $request->ancho,
            'subcateg' => $request->subcateg,
            'estado' => $request->estado,
            'created_at' => now(),
        ]);
        
    // Otras operaciones que desees realizar después de guardar el insumo
    return redirect()->route('insumos.index')->with('success', 'Insumo agregado correctamente');
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
        $insumo = insumos::find($id);
        $paramcateg = parametrizacion::all();
        // Puedes pasar otros datos necesarios al formulario si lo deseas

        return view('insumos.edit', compact('insumo','paramcateg'));
    }

    // Método para actualizar el registro en la base de datos
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario si es necesario
        $request->validate([
            'tags' => 'required',
            'precio' => 'required',
            'stock' => 'required',
            'descuento' => 'required',
            'color' => 'required',
            'unidad' => 'required',
            'ancho' => 'required',
            'estado' => 'required',
        ]);
    
        // Buscar el insumo a actualizar
        $insumo = insumos::find($id);
    
        // Procesar y guardar la imagen si se ha enviado una nueva imagen
        if ($request->hasFile('img')) {
            // Obtener el archivo de imagen enviado
            $image = $request->file('img');
    
            // Generar un nombre único para la imagen
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
    
            // Guardar la imagen en la ubicación deseada (por ejemplo, la carpeta "images" dentro del directorio público)
            $image->move(public_path('images'), $imageName);
    
            // Actualizar el campo de imagen en la base de datos con el nombre de la imagen
            $insumo->img = $imageName;
        }
    
        // Actualizar los demás campos del insumo
        $insumo->tags = $request->tags;
        $insumo->precio = $request->precio;
        $insumo->stock = $request->stock;
        $insumo->descuento = $request->descuento;
        $insumo->color = $request->color;
        $insumo->unidad = $request->unidad;
        $insumo->ancho = $request->ancho;
        $insumo->estado = $request->estado;
        $insumo->categ = $request->categ;
        $insumo->subcateg = $request->subcateg;
    
        // Guardar los cambios en la base de datos
        $insumo->save();
    
        // Redireccionar a la vista deseada o mostrar un mensaje de éxito
        return redirect()->route('insumos.index')->with('success', 'El insumo se actualizó correctamente.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $insumo = insumos::find($id);
        $insumo->delete();
    
        return redirect()->route('insumos.index');
    }
}
