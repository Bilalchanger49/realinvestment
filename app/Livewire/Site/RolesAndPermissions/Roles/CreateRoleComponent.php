<?php

namespace App\Livewire\Site\RolesAndPermissions\Roles;


use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateRoleComponent extends Component
{
    public $role_name;
    public $selectPermission = [];

    public function addRoles()
    {
        try {
            $validate = $this->validate([
                'role_name' => 'required|unique:roles,name',
                'selectPermission' => 'required|array|min:1',
            ]);
            $role = Role::create(['name' => $validate['role_name']]);
            foreach ($validate['selectPermission'] as $permission) {
                $role->givePermissionTo($permission);
            }
            return redirect()->route('open.roles')
                ->with('success', 'Role created successfully');

        } catch (\Exception $e) {
            return redirect()->route('open.roles')
                ->with('error', 'Error occured while creating a role' . $e->getMessage());
        }

    }

    public function render()
    {
        $permissions = Permission::all();

        return view('livewire.admin.roles_and_permissions.roles.create',
            compact('permissions'))->extends('layouts.auth');
    }
}
