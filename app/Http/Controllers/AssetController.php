<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Category;
use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AssetController extends BaseController
{
    /**
     * Display a listing of the resource.
     */

    use AuthorizesRequests;

    public function __construct()
    {
        $this->middleware('can:listar activos')->only('index');
        $this->middleware('can:crear activo')->only('create');
        $this->middleware('can:editar activo')->only('edit');
        $this->middleware('can:eliminar activo')->only('destroy');
        $this->middleware('can:visualizar activo')->only('show');
        $this->middleware('can:asignar activo')->only('createAssignAssetToUser');
    }

    public function index()
    {
        $categories = Category::all();
        $locations = Location::all();
        $users = User::all();
        $user = Auth::user();

        if ($user->hasRole('Administrador')) {
            // Si el usuario es administrador, obtiene todos los activos
            $assets = Asset::with('category', 'location', 'user')->get();
        } else {
            // Si el usuario no es administrador, obtiene solo sus propios activos
            $assets = Asset::with('category', 'location', 'user')->where('user_id', $user->id)->get();
        }

        return view('admin.asset.index', compact('assets', 'categories', 'locations', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $locations = Location::all();
        $users = User::all();
        return view('admin.asset.create', compact('categories', 'locations', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|numeric|unique:assets,code|min:15',
            'name' => 'required',
            'state' => 'required|max:255',
            'admission_date' => 'required|date',
            'image' => 'image|max:5012',
            'category_id' => 'required',
            'location_id' => 'required',
        ]);
        try {
            $asset = new Asset();
            $asset->code = $request->code;
            $asset->name = $request->name;
            $asset->state = $request->state;
            $asset->category_id = $request->category_id;
            $asset->location_id = $request->location_id;
            $asset->admission_date = $request->admission_date;
            if ($request->filled('user_id')) {
                $asset->user_id = $request->user_id;
            } else {
                $asset->user_id = null;
            }
            $asset->model = $request->model;
            $asset->series = $request->series;
            $asset->description = $request->description;
            $asset->observations = $request->observations;
            $asset->save();
            // Agrega una imagen si se carga 
            if ($request->hasFile('image')) {
                $name = $asset->id . '.' . $request->file('image')->getClientOriginalExtension();
                $image = $request->file('image')->storeAs('public/images/assets', $name);
                $asset->image = Storage::url($image);
                $asset->save();
            }
            return redirect()->route('asset.index')
                ->with('message', 'Registro exitoso!')
                ->with('icon', 'success');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('message', 'Ocurrió un error al registrar el activo')
                ->with('icon', 'error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Asset $asset)
    {
        return view('admin.asset.show', compact('asset'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asset $asset)
    {
        $categories = Category::all();
        $locations = Location::all();
        $users = User::all();
        return view('admin.asset.edit', compact('asset', 'categories', 'locations', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asset $asset)
    {
        $request->validate([
            'code' => 'required|numeric|min:15|unique:assets,code,' . $asset->id,
            'name' => 'required|max:255',
            'state' => 'required|max:255',
            'admission_date' => 'required|date',
            'image' => 'image|max:5012',
            'category_id' => 'required',
            'location_id' => 'required',
        ]);
        try {
            $asset->code = $request->code;
            $asset->name = $request->name;
            $asset->state = $request->state;
            $asset->category_id = $request->category_id;
            $asset->location_id = $request->location_id;
            $asset->admission_date = $request->admission_date;
            if ($request->filled('user_id')) {
                $asset->user_id = $request->user_id;
            } else {
                $asset->user_id = null;
            }
            $asset->model = $request->model;
            $asset->series = $request->series;
            $asset->description = $request->description;
            $asset->observations = $request->observations;
            // Agrega una imagen si se carga una nueva
            if ($request->hasFile('image')) {
                if ($asset->image) {
                    Storage::disk('public')->delete($asset->image);
                }
                $name = $asset->id . '.' . $request->file('image')->getClientOriginalExtension();
                $image = $request->file('image')->storeAs('public/images/assets', $name);
                $asset->image = Storage::url($image);
                $asset->save();
            } else {
                $request->old_image;
            }

            $asset->update();

            return redirect()->route('asset.index')
                ->with('message', 'Actualización correcta!')
                ->with('icon', 'success');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('message', 'Ocurrió un error al actualizar el activo')
                ->with('icon', 'error');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asset $asset)
    {
        if ($asset->image) {
            Storage::disk('public')->delete($asset->image);
        }
        $asset->delete();

        return redirect()->route('asset.index')
            ->with('message', 'Eliminación correcta!')
            ->with('icon', 'success');
    }

    public function createAssignAssetToUser($id)
    {
        // return 'HOla';
        $asset = Asset::with('category', 'location')->findOrFail($id);
        $users = User::all();
        return view('admin.asset.assign-asset-to-user', compact('asset', 'users'));
    }

    public function assignAssetToUser(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
        ]);
        try {
            $asset = Asset::findOrFail($id);

            $asset->user_id = $request->user_id;
            $asset->update();

            return redirect()->route('asset.index')
                ->with('message', 'Asignación correcta!')
                ->with('icon', 'success');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('message', 'Ocurrió un error al asignar el activo')
                ->with('icon', 'error');
        }
    }
}
