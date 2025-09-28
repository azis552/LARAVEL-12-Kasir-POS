<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Role;
use App\Models\RoleMenu;
use Illuminate\Http\Request;

class RoleMenusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role_menus = RoleMenu::paginate(10);
        return view('role_menu.index', compact('role_menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        $menus = Menu::all();
        return view('role_menu.create', compact('roles', 'menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'role_id' => 'required|exists:roles,id',
            'menu_id' => 'required|exists:menus,id',
            'can_view' => 'sometimes|boolean',
            'can_create' => 'sometimes|boolean',
            'can_update' => 'sometimes|boolean',
            'can_delete' => 'sometimes|boolean',
        ]);

        RoleMenu::create($validate);
        return redirect()->route('role_menus.index')->with('success', 'Role Menu created successfully');
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
        $role_menu = RoleMenu::find($id);
        $roles = Role::all();
        $menus = Menu::all();
        return view('role_menu.edit', compact('role_menu', 'roles', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'role_id' => 'required|exists:roles,id',
            'menu_id' => 'required|exists:menus,id',
            'can_view' => 'sometimes|boolean',
            'can_create' => 'sometimes|boolean',
            'can_update' => 'sometimes|boolean',
            'can_delete' => 'sometimes|boolean',
        ]);

        $role_menu = RoleMenu::find($id);
        $role_menu->update($validate);
        return redirect()->route('role_menus.index')->with('success', 'Role Menu updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role_menu = RoleMenu::find($id);
        if ($role_menu) {
            $role_menu->delete();
            return redirect()->route('role_menus.index')->with('success', 'Role Menu deleted successfully');
        }
        return redirect()->route('role_menus.index')->with('error', 'Role Menu not found');
    }
}
