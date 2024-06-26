<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Loan;
use App\Models\Location;
use App\Models\Tool;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class ToolController extends BaseController
{

    use AuthorizesRequests;

    public function __construct()
    {
        $this->middleware('can:listar herramientas')->only('index');
        $this->middleware('can:crear herramienta')->only('create');
        $this->middleware('can:editar herramienta')->only('edit');
        $this->middleware('can:eliminar herramienta')->only('destroy');
        $this->middleware('can:visualizar herramienta')->only('show');
        $this->middleware('can:asignar herramienta')->only('createAssignToolToUser');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = Unit::all();
        $categories = Category::all();
        $locations = Location::all();
        $users = User::all();
        $user = Auth::user();

        if ($user->hasRole('Administrador')) {
            $tools = Tool::with(['unit', 'category', 'location', 'user', 'loans'])->get();
        } else {
            $tools = Tool::with(['unit', 'category', 'location', 'user', 'loans'])->where('user_id', $user->id)->get();
        }

        return view('admin.tools.index', compact('tools', 'units', 'categories', 'locations', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $locations = Location::all();
        $users = User::all();
        $units = Unit::all();
        return view('admin.tools.create', compact('categories', 'locations', 'users', 'units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'code' => 'required|numeric|unique:tools,code|min:15',
            'name' => 'required|max:255',
            'state' => 'required',
            'image' => 'image|max:5012',
            'unit_id' => 'required',
            'category_id' => 'required',
            'location_id' => 'required',
            'admission_date' => 'required|date',
            'amount' => 'required',
        ]);
        try {
            $tool = new Tool();
            $tool->code = $request->code;
            $tool->name = $request->name;
            $tool->state = $request->state;
            if ($request->filled('user_id')) {
                $tool->user_id = $request->user_id;
            }
            $tool->unit_id = $request->unit_id;
            $tool->category_id = $request->category_id;
            $tool->location_id = $request->location_id;
            $tool->amount = $request->amount;
            $tool->admission_date = $request->admission_date;
            $tool->description = $request->description;
            $tool->observations = $request->observations;
            if ($request->hasFile('image')) {
                $name = $tool->id . '.' . $request->file('image')->getClientOriginalExtension();
                $image = $request->file('image')->storeAs('public/images/tools', $name);
                $tool->image = Storage::url($image);
                $tool->save();
            }

            $tool->save();

            return redirect()->route('tools.index')
                ->with('message', 'Registro exitoso!')
                ->with('icon', 'success');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('message', 'Ocurrió un error al registrar la herramienta')
                ->with('icon', 'error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Tool $tool)
    {
        return view('admin.tools.show', compact('tool'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tool $tool)
    {
        $categories = Category::all();
        $locations = Location::all();
        $users = User::all();
        $units = Unit::all();
        return view('admin.tools.edit', compact('tool', 'categories', 'locations', 'users', 'units'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tool $tool)
    {
        $request->validate([
            'code' => 'required|numeric|min:15|unique:tools,code,' . $tool->id,
            'name' => 'required|max:255',
            'state' => 'required',
            'image' => 'image|max:5012',
            'user_id' => 'required',
            'unit_id' => 'required',
            'category_id' => 'required',
            'location_id' => 'required',
            'amount' => 'required|numeric',
        ]);
        try {
            $tool->code = $request->code;
            $tool->name = $request->name;
            $tool->state = $request->state;
            if ($request->filled('user_id')) {
                $tool->user_id = $request->user_id;
            } else {
                $tool->user_id = null;
            }
            $tool->unit_id = $request->unit_id;
            $tool->category_id = $request->category_id;
            $tool->location_id = $request->location_id;
            $tool->amount = $request->amount;
            $tool->description = $request->description;
            $tool->observations = $request->observations;
            if ($request->hasFile('image')) {
                if ($tool->image) {
                    Storage::disk('public')->delete($tool->image);
                }
                $name = $tool->id . '.' . $request->file('image')->getClientOriginalExtension();
                $image = $request->file('image')->store('public/images/tools', $name);
                $tool->image = Storage::url($image);
                $tool->save();
            } else {
                $request->old_image;
            }

            $tool->update();

            return redirect()->route('tools.index')
                ->with('message', 'Herramienta actualizada correctamente.!')
                ->with('icon', 'success');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('message', 'Ocurrió un error al actualizar la herramienta')
                ->with('icon', 'error');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tool $tool)
    {
        try {
            if ($tool->image) {
                Storage::disk('public')->delete($tool->image);
            }
            $tool->delete();

            return redirect()->route('tools.index')
                ->with('message', 'Herramienta eliminada correctamente.!')
                ->with('icon', 'success');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('message', 'Ocurrió un error al aliminar la herramienta')
                ->with('icon', 'error');
        }
    }

    public function createAssignToolToUser($id)
    {
        // return 'HOla';
        $tool = Tool::with('category', 'location', 'unit')->findOrFail($id);
        $users = User::all();
        return view('admin.tools.assign-tool-to-user', compact('tool', 'users'));
    }

    public function assignToolToUser(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
        ]);
        try {
            $tool = Tool::findOrFail($id);

            $tool->user_id = $request->user_id;
            $tool->update();

            return redirect()->route('tools.index')
                ->with('message', 'Asignación correcta!')
                ->with('icon', 'success');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('message', 'Ocurrió un error al asignar el activo')
                ->with('icon', 'error');
        }
    }
}
