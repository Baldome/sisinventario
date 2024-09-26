@extends('adminlte::page')

@section('title', 'SIS-Inventario | Editar usuario')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h4><b>EDITAR USUARIO</b></h4>
        </div>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-outline card-primary shadow col-md-12">
                <div class="card-header">
                    <span class="title text-lg">Editar datos del usuario:
                        <b>{{ $user->name . ' ' . $user->last_name }}</b></span>
                </div>
                <form action="{{ route('user.update', $user) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="role_id">ROL</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-text"><i class="fa-brands fa-jxl"></i></span>
                                        <select name="role_id" class="form-control" id="role_id">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}"
                                                    {{ $role->id === $user->roles->first()->id ? 'selected' : '' }}>
                                                    {{ $role->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label for="ci">C.I.</label>
                                            <div class="form-group input-group">
                                                <span class="input-group-text"><i
                                                        class="fa-solid fa-address-card"></i></span>
                                                <input type="number" name="ci" min=1 class="form-control"
                                                    value="{{ $user->ci }}" readonly required>
                                                @error('ci')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="ci_dep">EXPEDIDO</label>
                                            <div class="form-group input-group">
                                                <span class="input-group-text"><i
                                                        class="fa-solid fa-address-card"></i></span>
                                                <select name="ci_dep" class="form-control" @readonly(true) required>
                                                    <option value="LP" {{ $user->ci_dep === 'LP' ? 'selected' : '' }}>LP
                                                    </option>
                                                    <option value="SC" {{ $user->ci_dep === 'SC' ? 'selected' : '' }}>SC
                                                    </option>
                                                    <option value="CB" {{ $user->ci_dep === 'CB' ? 'selected' : '' }}>CB
                                                    </option>
                                                    <option value="OR" {{ $user->ci_dep === 'OR' ? 'selected' : '' }}>
                                                        OR</option>
                                                    <option value="PT" {{ $user->ci_dep === 'PT' ? 'selected' : '' }}>
                                                        PT</option>
                                                    <option value="TJ" {{ $user->ci_dep === 'TJ' ? 'selected' : '' }}>
                                                        TJ</option>
                                                    <option value="BN" {{ $user->ci_dep === 'BN' ? 'selected' : '' }}>
                                                        BN</option>
                                                    <option value="PA" {{ $user->ci_dep === 'PA' ? 'selected' : '' }}>
                                                        PA</option>
                                                    <option value="CH" {{ $user->ci_dep === 'CH' ? 'selected' : '' }}>
                                                        CH</option>
                                                </select>
                                                @error('ci_dep')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="name">NOMBRE</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-user-pen"></i></span>
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
                                    <label for="last_name">APELLIDO</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-user-pen"></i></span>
                                        <input type="text" name="last_name" class="form-control"
                                            value="{{ $user->last_name }}" required>
                                        @error('last_name')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="is_active">ESTADO</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-user-check"></i></span>
                                        <select name="is_active" class="form-control" required>
                                            <option value="1" {{ $user->is_active === 1 ? 'selected' : '' }}>Activo
                                            </option>
                                            <option value="0" {{ $user->is_active === 0 ? 'selected' : '' }}>Inactivo
                                            </option>
                                        </select>
                                        @error('last_name')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="email">CORREO</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
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
                                    <label for="password">CONTRESEÑA</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Ingrese su nueva contraseña opcional"
                                            autocomplete="new-password">
                                        @error('password')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="password_confirmation">CONFIRMAR</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                        <input type="password" name="password_confirmation" class="form-control"
                                            placeholder="Repita la contraseña" autocomplete="new-password">
                                        @error('password_confirmation')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="birth_date">FECHA NACIMIENTO</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
                                        <input type="date" name="birth_date" class="form-control"
                                            value="{{ $user->birth_date }}" required>
                                        @error('birth_date')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="gender">GÉNERO</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-venus"></i></span>
                                        <select name="gender" class="form-control" required>
                                            <option value="Hombre" {{ $user->gender === 'Hombre' ? 'selected' : '' }}>
                                                Hombre</option>
                                            <option value="Mujer" {{ $user->gender === 'Mujer' ? 'selected' : '' }}>
                                                Mujer</option>
                                        </select>
                                        @error('gender')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="phone">TEL. CELULAR</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                                        <input type="number" name="phone" class="form-control" min=10
                                            label-class="text-primary" placeholder="Ingrese su número de celular"
                                            value="{{ $user->phone }}">
                                        @error('phone')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="photo">FOTO PERFIL</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-image-portrait"></i></span>
                                        <input type="hidden" name="old_photo" value="{{ $user->profile_photo_path }}">
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
                                    <label for="address">DIRECCIÓN</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-location-dot"></i></span>
                                        <textarea name="address" id="address" cols="30" rows="3" class="form-control">{{ $user->address }}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-4 text-center">
                                    <b for="old_photo">FOTO ACTUAL</b>
                                    <div class="text text-center">
                                        <img src="{{ asset($user->profile_photo_path) }}" alt="Foto de perfil"
                                            width="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="btn-group pull-right me-2">
                                    <button type="submit" class="btn btn-sm btn-primary" title="Guardar">
                                        <i class="fa-solid fa-pen-to-square mr-2"></i><span
                                            class="hidden-xs">Actualizar</span>
                                    </button>
                                </div>
                                <div class="btn-group pull-right me-2">
                                    <a href="{{ route('user.index') }}" class="btn btn-sm btn-secondary"
                                        title="Cancelar">
                                        <i class="fa-solid fa-ban mr-2"></i><span class="hidden-xs">Cancelar</span>
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
