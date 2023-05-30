<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use App\Models\parametrizacion;
use App\Models\Categoria;
use App\Models\SubCategoria;
use Intervention\Image\Facades\Image;
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
       $data = Insumo::paginate(5);
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
        $categorias = Categoria::all();
        $subcategorias = SubCategoria::where('estado_sub_categoria', 1)->get();
    
        return view('insumos.create', compact('categorias', 'subcategorias'));
    }
    
    
    

    

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'img' => 'required|image',
            'nombre' => 'required',
            'categ' => 'required',
            'subcateg' => 'required',
            'color' => 'required',
            'unidad' => 'required',
            'descripcion' => 'nullable',
            'tags' => 'nullable',
        ]);
    
        // Procesar la imagen
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = $image->getClientOriginalName();
            $image->storePubliclyAs('public/images', $imageName);
        } else {
            $imageName = null;
        }
    
        // Crear el nuevo insumo
        $insumo = new Insumo();
        $insumo->nombre = $validatedData['nombre'];
        $insumo->categ = $validatedData['categ'];
        $insumo->subcateg = $validatedData['subcateg'];
        $insumo->color = $validatedData['color'];
        $insumo->unidad = $validatedData['unidad'];
        $insumo->descripcion = $validatedData['descripcion'];
        $insumo->tags = $validatedData['tags']; // Guardar los tags en el campo 'tags'
        $insumo->img = $imageName;
        $insumo->save();
    
        return redirect()->route('insumos.index')->with('success', 'El insumo se ha registrado correctamente.');
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
        $insumo = Insumo::findOrFail($id);
        $subcategorias = SubCategoria::all();
        $categorias = Categoria::all();
        
        $categoriaSeleccionada = $insumo->categ;
        
        return view('insumos.edit', compact('insumo', 'subcategorias', 'categorias', 'categoriaSeleccionada'));
    }
    
    

    public function update(Request $request, $id)
    {
        // Validar los campos del formulario de edición
        $request->validate([
            'nombre' => 'required',
            'categ' => 'required',
            'subcateg' => 'required',
            'color' => 'required',
            'unidad' => 'required',
        ]);
    
        // Buscar el insumo por su ID
        $insumo = Insumo::findOrFail($id);
    
        // Actualizar los campos del insumo con los valores del formulario
        $insumo->fill($request->only([
            'nombre',
            'categ',
            'subcateg',
            'tags',
            'color',
            'unidad',
            'descripcion',
        ]));
    
        // Manejar la subida de la imagen
        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('ruta/de/tu/carpeta');
            $insumo->img = $imagePath;
        }
    
        // Guardar los cambios en la base de datos
        $insumo->save();
    
        // Redireccionar a la página de detalles del insumo actualizado
        return redirect()->route('insumos.index', $insumo->id)->with('success', 'Insumo actualizado exitosamente.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $insumo = insumo::find($id);
        $insumo->delete();
    
        return redirect()->route('insumos.index');
    }
}
