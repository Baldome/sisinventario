<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assets = Asset::with('category', 'location')->get();
        $categories = Category::all();
        $locations = Location::all();
        return view('admin.asset.index', compact('assets', 'categories', 'locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $locations = Location::all();
        return view('admin.asset.create', compact('categories', 'locations'));
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
            $asset->admission_date = $request->input('admission_date');
            $asset->model = $request->input('model');
            $asset->series = $request->input('series');
            $image = $request->file('image')->store('public/images/assets');
            $asset->image = Storage::url($image);
            $asset->description = $request->input('description');
            $asset->observations = $request->input('observations');
            $asset->category_id = $request->input('category_id');
            $asset->location_id = $request->input('location_id');

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
        return view('admin.asset.edit', compact('asset', 'categories', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asset $asset)
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
            $asset->code = $request->input('code');
            $asset->name = $request->input('name');
            $asset->state = $request->input('state');
            $asset->admission_date = $request->input('admission_date');
            $asset->model = $request->input('model');
            $asset->series = $request->input('series');
            $image = $request->file('image')->store('public/images/assets');
            $asset->image = Storage::url($image);
            $asset->description = $request->input('description');
            $asset->observations = $request->input('observations');
            $asset->category_id = $request->input('category_id');
            $asset->location_id = $request->input('location_id');

            $asset->save();

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
}
