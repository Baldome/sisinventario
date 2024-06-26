<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UnitController extends BaseController
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->middleware('can:listar unidades')->only('index');
        $this->middleware('can:crear unidad')->only('create');
        $this->middleware('can:editar unidad')->only('edit');
        $this->middleware('can:eliminar unidad')->only('destroy');
        $this->middleware('can:visualizar unidad')->only('show');
    }


    public function index()
    {
        $units = Unit::all();
        return view('admin.units.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.units.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'max:255',
                'unique:units,name',
            ]
        ]);

        try {
            $data = [
                'name' => $request->name,
                'description' => $request->description,
            ];

            Unit::create($data);

            return redirect()->route('units.index')
                ->with('message', 'Registro exitoso!')
                ->with('icon', 'success');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('message', 'Ocurrió un error al crear la unidad')
                ->with('icon', 'error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {
        return view('admin.units.show', compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
        return view('admin.units.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unit $unit)
    {
        $request->validate([
            'name' => [
                'required',
                'max:255',
                'unique:units,name,' . $unit->id,
            ]
        ]);

        try {
            $data = [
                'name' => $request->name,
                'description' => $request->description,
            ];

            $unit->update($data);

            return redirect()->route('units.index')
                ->with('message', 'Actualización correcta!')
                ->with('icon', 'success');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('message', 'Ocurrió un error al actualizar la unidad')
                ->with('icon', 'error');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        try {
            $unit->delete();

            return redirect()->route('units.index')
                ->with('message', 'Eliminación correcta!')
                ->with('icon', 'success');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('message', 'Ocurrió un error al aliminar la unidad')
                ->with('icon', 'error');
        }
    }
}
