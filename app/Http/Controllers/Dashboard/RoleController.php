<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('roles.view-any');

        $roles = Role::orderBy('id', 'desc')->paginate(5);

        return view('dashboard.settings.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('roles.create');

        return view('dashboard.settings.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        Gate::authorize('roles.create');

        $status = Role::create([
            'name' => $request->post('name'),
            'permissions' => $request->post('permissions'),
        ]);

        if ($status) {
            return redirect()->route('roles.index')->with('success', 'the role created successfuly');
        } else {
            return redirect()->route('roles.index')->with('errors', 'something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        Gate::authorize('roles.update');

        return view('dashboard.settings.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        Gate::authorize('roles.update');

        $request->validate([
            'name' => 'required|string|unique:roles,name,' . $role->id,
            'permissions' => 'required|array',
        ]);

        $status = $role->update([
            'name' => $request->post('name'),
            'permissions' => $request->post('permissions'),
        ]);

        if ($status) {
            return redirect()->route('roles.index')->with('success', 'the role update successfuly');
        } else {
            return redirect()->route('roles.index')->with('errors', 'something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        Gate::authorize('roles.delete');

        $status = $role->delete();

        if ($status) {
            return redirect()->route('roles.index')->with('success', 'the role deleted successfuly');
        } else {
            return redirect()->route('roles.index')->with('errors', 'something went wrong');
        }
    }
}
