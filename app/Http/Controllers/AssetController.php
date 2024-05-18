<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Category;
use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
            'name' => 'required|max:255',
            'state' => 'required|max:255',
            'admission_date' => 'required|date',
            'image' => 'image|max:5012',
            'category_id' => 'required',
            'location_id' => 'required',
        ]);
        try {
            $asset = new Asset();
            $asset->code = $request->input('code');
            $asset->name = $request->input('name');
            $asset->state = $request->input('state');
            $asset->category_id = $request->input('category_id');
            $asset->location_id = $request->input('location_id');
            $asset->admission_date = $request->input('admission_date');
            $asset->user_id = $request->input('user_id');
            $asset->model = $request->input('model');
            $asset->series = $request->input('series');
            $asset->description = $request->input('description');
            $asset->observations = $request->input('observations');
            // Agrega una imagen si se carga 
            if ($request->hasFile('image')) {
                $image = $request->file('image')->store('public/images/assets');
                $asset->image = Storage::url($image);
            }

            $asset->save();

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
            $asset->code = $request->input('code');
            $asset->name = $request->input('name');
            $asset->state = $request->input('state');
            $asset->category_id = $request->input('category_id');
            $asset->location_id = $request->input('location_id');
            $asset->admission_date = $request->input('admission_date');
            $asset->user_id = $request->input('user_id');
            $asset->model = $request->input('model');
            $asset->series = $request->input('series');
            $image = $request->file('image')->store('public/images/assets');
            $asset->image = Storage::url($image);
            $asset->description = $request->input('description');
            $asset->observations = $request->input('observations');
            // Agrega una imagen si se carga una nueva
            if ($request->hasFile('image')) {
                $image = $request->file('image')->store('public/images/assets');
                $asset->image = Storage::url($image);
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
        $asset->delete();

        return redirect()->route('asset.index')
            ->with('message', 'Eliminación correcta!')
            ->with('icon', 'success');
    }

    public function createAssignAssetToUser()
    {
        // return 'HOla';
        $unassignedAssets = Asset::doesntHave('user')->get();
        $users = User::all();
        return view('admin.asset.assign', compact('unassignedAssets', 'users'));
    }

    public function assignAssetToUser(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'asset_id' => 'required',
        ]);
        try {
            $asset = Asset::findOrFail($request->input('asset_id'));

            $asset->user_id = $request->input('user_id');
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
