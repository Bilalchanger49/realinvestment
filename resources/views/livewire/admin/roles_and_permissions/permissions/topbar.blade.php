<div class="card card-default">
    <div class="px-6 py-4">
        <p>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link {{ Request::path() == 'admin/permissions/create' ? 'active': '' }}"
                   aria-current="page" href="{{route('create.permission')}}">New Permission</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::path() == 'admin/permissions/all' ? 'active': '' }}" aria-current="page"
                   href="{{route('open.permission')}}">Permissions</a>
            </li>
        </ul>
        </p>
    </div>
</div>
