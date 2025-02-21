<div class="card card-default">
    <div class="px-6 py-4">
        <p>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link {{ Request::path() == 'admin/roles/create' ? 'active': '' }}" aria-current="page" href="{{route('create.roles')}}">New Role</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::path() == 'admin/roles' ? 'active': '' }}" aria-current="page" href="{{route('open.roles')}}">Roles</a>
            </li>
        </ul>
        </p>
    </div>
</div>
