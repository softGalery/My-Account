<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Rolecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::with('Permissions')->latest()->get();
//        return $roles;
        return view('backend.pages.role', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::get();
//        return $permissions;
        return view('backend.pages.role-create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $permissionId = array_map('intval', $request->input('permission'));
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($permissionId);
        flash()->success('Role Created Successfully!');
        return redirect()->route('user.role');

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
    public function edit(string $id)
    {
        $permissions = Permission::all();
        $role = Role::with('permissions')->findOrFail($id);

        $rolePermissions = $role->permissions->pluck('id')->all();
        return view('backend.pages.role-edit', compact('role', 'permissions', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,'.$id,
            'permission' => 'required',
        ]);
        $role = Role::findOrFail($id);
        $role->name = $request->input('name');
        $role->save();
        $permissionId = array_map('intval', $request->input('permission'));
         $role->syncPermissions($permissionId);
         flash()->success('Role Updated Successfully!');
         return redirect()->route('user.role');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Role::find($id)->delete();
        flash()->success('Role Delete Successfully!');
        return redirect()->back();
    }
}
