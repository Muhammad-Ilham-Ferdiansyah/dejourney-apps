<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('setup.menus.index', [
            'title' => 'Setup Menu',
            'menus' => Menu::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('setup.menus.create', [
            'title' => 'Create Menu',
            'menu_induk' => Menu::where('main_id','0')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'orderno' => ['required', 'numeric'],
            'main_id' => ['required'],
            'published' => ['required']
        ]);
        Menu::create([
            'name' => $request->name,
            'description' => $request->description,
            'orderno' => $request->orderno,
            'main_id' => $request->main_id,
            'link' => $request->link,
            'icon' => $request->icon,
            'published' => $request->published
        ]);

        return Redirect::route('menus.index')->with('status', 'menu-created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        return view('setup.menus.edit', [
            'title' => 'Edit Menu',
            'menu' => $menu,
            'menu_induk' => Menu::where('main_id','0')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required'],
            'orderno' => ['required', 'numeric'],
            'main_id' => ['required'],
            'published' => ['required']
        ]);

        $menu->update([
            'name' => $request->name,
            'description' => $request->description,
            'orderno' => $request->orderno,
            'main_id' => $request->main_id,
            'published' => $request->published,
            'link' => $request->link,
            'icon' => $request->icon,
            'updated_at' => now()
        ]);

        return Redirect::route('menus.index')->with('status', 'menu-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function confirmDelete($id)
    {
        $menu = Menu::findOrFail($id); // Temukan data berdasarkan ID
        return view('setup.menus.confirm-delete',[
            'title' => 'Hapus Menu',
            'menu' => $menu
        ]);
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete(); // Hapus data
    
        return redirect()->route('menus.index')->with('status', 'menu-deleted');
    }
}
