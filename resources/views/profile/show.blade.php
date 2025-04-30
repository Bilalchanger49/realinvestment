
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
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <div class="tab-content">
                    <!-- General Section -->
                    @livewire('profile.update-profile-information-form')


                    <!-- Change Password Section -->
                    @livewire('profile.update-password-form')

                </div>
            </div>
        </div>
    </div>


</div>
@endsection
<!-- Updated Bootstrap JS -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script> -->
<!-- </body>

</html> -->
