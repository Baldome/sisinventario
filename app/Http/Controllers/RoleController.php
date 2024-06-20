<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    // public function __construct()
    // {
    //     /**  */
    //     $this->middleware('permission:Listar rol', ['only' => ['destroy']]);
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();
        return view('admin.role.index', compact('roles', 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Role $role)
    {
        $request->validate(['name' => ['required', 'string', 'unique:roles,name']]);

        try {
            Role::create(['name' => $request->name, 'guard_name' => 'web']);

            return redirect()->route('role.index')
                ->with('message', 'Registro exitoso!')
                ->with('icon', 'success');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('message', 'Ocurrió un error al registrar el rol')
                ->with('icon', 'error');
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.role.show', compact('role', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('admin.role.edit', compact('role'));
    }


    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Role $role)
    {
        $request->validate(['name' => ['required', 'string', 'unique:roles,name,' . $role->id]]);
        try {
            $role->update(['name' => $request->name]);

            return redirect()->route('role.index')
                ->with('message', 'Actualización exitosa!')
                ->with('icon', 'success');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('message', 'Ocurrió un error al actualizar el rol')
                ->with('icon', 'error');
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Verificar si $id es un valor válido antes de intentar eliminar el rol
            if (!$id) {
                return redirect()->back()
                    ->with('message', 'Rol no encontrado')
                    ->with('icon', 'error');
            }

            // Encontrar y eliminar el rol por su ID
            $role = Role::find($id);
            $role->delete();

            return redirect()->route('role.index')
                ->with('message', 'Eliminación correcta!')
                ->with('icon', 'success');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('message', 'Ocurrió un error al eliminar el rol')
                ->with('icon', 'error');
        }
    }

    public function createPermissionsToRole($id)
    {
        $permissions = Permission::get();
        $role = Role::findOrFail($id);
        $rolePermissions = DB::table('role_has_permissions')
            ->where('role_has_permissions.role_id', $role->id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('admin.role.assign-permissions-to-role', compact('role', 'permissions', 'rolePermissions'));
    }

    public function assignPermissionsToRole(Request $request, $id)
    {
        $request->validate([
            'permission' => 'required'
        ]);

        try {
            $role = Role::findOrFail($id);
            $role->syncPermissions($request->permission);

            return redirect()->route('role.index')
                ->with('message', 'Asignación correcta')
                ->with('icon', 'success');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('message', 'Ocurrió un error al asignar')
                ->with('icon', 'error');
        }
    }

    public function getPermissions(Role $role)
    {
        return response()->json([
            'permissions' => $role->permissions
        ]);
    }
}
