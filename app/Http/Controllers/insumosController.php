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
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;



class insumosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $data = Insumo::all();
       return view('insumos.index', compact('data'));
    }



    public function create()
    {
        $categorias = Categoria::all();
        $subcategorias = SubCategoria::where('estado_sub_categoria', 1)->get();
    
        return view('insumos.create', compact('categorias', 'subcategorias'));
    }
    

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'img' => 'required|image|max:2048', // Validación de imagen, máximo 2 MB
            'nombre' => 'required',
            'categ' => 'required',
            'subcateg' => 'required',
            'color' => 'required',
            'unidad' => 'required',
            'descripcion' => 'nullable',
            'tags' => 'nullable',
        ]);
    
        // Obtener el archivo de imagen del request
        $image = $request->file('img');
    
        // Generar un nombre único para la imagen
        $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();
    
        // Mover la imagen a la ubicación deseada utilizando public_path
        $image->move(public_path('images'), $imageName);
    
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
            // Obtener el archivo de imagen del request
            $image = $request->file('img');
    
            // Generar un nombre único para la imagen
            $imageName = time() . '.' . $image->getClientOriginalExtension();
    
            // Mover la imagen a la ubicación deseada en public_path
            $image->move(public_path('images'), $imageName);
    
            // Eliminar la imagen anterior (opcional)
            if ($insumo->img) {
                File::delete(public_path('images/' . $insumo->img));
            }
    
            // Actualizar el campo 'img' con el nuevo nombre de la imagen
            $insumo->img = $imageName;
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
