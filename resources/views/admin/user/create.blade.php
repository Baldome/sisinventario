@extends('adminlte::page')

@section('title', 'SIS-Inventario | Crear usuario')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h4><b>CREAR NUEVO USUARIO</b></h4>
        </div>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-outline card-primary col-md-12 shadow">
                <div class="card-header whit-border">
                    <b>LLENE LOS DATOS DEL NUEVO USUARIO</b>
                </div>
                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="role_id">ROL</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-brands fa-jxl"></i></span>
                                            <select name="role_id" class="form-control" required>
                                                @if (old('role_id'))
                                                    <option value="{{ old('role_id') }}">{{ old('role_id') }}</option>
                                                @endif
                                                <option value="" disabled selected>Seleccione el rol del usuario
                                                </option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('role_id')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <label for="ci">C.I.</label>
                                                <div class="form-group input-group">
                                                    <span class="input-group-text"><i
                                                            class="fa-solid fa-address-card"></i></span>
                                                    <input type="number" name="ci" min=1 class="form-control"
                                                        placeholder="Ingrese su cédula de identidad"
                                                        value="{{ old('ci') }}" required>
                                                </div>
                                                @error('ci')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="ci_dep">EXPEDIDO</label>
                                                <div class="form-group input-group">
                                                    <span class="input-group-text"><i
                                                            class="fa-solid fa-address-card"></i></span>
                                                    <select name="ci_dep" class="form-control" required>
                                                        <option value="" disabled selected>Seleccione su expedido
                                                        </option>
                                                        @if (old('ci_dep'))
                                                            <option value="{{ old('ci_dep') }}">{{ old('ci_dep') }}
                                                            </option>
                                                        @endif
                                                        <option value="LP">LP</option>
                                                        <option value="SC">SC</option>
                                                        <option value="CB">CB</option>
                                                        <option value="OR">OR</option>
                                                        <option value="PT">PT</option>
                                                        <option value="TJ">TJ</option>
                                                        <option value="BN">BN</option>
                                                        <option value="PA">PA</option>
                                                        <option value="CH">CH</option>
                                                    </select>
                                                </div>
                                                @error('ci_dep')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="name">NOMBRE</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-user-pen"></i></span>
                                            <input type="text" name="name" placeholder="Ingrese su nombre"
                                                class="form-control" value="{{ old('name') }}" required>
                                        </div>
                                        @error('name')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="last_name">APELLIDO</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-user-pen"></i></span>
                                            <input type="text" name="last_name" placeholder="Ingrese su apellido"
                                                class="form-control" value="{{ old('last_name') }}" required>
                                        </div>
                                        @error('last_name')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="is_active">ESTADO</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-user-check"></i></span>
                                            <select name="is_active" class="form-control" required>
                                                @if (old('is_active'))
                                                    <option value="{{ old('is_active') }}">{{ old('is_active') }}
                                                    </option>
                                                @endif
                                                <option value="" disabled selected>Seleccione el estado del
                                                    usuario</option>
                                                <option value="{{ true }}">Activo</option>
                                                <option value="{{ false }}">Inactivo</option>
                                            </select>
                                        </div>
                                        @error('is_active')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="email">CORREO</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Ingrese su correo" value="{{ old('email') }}" required>
                                        </div>
                                        @error('email')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="password">CONTRASEÑA</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Ingrese su contraseña" value="{{ old('password') }}"
                                                autocomplete="new-password" required>
                                        </div>
                                        @error('password')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="password_confirmation">CONFIRMAR</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                            <input type="password" name="password_confirmation" class="form-control"
                                                placeholder="Confirme la contraseña"
                                                value="{{ old('password_confirmation') }}" autocomplete="new-password"
                                                required>
                                        </div>
                                        @error('password_confirmation')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="birth_date">FECHA NACIMIENTO</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
                                            <input type="date" name="birth_date"
                                                placeholder="Ingrese su fecha de nacimiento" class="form-control"
                                                value="{{ old('birth_date') }}" required>
                                        </div>
                                        @error('birth_date')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="gender">GÉNERO</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-venus"></i></span>
                                            <select name="gender" class="form-control" required>
                                                @if (old('gender'))
                                                    <option value="{{ old('gender') }}">{{ old('gender') }}</option>
                                                @endif
                                                <option value="" disabled selected>Seleccione su género</option>
                                                <option value="Hombre">Hombre</option>
                                                <option value="Mujer">Mujer</option>
                                            </select>
                                        </div>
                                        @error('gender')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="phone">TEL. CELULAR</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                                            <input type="number" name="phone" class="form-control" min=10
                                                label-class="text-primary" placeholder="Ingrese su número de celular"
                                                value="{{ old('phone') }}">
                                        </div>
                                        @error('phone')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="photo">FOTO PERFIL</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i
                                                    class="fa-solid fa-image-portrait"></i></span>
                                            <input type="file" name="photo" class="form-control"
                                                value="{{ old('photo') }}" accept="image/*">
                                        </div>
                                        @error('photo')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="address">DIRECCIÓN</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-location-dot"></i></span>
                                            <textarea name="address" id="address" cols="30" rows="2" class="form-control"
                                                placeholder="Ingrese su dirección"></textarea>
                                        </div>
                                        @error('address')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent mb-3">
                        <div class="col-md-12">
                            <div class="btn-group pull-right me-2">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    <i class="zmdi zmdi-save mr-2"></i><span class="hidden-xs">Guardar</span>
                                </button>
                            </div>
                            <div class="btn-group pull-right me-2">
                                <a href="{{ route('user.index') }}" class="btn btn-sm btn-secondary">
                                    <i class="fa-solid fa-ban mr-2"></i><span class="hidden-xs">Cancelar</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <style>
        input:invalid {
            border-color: red;
        }

        select:invalid {
            border-color: red;
        }
    </style>
@stop

@section('js')
@stop
