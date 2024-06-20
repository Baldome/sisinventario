<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::all();
        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function edit(Setting $setting)
    {
        return view('admin.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'name' => 'required|max:255',
            'logo' => 'required|max:5012',
            'address' => 'required',
            'phone_number' => 'required|numeric',
            'email' => 'required',
            'website' => 'required',
            'founding_date' => 'required',
            'state' => 'required',
        ]);
        try {
            $setting->name = $request->name;
            $setting->address = $request->address;
            $setting->phone_number = $request->phone_number;
            $setting->cell_phone = $request->cell_phone;
            $setting->email = $request->email;
            $setting->website = $request->website;
            $setting->founding_date = $request->founding_date;
            $setting->state = $request->state;
            // Agrega una imagen si se carga una nueva
            if ($request->hasFile('logo')) {
                $image = $request->file('logo')->store('public/images/settings');
                $setting->logo = Storage::url($image);
            } else {
                $request->old_logo;
            }

            $setting->update();

            return redirect()->route('settings.index')
                ->with('message', 'Actualización correcta!')
                ->with('icon', 'success');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('message', 'Ocurrió un error al actualizar los datos de la institución')
                ->with('icon', 'error');
        }
    }
}
