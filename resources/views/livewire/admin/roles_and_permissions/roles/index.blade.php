
    <div class="content-wrapper">
        <div class="content">

            @include('livewire.admin.roles_and_permissions.roles.topbar')

            <!-- Masked Input -->
            @if (session('success'))
                <div class="alert alert-success">
                    <a id="toaster-success" href="javascript:" class="btn btn-success btn-pill">  {{ session('success') }}</a>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">

                    <a id="toaster-danger" href="javascript:" class="btn btn-danger btn-pill"> {{ session('error') }}</a>
                </div>
            @endif
            <div class="card card-default">
                <div class="card-header">
                    <h2>Roles</h2>
                </div>
                <div class="card-body">

                    <table id="role_table" class="table table-hover table-product" style="width:100%">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Permissions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>

                                    <a href="{{ URL('roles/edit') }}/{{ $role->id }}" class="btn btn-success">{{ __('Edit') }}</a>
{{--                                    <a href="{{ URL('roles/delete') }}/{{ $role->id }}" class="btn btn-danger">{{ __('Delete') }}</a>--}}
                                    <button wire:click="deleteRole({{ $role->id }})" class="btn btn-danger">
                                        <i class="icon-trash"></i> Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>

