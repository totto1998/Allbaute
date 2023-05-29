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
        $categorias = Categoria::where('estado_categoria', 1)->get();
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
    
        return view('insumos.edit', compact('insumo', 'subcategorias', 'categorias'));
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
        $insumo = insumo::find($id);
    
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
        $insumo = insumo::find($id);
        $insumo->delete();
    
        return redirect()->route('insumos.index');
    }
}
