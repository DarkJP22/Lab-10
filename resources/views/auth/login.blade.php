<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tasks</title>
    <link rel="icon" href="storage/img/logo1.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
</head>

<body background="#F8F9FA">

    <section class="bg-light py-3 py-md-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="card border border-light-subtle rounded-3 shadow-sm mt-5">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Iniciar sesión en su cuenta</h2>
                            <form method="POST" action="{{ route('login.post') }}">
                                @csrf

                                @session('error')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $value }}
                                    </div>
                                @endsession

                                <div class="row gy-2 overflow-hidden">
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                id="email" placeholder="name@example.com" required>
                                            <label for="email"
                                                class="form-label">{{ __('Dirección de correo electrónico') }}</label>
                                        </div>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" id="password" value="" placeholder="Password"
                                                required>
                                            <label for="password" class="form-label">{{ __('Contraseña') }}</label>
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid my-3">
                                            <button class="btn btn-success btn-lg"
                                                type="submit">{{ __('Login') }}</button>
                                        </div>
                                        <div class="mt-3 text-center">
                                            <a href="{{ asset('/tasks') }}">Volver a Menú</a>
                                        </div>
                                        <div class="col-12">
                                            <p class="m-0 text-secondary text-center">¿No tienes una cuenta? <a
                                                    href="{{ route('register') }}"
                                                    class="link-primary text-decoration-none">Sign up</a></p>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
