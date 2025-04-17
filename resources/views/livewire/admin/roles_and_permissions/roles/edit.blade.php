<div class="content-wrapper">
    <div class="content">
        @include('livewire.admin.roles_and_permissions.roles.topbar')

        <div class="card card-default">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="card-header">
                <h2>Edit Role</h2>
            </div>

            <div class="card-body">
                <form wire:submit.prevent="updateRole" class="mt-5">
                    <label for="role_name">{{ __('Role Name') }}</label>
                    <input type="text" wire:model="role_name" class="form-control"/>
                    @error('role_name') <span class="text-danger">{{ $message }}</span> @enderror

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h5>{{ __('Permissions') }}</h5>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Assign') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->name }}</td>
                                        <td>
                                            <input type="checkbox" wire:model="selectPermission"
                                                   value="{{ $permission->name }}"
                                                   id="permission_{{ $permission->id }}">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @error('selectPermission') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Update Role</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
