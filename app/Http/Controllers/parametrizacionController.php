<?php

namespace App\Http\Controllers;

use App\Models\parametrizacion;
use App\Models\TipoParametrizacion;
use App\Models\Categoria;
use App\Models\SubCategoria;
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
        $categoria = Categoria::paginate(5); // Datos necesarios para el formulario
        $subcategoria = SubCategoria::paginate(5); // Datos de la tabla subcategoria
        return view('parametrizacion.index', compact('categoria', 'subcategoria'));
    }
    

        // método para mostrar el formulario de creación
    public function create()
    {
        $categorias = Categoria::all();
        $SubCategoria = SubCategoria::all();
        return view('parametrizacion.create', compact('categorias', 'SubCategoria'));
    }
        


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'parametro' => 'required',
            'comentario' => 'required',
        ]);
    
        $categoria = null; // Valor predeterminado para la variable $categoria
    
        if ($validatedData['parametro'] == 1) {
            // Nueva categoría
            $categoria = new Categoria;
            $categoria->nombre_categoria = $request->input('nombre_categoria');
            $categoria->tipo = $request->input('tipo');
            $categoria->comentario = $validatedData['comentario'];
            $categoria->save();
        } elseif ($validatedData['parametro'] == 2) {
            // Nueva subcategoría
            $subCategoria = new SubCategoria;
            $subCategoria->nombre_sub_categoria = $request->input('nombre_sub_categoria');
    
            if ($request->filled('categoria')) {
                $subCategoria->id_categ = $request->input('categoria');
            }
    
            $subCategoria->estado_sub_categoria = $request->input('estado_sub_categoria');
            $subCategoria->comentario = $validatedData['comentario'];
            $subCategoria->save();
        }
    
        return redirect()->route('parametrizacion.index')->with('success', 'El parámetro se ha creado exitosamente.');
    }
    
    



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $parametrizacion = parametrizacion::findOrFail($id);
        return view('parametrizacion.show', compact('parametrizacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // método para mostrar el formulario de edición
    public function edit($id)
    {
        $subcategoria = SubCategoria::findOrFail($id);
        $categorias = Categoria::all();
        return view('parametrizacion.edit', compact('subcategoria', 'categorias'));
    }
    


    public function update(Request $request, $id)
    {
        $subcategoria = SubCategoria::findOrFail($id);
        
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required',
            'estado' => 'required',
        ]);
    
        // Actualizar los atributos del registro con los datos del formulario
        $subcategoria->nombre_sub_categoria = $request->nombre;
        $subcategoria->comentario = $request->descripcion;
        $subcategoria->id_categ = $request->categoria;
        $subcategoria->estado_sub_categoria = $request->estado;
    
        // Guardar los cambios en la base de datos
        $subcategoria->save();
    
        // Redireccionar a la vista de la lista de registros o mostrar un mensaje de éxito
        return redirect()->route('parametrizacion.index')->with('success', 'Registro actualizado exitosamente');
    }
    






    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subCategoria = SubCategoria::find($id);
        $subCategoria->delete();
    
        return redirect()->route('parametrizacion.index');
    }
    
}