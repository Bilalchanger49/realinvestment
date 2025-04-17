<div class="content-wrapper">
    <div class="content">

        @include('livewire.admin.roles_and_permissions.permissions.topbar')

        <!-- Masked Input -->
        @if (session('success'))
            <div class="alert alert-success">
                <a id="toaster-success" href="javascript:"
                   class="btn btn-success btn-pill">  {{ session('success') }}</a>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">

                <a id="toaster-danger" href="javascript:" class="btn btn-danger btn-pill"> {{ session('error') }}</a>
            </div>
        @endif
        <div class="card card-default">
            <div class="card-header">
                <h2>Permissions</h2>
            </div>
            <div class="card-body">

                <table id="permissions_table" class="table table-hover table-product" style="width:100%">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>ID</th>
                        <th>Name</th>
                        @can('permission.delete')
                            <th>Actions</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($permissions as $permission)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $permission->id }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>
                                @can('permission.delete')
                                    <button wire:click="deletePermission({{ $permission->id }})" class="btn btn-danger">
                                        <i class="icon-trash"></i> Delete
                                    </button>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>
