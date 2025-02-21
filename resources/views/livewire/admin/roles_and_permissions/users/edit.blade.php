
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
                    <h2>Edit Users</h2>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="assignRole()" class="mt-5" enctype="multipart/form-data">

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <label>{{$users->name}}</label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <label>{{$users->email}}</label>
                                </div>
                            </div>



                        <div class="row">
                            <div class="col-md-6">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Roles:</strong>
                                            <br />
{{--                                            @foreach ($roles as $role)--}}
{{--                                                <div class="form-check">--}}
{{--                                                    <input type="radio" value="{{ $role->name }}"--}}
{{--                                                           id="role_{{ $role->id }}"--}}
{{--                                                           wire:model="selectedRoles">--}}
{{--                                                    <label for="role_{{ $role->id }}">{{ $role->name }}</label>--}}
{{--                                                </div>--}}
{{--                                            @endforeach--}}

                                            @foreach ($roles as $role)
                                                <tr>
                                                    <td class="styled-checkbox">
                                                        <input type="checkbox" value="{{ $role->name }}" name="role[]" id="role_{{ $role->id }}" wire:model="selectedRoles" />
                                                        <label class="checkmark" for="permission_{{ $role->id }}"></label>
                                                    </td>
                                                    <td>{{ $role->name }}</td>
                                                </tr>
                                                <br />
                                            @endforeach

                                        </div>
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

