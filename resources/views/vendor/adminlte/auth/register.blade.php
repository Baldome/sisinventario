<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrarse - Sistema de Inventarios</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="main">

        @php($login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login'))
        @php($register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register'))

        @if (config('adminlte.use_route_url', false))
            @php($login_url = $login_url ? route($login_url) : '')
            @php($register_url = $register_url ? route($register_url) : '')
        @else
            @php($login_url = $login_url ? url($login_url) : '')
            @php($register_url = $register_url ? url($register_url) : '')
        @endif


        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="{{ url('/') }}" class="signup-image-link">Cancelar</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Registrarse</h2>
                        <form method="POST" class="register-form" id="login-form" action="{{ $register_url }}">
                            @csrf
                            {{-- Nombre --}}
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name"
                                    class="@error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    placeholder="{{ __('adminlte::adminlte.full_name') }}" autofocus />
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- Email --}}
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email"
                                    class="@error('email') is-invalid @enderror" value="{{ old('email') }}"
                                    placeholder="{{ __('adminlte::adminlte.email') }}" />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- Password --}}
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password"
                                    class="@error('password') is-invalid @enderror"
                                    placeholder="{{ __('adminlte::adminlte.password') }}" />
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- Confirm password --}}
                            <div class="form-group">
                                <label for="password_confirmation"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="@error('password_confirmation') is-invalid @enderror"
                                    placeholder="{{ __('adminlte::adminlte.retype_password') }}" />
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- Remember me --}}
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me"
                                    class="label-agree-term"><span><span></span></span>Recuérdame</label>
                            </div>
                            {{-- Register button --}}
                            <div class="form-group form-button">
                                <button type="submit"
                                    class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">{{ __('adminlte::adminlte.register') }}</button>
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">O inicia sesión con</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="{{ url('/auth/redirect', []) }}"><i
                                            class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
