@extends('layouts.auth')

@section('title', 'New Student')

@section('css')
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content">

            @include('roles_and_permissions.users.topbar')

            <!-- Masked Input -->
            <div class="card card-default">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                <div class="card-header">
                    <h2>Edit Users</h2>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('update.users', $users->id) }}" class="mt-5" enctype="multipart/form-data">
                        @csrf
{{--                        <div class="col-md-6">--}}
{{--                            <div class="form-group">--}}
{{--                                <label>User Name: <span class="text-danger">*</span></label>--}}
{{--                                <input value="{{$users->name}}" required type="text" name="user_name" class="form-control">--}}

{{--                            </div>--}}
{{--                        </div>--}}

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name"  value="{{$users->name}}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email"  value="{{$users->email}}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="oldpassword" class="col-md-4 col-form-label text-md-end">{{ __('Old Password') }}</label>

                                <div class="col-md-6">
                                    <input id="oldpassword" type="password" class="form-control @error('password') is-invalid @enderror" name="oldpassword"  autocomplete="old-password">

                                    @error('oldpassword')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                                    @error('password_confirm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                        <div class="row">
                            <div class="col-md-6">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Roles:</strong>
                                            <br />
                                            @foreach ($roles as $role)
                                                <tr>
                                                    <td class="styled-checkbox">
                                                        <input type="radio" value="{{ $role->name }}" name="role" id="role_{{ $role->id }}"  />
                                                        <label class="checkmark" for="role_{{ $role->id }}"></label>
                                                    </td>
                                                    <td>{{ $role->name }}</td>
                                                </tr>
                                                <br />
                                            @endforeach
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button id="ajax-btn" type="submit" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
