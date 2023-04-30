<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Arr; 

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $user = User::paginate(10);
       return view('user.index', compact('user'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $roles = Role::pluck('name', 'name')->all();
       return view('user.crear', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required',
            'avatar' => 'image|max:2048' 


        ]);

        $input = $request->all();
        $input['password']= Hash::make($input['password']);

        // return request()->file('avatar');
        if (request()->has('avatar')) {
            $avatar = request()->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/images/');
            $avatar->move($avatarPath, $avatarName);
        }
    

        $user = User::create($input);
        $user->assignRole($request->input('roles'));



        return redirect()->route('user.index');






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
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('user.editar', compact('user', 'roles', 'userRole'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required',


        ]);

        $input = $request->all();

        if (!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);


        }else{
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('user.index');






    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return redirect()->route('user.index');
    }
}
