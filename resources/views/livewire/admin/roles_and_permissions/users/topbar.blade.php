<div class="card card-default">
    <div class="px-6 py-4">
        <p>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link {{ Request::path() == 'users/assign-roles/create' ? 'active': '' }}" aria-current="page" href="{{ route('create.users') }}">Create User</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::path() == 'users' ? 'active': '' }}" aria-current="page" href="{{ route('open.users') }}">users</a>
            </li>
        </ul>
        </p>
    </div>
</div>
