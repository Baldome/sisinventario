<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $locations = Location::all();
        return view('admin.location.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.location.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|max:255|unique:locations,name',
        ]);

        $location = new Location();
        $location->name = $request->input('name');
        $location->description = $request->input('description');

        $location->save();

        return redirect()->route('location.index')
            ->with('message', 'Registro exitoso!')
            ->with('icon', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        //
        //return $location->id;
        return view('admin.location.show', compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        //
        //return $location;
        // $location = Location::findOrFail($location);
        return view('admin.location.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        //
        $request->validate([
            'name' => 'required|max:255|unique:locations,name,' . $location->id,
        ]);

        $location->name = $request->input('name');
        $location->description = $request->input('description');

        $location->update();

        return redirect()->route('location.index')
            ->with('message', 'Actualización correcta!')
            ->with('icon', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        //
        // return $location->id;
        $location->delete();

        return redirect()->route('location.index')
            ->with('message', 'Eliminación correcta!')
            ->with('icon', 'success');
    }
}
