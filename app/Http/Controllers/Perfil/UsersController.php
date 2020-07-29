<?php

namespace App\Http\Controllers\Perfil;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Gate;
use Illuminate\Http\Request;
use Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    protected $user;
    protected $request;
    public function __construct(){
        
        $this->middleware('auth');
        $user = new User;
        $this->user = $user;
        $request = new Request;
        $this->request = $request;

    }
    public function index()
    {
     //   Product::orderBy('created_at','desc')->get();
        $users= User::orderBy('created_at','desc')->get();
        return view('admin.users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (Gate::denies('admin')) {
            return redirect()->route('admin.users.index');
        }
        $roles= Role::all();
        return view('admin.users.editar',
        [
            'user' => $user,
            'roles' => $roles,
            ]);
        }
        
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {   
        $user->roles()->sync($request->roles);
        $request->session()->flash('alert-success', 'O perfil foi atualizaco com sucesso!');
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Request $request)
    {
        //Implementar a exclusão logica depois
        if (Gate::denies('admin')) {
            return redirect()->route('admin.users.index');
        }
        $resutUser = $this->user::find($request['idPac']);
        $resutUser->roles()->detach();
        return redirect()->route('admin.users.index');
    }
}
