<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserResquest;
use App\Http\Requests\User\UpdateUserResquest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user_view')->only('index', 'show');
        $this->middleware('permission:user_create')->only('create', 'store');
        $this->middleware('permission:user_edit')->only('edit', 'update');
        $this->middleware('permission:user_destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::when(Auth::user()->hasRole('Admin'), function ($query) {
            $query->where('id', Auth::id());
        })->paginate(10);

        return view('users.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUserResquest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserResquest $request)
    {
        $data = $request->validated();
        $user = User::create($data);

        $user->assignRole($data['role_id']);

        return redirect()->route('users.index')
            ->with(['status' => 'Usuário cadastrado com sucesso!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        $this->authorize('view', $user);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $user = User::findOrFail($id);

        $this->authorize('update', $user);

        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateUserResquest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserResquest $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->validated();

        $this->authorize('update', $user);

        $user->update($data);
        $user->syncRoles($data['role_id']);

        return redirect()->route('users.index')
            ->with(['status' => 'Usuário atualizado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('delete', $user);

        $user->removeRole(Role::all());
        $user->delete();

        return redirect()->route('users.index')
            ->with(['status' => 'Usuário deletado com sucesso!']);
    }
}
