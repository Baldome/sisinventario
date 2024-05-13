@extends('adminlte::page')

@section('title', 'SIS-Inventario | Editar usuario')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4>Editar usuario</h4>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.update', $user) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="code">Código</label>
                                            <input class="form-control" name="code" type="number" min=1
                                                value="{{ $user->code }}" required>
                                            @error('code')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="ci">Cédula de identidad</label>
                                                    <input type="number" name="ci" min=1 class="form-control"
                                                        value="{{ $user->ci }}" readonly required>
                                                    @error('ci')
                                                        <small style="color: red">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="ci_dep"></i>Depto</label>
                                                    <select name="ci_dep" class="form-control" @readonly(true) required>
                                                        <option value="{{ $user->ci_dep }}">{{ $user->ci_dep }}</option>
                                                    </select>
                                                    @error('ci_dep')
                                                        <small style="color: red">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="name">Nombre</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $user->name }}" required>
                                            @error('name')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="last_name">Apellidos</label>
                                            <input type="text" name="last_name" class="form-control"
                                                value="{{ $user->last_name }}" required>
                                            @error('last_name')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="state">Seleccione estado</label>
                                            <select name="state" class="form-control" required>
                                                <option value="{{ $user->state }}">{{ $user->state }}</option>
                                                <option value="Activo">Activo</option>
                                                <option value="Inactivo">Inactivo</option>
                                            </select>
                                            @error('last_name')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control"
                                                value="{{ $user->email }}" readonly required>
                                            @error('email')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="password">Contraseña</label>
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Ingrese su nueva contraseña" autocomplete="new-password">
                                            @error('password')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="password_confirmation">Confirmar contraseña</label>
                                            <input type="password" name="password_confirmation" class="form-control"
                                                placeholder="Repita la contraseña" autocomplete="new-password">
                                            @error('password_confirmation')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="birth_date">Fecha de nacimiento</label>
                                            <input type="date" name="birth_date"
                                                placeholder="Ingrese su fecha de nacimiento" class="form-control"
                                                value="{{ $user->birth_date }}" required>
                                            @error('birth_date')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="gender">Seleccione su género</label>
                                            <select name="gender" class="form-control" required>
                                                <option value="{{ $user->gender }}">{{ $user->gender }}</option>
                                                <option value="Hombre">Hombre</option>
                                                <option value="Mujer">Mujer</option>
                                            </select>
                                            @error('gender')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="phone">Teléfono celular</label>
                                            <input type="number" name="phone" class="form-control" min=10
                                                label-class="text-primary" placeholder="Ingrese su número de celular"
                                                value="{{ $user->phone }}">
                                            @error('phone')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="photo">Seleccione su foto</label>
                                            <input type="hidden" name="old_photo"
                                                value="{{ $user->profile_photo_path }}">
                                            <input type="file" name="photo" class="form-control"
                                                value="{{ $user->profile_photo_path }}" accept="image/*">
                                            @error('photo')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label for="roles">Asignar rol</label>
                                                <select name="roles[]" class="form-control" id="roles" multiple>
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role }}"
                                                            {{ in_array($role, $user_role) ? 'selected' : '' }}>
                                                            {{ $role }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <img src="{{ asset($user->profile_photo_path) }}" alt="Foto de perfil"
                                                    width="150">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <div class="btn-group pull-right me-2">
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            <i class="zmdi zmdi-save mr-2"></i><span class="hidden-xs">Actualizar</span>
                                        </button>
                                    </div>
                                    <div class="btn-group pull-right me-2">
                                        <a href="{{ route('user.index', []) }}" class="btn btn-sm btn-secondary">
                                            <i class="zmdi zmdi-undo mr-2"></i><span class="hidden-xs">Cancelar</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
@stop
