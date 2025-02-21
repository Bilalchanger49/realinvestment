
    <div class="content-wrapper">
        <div class="content">

            @include('livewire.admin.roles_and_permissions.users.topbar')

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
                    <h2>Users</h2>
                </div>
                <div class="card-body">

                    <table id="role_table" class="table table-hover table-product" style="width:100%">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
{{--                                <td>--}}
{{--                                    {{$user->getRoleNames()}}--}}

{{--                                </td>--}}
                                <td>{{ implode(', ', $user->getRoleNames()->toArray()) }}</td>

                                <td>
                                    <a href="{{ URL('admin/users/assign-role/') }}/{{ $user->id }}" class="btn btn-success">{{ __('Edit') }}</a>
                                    <a href="{{ URL('admin/users/delete') }}/{{ $user->id }}" class="btn btn-danger">{{ __('Delete') }}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
