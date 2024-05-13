<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Sistema de Inventarios</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="main">

                @php($login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login'))
                @php($register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register'))
                @php($password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset'))

                @if (config('adminlte.use_route_url', false))
                    @php($login_url = $login_url ? route($login_url) : '')
                    @php($register_url = $register_url ? route($register_url) : '')
                    @php($password_reset_url = $password_reset_url ? route($password_reset_url) : '')
                @else
                    @php($login_url = $login_url ? url($login_url) : '')
                    @php($register_url = $register_url ? url($register_url) : '')
                    @php($password_reset_url = $password_reset_url ? url($password_reset_url) : '')
                @endif
                <!-- Sing in  Form -->
                <section class="sign-in">
                    <div class="container">
                        <div class="signin-content">
                            <div class="signin-image">
                                <figure><img src="images/fondo.jpg" alt="sing up image" width="600px"></figure>
                                @role('Administrador')
                                    <a href="{{ route('register') }}" class="signup-image-link">Crea una cuenta</a>
                                @endrole
                            </div>

                            <div class="signin-form">
                                <h2 class="form-title">Login</h2>
                                <form method="POST" class="register-form" id="login-form" action="{{ $login_url }}">
                                    @csrf
                                    {{-- Email --}}
                                    <div class="form-group mb-3">
                                        <label for="email"></label>
                                        <input type="email" name="email" id="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}"
                                            placeholder="{{ __('adminlte::adminlte.email') }}" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    {{-- Password --}}
                                    <div class="form-group">
                                        <label for="password"></label>
                                        <input type="password" name="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="{{ __('adminlte::adminlte.password') }}" />
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    {{-- Remember me --}}
                                    <div class="form-group">
                                        <input type="checkbox" class="form-control" name="remember-me" id="remember-me"
                                            class="agree-term">
                                        <label for="remember-me"
                                            class="label-agree-term"><span><span></span></span>Recuérdame</label>
                                    </div>
                                    {{-- Login button --}}
                                    <div class="form-group form-button">
                                        <button type="submit"
                                            class="btn btn-primary {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">{{ __('adminlte::adminlte.sign_in') }}
                                        </button>
                                    </div>
                                </form>
                                @role('Administrador')
                                    <div class="social-login">
                                        <span class="social-label">O inicia sesión con</span>
                                        <ul class="socials">
                                            <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a>
                                            </li>
                                            <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a>
                                            </li>
                                            <li><a href="{{ url('/auth/redirect', []) }}"><i
                                                        class="display-flex-center zmdi zmdi-google"></i></a></li>
                                        </ul>
                                    </div>
                                @endrole
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
