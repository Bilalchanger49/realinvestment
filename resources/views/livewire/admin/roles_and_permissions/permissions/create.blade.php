<div class="content-wrapper">
        <div class="content">

            @include('livewire.admin.roles_and_permissions.permissions.topbar')

            <!-- Masked Input -->
            <div class="card card-default">
                @if (session('flash_success'))
                    <div class="alert alert-success">
                        {{ session('flash_success') }}
                    </div>
                @endif
                <div class="card-header">
                    <h2>New Permission</h2>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="addPermission" class="mt-5" enctype="multipart/form-data">

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Permission Name: <span class="text-danger">*</span>
                                    </label>
                                    <input value="{{ old('permission_name') }}" required type="text" name="permission_name" placeholder="Permission" class="form-control" wire:model="permission_name">
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
