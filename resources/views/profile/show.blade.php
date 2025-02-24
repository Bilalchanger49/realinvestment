{{--<x-app-layout>--}}
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">--}}
{{--            {{ __('Profile') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}

{{--    <div>--}}
{{--        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">--}}
{{--            @if (Laravel\Fortify\Features::canUpdateProfileInformation())--}}
{{--                @livewire('profile.update-profile-information-form')--}}

{{--                <x-section-border />--}}
{{--            @endif--}}

{{--            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))--}}
{{--                <div class="mt-10 sm:mt-0">--}}
{{--                    @livewire('profile.update-password-form')--}}
{{--                </div>--}}

{{--                <x-section-border />--}}
{{--            @endif--}}

{{--            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())--}}
{{--                <div class="mt-10 sm:mt-0">--}}
{{--                    @livewire('profile.two-factor-authentication-form')--}}
{{--                </div>--}}

{{--                <x-section-border />--}}
{{--            @endif--}}

{{--            <div class="mt-10 sm:mt-0">--}}
{{--                @livewire('profile.logout-other-browser-sessions-form')--}}
{{--            </div>--}}

{{--            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())--}}
{{--                <x-section-border />--}}

{{--                <div class="mt-10 sm:mt-0">--}}
{{--                    @livewire('profile.delete-user-form')--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</x-app-layout>--}}
@extends('layouts.site')
@section('content')

<!-- Breadcrumb Start -->
<div class="breadcrumb-area bg-overlay-2" style="background-image:url({{asset('assets/img/other/1.png')}})">
    <div class="container">
        <div class="breadcrumb-inner">
            <div class="section-title text-center">
                <h2 class="page-title">Account Settings</h2>
                <ul class="page-list">
                    <li><a href="index.html">Home</a></li>
                    <li>Account Settings</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<div class="container light-style flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-4" style="color: #5ba600;">Account settings</h4>

    <div class="cd-card cd-overflow-hidden">
        <div class="row g-0 row-bordered">
            <!-- Sidebar Links -->
            <div class="col-md-3 pt-0 account-settings-links-section">
                <div class="list-group list-group-flush account-settings-links">
                    <a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#account-general">General</a>
                    <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#account-change-password">Change Password</a>
                    <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#account-info">Info</a>
                    <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#account-notifications">Notifications</a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <div class="tab-content">
                    <!-- General Section -->
                    @livewire('profile.update-profile-information-form')

{{--                    <div class="tab-pane fade show active" id="account-general">--}}
{{--                        <div class="cd-card-body d-flex align-items-center">--}}
{{--                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt class="d-block ui-w-80">--}}
{{--                            <div class="ms-4">--}}
{{--                                <label class="btn btn-outline-primary">--}}
{{--                                    Upload new photo--}}
{{--                                    <input type="file" class="account-settings-fileinput">--}}
{{--                                </label> &nbsp;--}}
{{--                                <button type="button" class="btn btn-secondary">Reset</button>--}}
{{--                                <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <hr class="border-light m-0">--}}
{{--                        <div class="cd-card-body">--}}
{{--                            <div class="mb-3">--}}
{{--                                <label class="form-label">Username</label>--}}
{{--                                <input type="text" class="form-control" value="nmaxwell">--}}
{{--                            </div>--}}
{{--                            <div class="mb-3">--}}
{{--                                <label class="form-label">Name</label>--}}
{{--                                <input type="text" class="form-control" value="Nelle Maxwell">--}}
{{--                            </div>--}}
{{--                            <div class="mb-3">--}}
{{--                                <label class="form-label">E-mail</label>--}}
{{--                                <input type="text" class="form-control" value="nmaxwell@mail.com">--}}
{{--                                <div class="alert alert-warning mt-3">--}}
{{--                                    Your email is not confirmed. Please check your inbox.<br>--}}
{{--                                    <a href="javascript:void(0)">Resend confirmation</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="mb-3">--}}
{{--                                <label class="form-label">Company</label>--}}
{{--                                <input type="text" class="form-control" value="Company Ltd.">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <!-- Change Password Section -->
                    @livewire('profile.update-password-form')
{{--                    <div class="tab-pane fade" id="account-change-password">--}}
{{--                        <div class="cd-card-body">--}}
{{--                            <div class="mb-3">--}}
{{--                                <label class="form-label">Current Password</label>--}}
{{--                                <input type="password" class="form-control">--}}
{{--                            </div>--}}
{{--                            <div class="mb-3">--}}
{{--                                <label class="form-label">New Password</label>--}}
{{--                                <input type="password" class="form-control">--}}
{{--                            </div>--}}
{{--                            <div class="mb-3">--}}
{{--                                <label class="form-label">Repeat New Password</label>--}}
{{--                                <input type="password" class="form-control">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <!-- Info Section -->
                    <div class="tab-pane fade" id="account-info">
                        <div class="cd-card-body">
                            <div class="mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="text" class="form-control" value="+123456789">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control" value="123 Main St, City, Country">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Bio</label>
                                <textarea class="form-control" rows="3">This is a sample bio.</textarea>
                            </div>
                        </div>
                    </div>



                    <!-- Notifications Section -->
                    <div class="tab-pane fade" id="account-notifications">
                        <div class="cd-card-body">
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="emailNotifications" checked>
                                <label class="form-check-label" for="emailNotifications">Email Notifications</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="pushNotifications" checked>
                                <label class="form-check-label" for="pushNotifications">Push Notifications</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    <div class="text-end mt-3">--}}
{{--        <button type="button" class="btn btn-primary">Save changes</button>--}}
{{--        <button type="button" class="btn btn-secondary">Cancel</button>--}}
{{--    </div>--}}
</div>
@endsection
<!-- Updated Bootstrap JS -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script> -->
<!-- </body>

</html> -->
