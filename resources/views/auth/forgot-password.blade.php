
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    @livewireStyles
</head>

<body>

<section class="bg-light p-1 p-md-2 p-xl-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xxl-11">
                <div class="card border-light-subtle shadow-sm">
                    <div class="row g-0">
                        <div class="col-12 col-md-6">
                            <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" src="assets/img/banner/3.jpg" alt="Welcome back you've been missed!">
                        </div>
                        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                            <div class="col-12 col-lg-11 col-xl-10">
                                <div class="card-body p-3 p-md-4 p-xl-5">


                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <div class="text-center mb-4">
                                                    <a href="#">
                                                        <img src="assets/img/logo-white.png" alt="BootstrapBrain Logo" width="175" height="57">
                                                    </a>
                                                </div>
                                                <h4 class="text-center">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</h4>
                                            </div>
                                        </div>
                                    </div>

                                    @session('status')
                                    <div class="mb-4 font-medium text-sm text-green-600">
                                        {{ $value }}
                                    </div>
                                    @endsession
                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        <div class="row gy-3 overflow-hidden">
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" value="{{old('email')}}"  autofocus autocomplete="username">
                                                    <label for="email" class="form-label">Email</label>
                                                    @error('email')
                                                    <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button class="btn btn-primary btn-lg" type="submit">Email Password Reset Link</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center mt-5">
                                                <a href="{{ route('register') }}" class="link-secondary text-decoration-none">Create new account</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@livewireScripts
</body>

</html>

