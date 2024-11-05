<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('setup.roles.index', [
            'title' => 'Setup Roles',
            'roles' => Role::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('setup.roles.create', [
            'title' => 'Create Role',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required']
        ]);
        Role::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        // return redirect('/roles')->with('session', 'Role has been created.');
        return Redirect::route('roles.index')->with('status', 'role-created');
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
    public function edit(Role $role)
    {
        // dd($id);
        return view('setup.roles.edit', [
            'title' => 'Edit Role',
            'role' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required']
        ]);

        $role->update([
            'name' => $request->name,
            'description' => $request->description,
            'updated_at' => now()
        ]);

        return Redirect::route('roles.index')->with('status', 'role-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function confirmDelete($id)
    {
        $role = Role::findOrFail($id); // Temukan data berdasarkan ID
        return view('setup.roles.confirm-delete',[
            'title' => 'Hapus Role',
            'role' => $role
        ]);
    }
    
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete(); // Hapus data
    
        return redirect()->route('roles.index')->with('status', 'role-deleted');
    }
}
