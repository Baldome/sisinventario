@extends('adminlte::page')

@section('title', 'SIS-Inventario | Crear usuario')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4>Crear usuario</h4>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="code">Código</label>
                                            <input class="form-control" name="code"
                                                placeholder="Ingrese el código del usuario" type="number" min=1
                                                value="{{ old('code') }}" required>
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
                                                        placeholder="Ingrese su cédula de identidad"
                                                        value="{{ old('ci') }}" required>
                                                    @error('ci')
                                                        <small style="color: red">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="ci_dep"></i>Depto</label>
                                                    <select name="ci_dep" class="form-control" required>
                                                        <option value="{{ old('ci_dep') }}">{{ old('ci_dep') }}</option>
                                                        <option value="LP">LP</option>
                                                        <option value="SCZ">SC</option>
                                                        <option value="CBBA">CB</option>
                                                        <option value="ORU">OR</option>
                                                        <option value="PTSI">PT</option>
                                                        <option value="TJA">TJ</option>
                                                        <option value="BENI">BN</option>
                                                        <option value="PND">PA</option>
                                                        <option value="CHQ">CH</option>
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
                                            <input type="text" name="name" placeholder="Ingrese su nombre"
                                                class="form-control" value="{{ old('name') }}" required>
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
                                            <input type="text" name="last_name" placeholder="Ingrese su apellido"
                                                class="form-control" value="{{ old('last_name') }}" required>
                                            @error('last_name')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="state">Seleccione estado</label>
                                            <select name="state" class="form-control" required>
                                                <option value="{{ old('state') }}">{{ old('state') }}</option>
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
                                                placeholder="Ingrese su correo" value="{{ old('email') }}" required>
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
                                                placeholder="Ingrese su contraseña" value="{{ old('password') }}"
                                                autocomplete="new-password" required>
                                            @error('password')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="password_confirmation">Confirmar contraseña</label>
                                            <input type="password" name="password_confirmation" class="form-control"
                                                placeholder="Confirme la contraseña"
                                                value="{{ old('password_confirmation') }}" autocomplete="new-password"
                                                required>
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
                                                value="{{ old('birth_date') }}" required>
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
                                                <option value="{{ old('gender') }}">{{ old('gender') }}</option>
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
                                                value="{{ old('phone') }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="photo">Seleccione su foto</label>
                                            <input type="file" name="photo" class="form-control"
                                                value="{{ old('photo') }}" accept="image/*">
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
                                                <label for="role">Seleccione un rol para asignar</label>
                                                <select name="role_id" class="form-control" id="role">
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="address">Dirección</label>
                                            <textarea name="address" id="address" cols="30" rows="4" class="form-control"
                                                placeholder="Ingrese su dirección"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <div class="btn-group pull-right me-2">
                                        <button type="submit" class="btn btn-sm btn-primary" title="Guardar">
                                            <i class="zmdi zmdi-save mr-2"></i><span class="hidden-xs">Guardar</span>
                                        </button>
                                    </div>
                                    <div class="btn-group pull-right me-2">
                                        <a href="{{ route('user.index', []) }}" class="btn btn-sm btn-secondary"
                                            title="Cancelar">
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
