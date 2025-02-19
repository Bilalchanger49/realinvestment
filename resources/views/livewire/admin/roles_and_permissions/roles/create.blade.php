
    <div class="content-wrapper">
        <div class="content">

            @include('livewire.admin.roles_and_permissions.roles.topbar')

            <!-- Masked Input -->
            <div class="card card-default">
                <div class="card-header">
                    <h2>New Role</h2>
                </div>
                <div class="card-body">
                    <form  wire:submit.prevent="addRoles" class="mt-5" enctype="multipart/form-data">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Role Name: <span class="text-danger">*</span>
                                    </label>
                                    <input value="{{ old('role_name') }}" required type="text" name="role_name" placeholder="Role name" class="form-control" wire:model="role_name">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Permission:</strong>
                                    <br />

                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td class="styled-checkbox">
                                                <input type="checkbox" value="{{ $permission->name }}" name="permission[]" id="permission_{{ $permission->id }}" wire:model="selectPermission" />
                                                <label class="checkmark" for="permission_{{ $permission->id }}"></label>
                                            </td>
                                            <td>{{ $permission->name }}</td>
                                        </tr>
                                        <br />
                                    @endforeach
                                </div>
                            </div>

                        </div>
                        <div class="text-right">
                            <button id="ajax-btn" type="submit" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
