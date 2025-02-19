@extends('layouts.auth')

@section('title', 'New Student')

@section('css')
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content">

            @include('livewire.admin.roles_and_permissions.roles.topbar')

            <!-- Masked Input -->
            <div class="card card-default">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-header">
                    <h2>New Role</h2>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('update.roles') }}" class="mt-5" enctype="multipart/form-data">
                        @csrf
                        <input type="text" id="id" name="id" value="{{ $role->id }}" readonly required hidden/>
                        <label for="name">{{ __('Role Name') }}</label>
                        <input type="text" required name="name" class="form-control" value="{{ $role->name }}"/>


                        <div class="row">
                            <div class="col-md-6">
                                <h1>{{ __('Permissions') }}</h1>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Permission') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td>{{ $permission->name }}</td>
                                            <td class="styled-checkbox">
                                                <input type="checkbox" value="{{ $permission->name }}"
                                                       name="permission[]" id="permission_{{ $permission->id }}"
                                                       @if ($role->permissions->contains('id', $permission->id)) checked @endif />
                                                <label class="checkmark" for="permission_{{ $permission->id }}"></label>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="text-right">
                            <button id="ajax-btn" type="submit" class="btn btn-primary">Submit form <i
                                    class="icon-paperplane ml-2"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
