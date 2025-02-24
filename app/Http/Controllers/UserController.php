<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class UserController extends BaseController
{

    use AuthorizesRequests;

    public function __construct()
    {
        $this->middleware('can:listar usuarios')->only('index');
        $this->middleware('can:crear usuario')->only('create');
        $this->middleware('can:editar usuario')->only('edit');
        $this->middleware('can:eliminar usuario')->only('destroy');
        $this->middleware('can:visualizar usuario')->only('show');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        $roles = Role::get();
        return view('admin.user.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'ci' => 'required|numeric|unique:users,ci',
            'ci_dep' => 'required|string',
            'last_name' => 'required|string|max:255',
            'is_active' => 'required',
            'birth_date' => 'required|date',
            'gender' => 'required|string|in:Hombre,Mujer',
            'photo' => 'image|max:1024',
        ]);

        try {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'ci' => $request->ci,
                'ci_dep' => $request->ci_dep,
                'last_name' => $request->last_name,
                'is_active' => $request->is_active,
                'birth_date' => $request->birth_date,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'address' => $request->address,
            ];
            // Añadir el rol si está presente en la solicitud
            if ($request->filled('role_id')) {
                $data['rol_id'] = $request->role_id;
            }

            // Crear el usuario
            $user = User::create($data);

            // Agrega una imagen si se carga 
            if ($request->hasFile('photo')) {
                $name = $user->id . '.' . $request->file('photo')->getClientOriginalExtension();
                $image = $request->file('photo')->storeAs('public/images/users', $name);
                $user->profile_photo_path = Storage::url($image);
                $user->save();
            }

            // Asignar el rol al usuario
            if ($request->filled('role_id')) {
                $user->assignRole(Role::find($request->role_id)->name);
            }

            return redirect()->route('user.index')
                ->with('message', 'Registro exitoso!')
                ->with('icon', 'success');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('message', 'Ocurrió un error al registrar al usuario')
                ->with('icon', 'error');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $roles = Role::get();
        return view('admin.user.show', compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $user = User::findOrFail($user->id);
        $roles = Role::all();
        return view('admin.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'confirmed'], // Cambiado a nullable para permitir actualizar sin cambiar contraseña
            'ci' => ['required', 'numeric', 'unique:users,ci,' . $user->id],
            'ci_dep' => ['required', 'string'],
            'last_name' => ['required', 'string', 'max:255'],
            'is_active' => ['required'],
            'birth_date' => ['required', 'date'],
            'gender' => ['required', 'string', 'in:Hombre,Mujer'],
            'photo' => ['nullable', 'image', 'max:512'], // Cambiado a nullable para permitir no cambiar la foto
        ]);

        try {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'ci' => $request->ci,
                'ci_dep' => $request->ci_dep,
                'last_name' => $request->last_name,
                'is_active' => $request->is_active,
                'birth_date' => $request->birth_date,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'address' => $request->address,
            ];

            // Actualizar contraseña solo si se proporciona una nueva contraseña
            if (!empty($request->password)) {
                $data['password'] = Hash::make($request->password);
            }

            // Actualizar foto de perfil si se carga una nueva
            if ($request->hasFile('photo')) {
                if ($user->profile_photo_path) {
                    Storage::disk('public')->delete($user->profile_photo_path);
                }
                $name = $user->id . '.' . $request->file('photo')->getClientOriginalExtension();
                $image = $request->file('photo')->storeAs('public/images/users', $name);
                $data['profile_photo_path'] = Storage::url($image);
            } elseif ($request->filled('old_photo')) {
                $data['profile_photo_path'] = $request->old_photo;
            }
            if ($request->filled('role_id')) {
                $data['rol_id'] = $request->role_id;
            }

            $user->update($data);
            $user->assignRole(Role::find($request->role_id)->name);

            return redirect()->route('user.index')
                ->with('message', 'Actualización correcta!')
                ->with('icon', 'success');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('message', 'Ocurrió un error al actualizar al usuario')
                ->with('icon', 'error');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            if ($user->profile_photo_path) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }
            $user->delete();

            return redirect()->route('user.index')
                ->with('message', 'Eliminación correcta!')
                ->with('icon', 'success');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('message', 'Ocurrió un error al aliminar usuario')
                ->with('icon', 'error');
        }
    }
}
