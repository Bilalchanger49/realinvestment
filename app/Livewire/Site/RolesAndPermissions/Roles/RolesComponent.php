<?php

namespace App\Livewire\Site\RolesAndPermissions\Roles;


use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesComponent extends Component
{

    public function deleteRole($id)
    {
        $role = Role::where('id', $id);

        if ($role) {
            $role->delete();
            session()->flash('success', 'role deleted successfully.');
        } else {
            session()->flash('error', 'Role not found.');
        }
    }

    public function render()
    {
        $roles = Role::all();
//        dd($roles);
        return view('livewire.admin.roles_and_permissions.roles.index'
            , compact('roles'))->extends('layouts.auth');
    }
}
