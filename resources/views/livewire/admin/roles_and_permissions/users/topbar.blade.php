<div class="card card-default">
    <div class="px-6 py-4">
        <p>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link {{ Request::path() == 'admin/users' ? 'active': '' }}" aria-current="page" href="{{ route('open.users')}}">User</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::path() == 'admin/users/assign-role' ? 'active': '' }}" aria-current="page" href="">Assign Roles</a>
            </li>
        </ul>
        </p>
    </div>
</div>
