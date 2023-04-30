<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

//agregamos

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RolController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-roles | crear-roles | editar-roles | borrar-roles',['only'=>['index']]);
        $this->middleware('permission:crear-roles', ['only'=>['create','store']]);
        $this->middleware('permission:editar-roles', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-roles', ['only'=>['edit','detroy']]);
    }
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate(5);
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permission = Permission::get();
        return view ('roles.crear', compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, ['name' => 'required', 'permission'=>'required']);
        $role = Role::create(['name'=> $request->input('name')]);
        $role ->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index');
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
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table('role_has_permissions')->where('role_has_permissions.role_id', $id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
            return view('roles.editar', compact('role', 'permission', 'rolePermissions'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $this->validate($request, ['name' => 'required', 'permission'=>'required']);
       
        $role = Role::find($id);
        $role->name =$request->input('name');
        $role->save();

        $role ->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index');




    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        DB::table('roles')->where('id',$id)->delete();
        return redirect()->route('roles.index');
    }
}
