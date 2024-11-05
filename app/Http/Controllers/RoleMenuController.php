<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Role;
use App\Models\RoleMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RoleMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('setup.role_menus.index', [
            'title' => 'Setup Role Menu',
            'roles' => Role::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RoleMenu $roleMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(RoleMenu $roleMenu)
    // {
    //     //
    // }
    public function edit($id) {
        $role = Role::with('menus')->findOrFail($id);
        $menus = Menu::with('children')->where('main_id', 0)->get();
        $selectedMenus = RoleMenu::where('role_id', $id)->pluck('menu_id')->toArray();
    
        return view('setup.role_menus.edit', [
            'title' => 'Edit Role Menu',
            'role' => $role,
            'menus' => $menus,
            'selectedMenus' => $selectedMenus
        ]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        // Sinkronisasi menu dengan menghapus data lama dan menambahkan data baru
        RoleMenu::where('role_id', $role->id)->delete();
    
        $menus = $request->input('menus', []);
        foreach ($menus as $menuId) {
            RoleMenu::create([
                'role_id' => $role->id,
                'menu_id' => $menuId
            ]);
        }

        return Redirect::route('role_menus.index')->with('status', 'role_menu-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoleMenu $roleMenu)
    {
        //
    }
}
