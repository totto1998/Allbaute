<?php

namespace App\Http\Controllers;

use App\Models\parametrizacion;
use App\Models\TipoParametrizacion;
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
        //  $parametrizacion = parametrizacion::paginate();
        //  return view('parametrizacion.index', compact('parametrizacion'));

         $data = parametrizacion::paginate(8); // Datos necesarios para el formulario
         $tipo_parametrizacion = TipoParametrizacion::paginate(8);; // Datos de la tabla tipo_parametrizacion
         return view('parametrizacion.index', compact('data', 'tipo_parametrizacion'));
    }

        // método para mostrar el formulario de creación
        public function create()
        {
            $tipo_parametrizacion = TipoParametrizacion::all();
            return view('parametrizacion.create', compact('tipo_parametrizacion'));
        }


//     public function store(Request $request)
//     {
//     // Validar los datos del formulario
//     $validatedData = $request->validate([
//         'tipo_parametrizacion' => 'required',
//         'nombre' => 'required',
//         'estado' => 'required',
//     ]);

//     // Crear una nueva instancia del modelo Parametrizacion
//     $parametrizacion = new Parametrizacion;

//     // Asignar los valores recibidos desde el formulario a las propiedades del modelo
//     $parametrizacion->id_tipo = $validatedData['tipo_parametrizacion'];
//     $parametrizacion->nombre = $validatedData['nombre'];
//     $parametrizacion->descripcion = $request->descripcion;
//     $parametrizacion->estado = $validatedData['estado'];

//     // Guardar el nuevo registro en la base de datos
//     $parametrizacion->save();

//     // Redirigir al usuario a la página de la lista de parámetros con un mensaje de confirmación
//     return redirect()->route('parametrizacion.index')->with('status', 'El parámetro se ha agregado correctamente.');
// }

   // método para guardar el nuevo parámetro
   public function store(Request $request)
   {
       $validatedData = $request->validate([
           'tipo_parametrizacion' => 'required',
           'nombre' => 'required|max:255',
           'estado' => 'required',
       ]);

       $parametrizacion = new Parametrizacion;
       $parametrizacion->id_tipo = $validatedData['tipo_parametrizacion'];
       $parametrizacion->nombre = $validatedData['nombre'];
       $parametrizacion->descripcion = $request->descripcion;
       $parametrizacion->estado = $validatedData['estado'];
       $parametrizacion->save();

       return redirect()->route('parametrizacion.index')->with('success', 'El parámetro se ha creado exitosamente.');
   }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $parametrizacion = Parametrizacion::findOrFail($id);
        return view('parametrizacion.show', compact('parametrizacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // método para mostrar el formulario de edición
    public function edit($id)
    {
        $parametrizacion = Parametrizacion::findOrFail($id);
        $tipo_parametrizacion = TipoParametrizacion::all();
        return view('parametrizacion.edit', compact('parametro', 'tipo_parametrizacion'));
    }
    


    public function update(Request $request, $id)
    {
        $parametrizacion = Parametrizacion::findOrFail($id);
    
        $validatedData = $request->validate([
            'tipo_parametrizacion' => 'required',
            'nombre' => 'required|max:255',
            'estado' => 'required',
        ]);
    
        $parametrizacion->tipo_parametrizacion_id = $validatedData['tipo_parametrizacion'];
        $parametrizacion->nombre = $validatedData['nombre'];
        $parametrizacion->descripcion = $request->descripcion;
        $parametrizacion->estado = $validatedData['estado'];
    
        $parametrizacion->save();
    
        return redirect()->route('parametrizacion.index')->with('status', 'El parámetro se ha actualizado correctamente.');
    }







    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        parametrizacion::destroy($id);
        return redirect()->route('parametrizacion.index');
    }
}