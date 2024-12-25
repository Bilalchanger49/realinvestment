{{--<x-guest-layout>--}}
{{--    <x-authentication-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <x-authentication-card-logo/>--}}
{{--        </x-slot>--}}

{{--        <x-validation-errors class="mb-4"/>--}}

{{--        <form method="POST" action="{{ route('password.update') }}">--}}
{{--            @csrf--}}

{{--            <input type="hidden" name="token" value="{{ $request->route('token') }}">--}}

{{--            <div class="block">--}}
{{--                <x-label for="email" value="{{ __('Email') }}"/>--}}
{{--                <x-input id="email" class="block mt-1 w-full" type="email" name="email"--}}
{{--                         :value="old('email', $request->email)" required autofocus autocomplete="username"/>--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-label for="password" value="{{ __('Password') }}"/>--}}
{{--                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required--}}
{{--                         autocomplete="new-password"/>--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}"/>--}}
{{--                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"--}}
{{--                         name="password_confirmation" required autocomplete="new-password"/>--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <x-button>--}}
{{--                    {{ __('Reset Password') }}--}}
{{--                </x-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-authentication-card>--}}
{{--</x-guest-layout>--}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    @livewireStyles
</head>

<body>

<section class="bg-light p-1 p-md-2 p-xl-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xxl-11">
                <div class="card border-light-subtle shadow-sm">
                    <div class="row g-0">
                        <!-- Form Column (now on the left) -->
                        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                            <div class="col-12 col-lg-11 col-xl-10">
                                <div class="card-body p-3 p-md-4 p-xl-5">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <div class="text-center mb-4">
                                                    <a href="">
                                                        <img src="{{asset('assets/img/logo-white.png')}}" alt="BootstrapBrain Logo"
                                                             width="175" height="57">
                                                    </a>
                                                </div>
                                                <h4 class="text-center">Join us and start your journey!</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <form method="POST" action="{{ route('password.update') }}">
                                        @csrf

                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                        <div class="row gy-3 overflow-hidden">
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="email" class="form-control" name="email" id="email"
                                                           value="{{old('email', $request->email)}}" placeholder="name@example.com"
                                                           autocomplete="username">
                                                    <label for="email" class="form-label ">Email</label>
                                                    @error('email')
                                                    <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="password" class="form-control" name="password"
                                                           id="password" placeholder="Password"
                                                           autocomplete="new-password">
                                                    <label for="password" class="form-label">Password</label>
                                                    @error('password')
                                                    <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="password" class="form-control"
                                                           name="password_confirmation" id="password_confirmation"
                                                           placeholder="Confirm Password" autocomplete="new-password">
                                                    <label for="password_confirmation" class="form-label">Confirm
                                                        Password</label>
                                                    @error('password_confirmation')
                                                    <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button class="btn btn-primary btn-lg"
                                                            type="submit">{{ __('Reset Password') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Image Column (now on the right) -->
                        <div class="col-12 col-md-6">
                            <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy"
                                 src="{{asset('assets/img/banner/1.jpg')}}" alt="Join us and start your journey!">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
@livewireScripts
</body>

</html>


