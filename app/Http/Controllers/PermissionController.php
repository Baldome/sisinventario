<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PermissionController extends BaseController
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->middleware('can:listar permisos')->only('index');
        $this->middleware('can:crear permiso')->only('create');
        $this->middleware('can:editar permiso')->only('edit');
        $this->middleware('can:eliminar permiso')->only('destroy');
        $this->middleware('can:visualizar permiso')->only('show');
    }

    public function index()
    {
        $permissions = Permission::get();
        return view('admin.permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name' => ['required', 'string', 'unique:permissions,name']]);
        try {
            Permission::create(['name' => $request->input('name'), 'guard_name' => 'web']);

            return redirect()->route('permission.index')
                ->with('message', 'Registro exitoso!')
                ->with('icon', 'success');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('message', 'Ocurrió un error al registrar el permiso')
                ->with('icon', 'error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        return view('admin.permission.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view('admin.permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $request->validate(['name' => ['required', 'string', 'unique:permissions,name,' . $permission->id]]);
        try {
            $permission->update(['name' => $request->input('name')]);

            return redirect()->route('permission.index')
                ->with('message', 'Actualización correcta!')
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
                    ->with('message', 'Permiso no encontrado')
                    ->with('icon', 'error');
            }
            // Encontrar y eliminar el rol por su ID
            $permission = Permission::find($id);
            $permission->delete();

            return redirect()->route('permission.index')
                ->with('message', 'Eliminación correcta!')
                ->with('icon', 'success');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('message', 'Ocurrió un error al eliminar el rol')
                ->with('icon', 'error');
        }
    }
}
