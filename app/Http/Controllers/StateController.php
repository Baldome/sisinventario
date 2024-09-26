<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StateController extends BaseController
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->middleware('can:listar estados')->only('index');
        $this->middleware('can:crear estado')->only('create');
        $this->middleware('can:editar estado')->only('edit');
        $this->middleware('can:eliminar estado')->only('destroy');
        $this->middleware('can:visualizar estado')->only('show');
    }

    public function index()
    {
        $states = State::all();
        return view('admin.states.index', compact('states'));
    }

    public function create()
    {
        return view('admin.states.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:states,name',
            'description' => 'nullable|string',
        ]);

        try {
            State::create($request->all());
            return redirect()->route('states.index')
                ->with('message', 'El estado ha sido creado exitosamente.')
                ->with('icon', 'success');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('message', 'Hubo un error al crear el estado.')
                ->with('icon', 'error');
        }
    }

    public function show(State $state)
    {
        return view('admin.states.show', compact('state'));
    }

    public function edit(State $state)
    {
        return view('admin.states.edit', compact('state'));
    }

    public function update(Request $request, State $state)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:states,name,' . $state->id],
            'description' => 'nullable|string'
        ]);

        try {
            $state->update($request->all());
            return redirect()->route('states.index')
                ->with('message', 'El estado ha sido actualizado exitosamente.')
                ->with('icon', 'success');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('message', 'Hubo un error al actualizar el estado.')
                ->with('icon', 'error');
        }
    }

    public function destroy(State $state)
    {
        try {
            $state->delete();
            return redirect()->route('states.index')
                ->with('message', 'El estado ha sido eliminado exitosamente.')
                ->with('icon', 'success');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('message', 'Hubo un error al eliminar el estado.')
                ->with('icon', 'error');
        }
    }
}
