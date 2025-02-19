<?php

namespace App\Livewire\Site\RolesAndPermissions\Permissions;


use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class PermissionsComponent extends Component
{

    public function deletePermission($id)
    {
        $permission = Permission::where('id', $id);

        if ($permission) {
            $permission->delete();
            session()->flash('success', 'permission deleted successfully.');
        } else {
            session()->flash('error', 'permission not found.');
        }
    }

    public function render()
    {
        $permissions = Permission::all();
        return view('livewire.admin.roles_and_permissions.permissions.index',
            compact('permissions'))->extends('layouts.auth');
    }
}
