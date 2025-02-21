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
            $role = Role::create([
                    'name' => $validate['role_name'],
                    'guard_name' => 'web'
                ]);
            foreach ($validate['selectPermission'] as $permission) {
                $role->givePermissionTo($permission);
            }
            return redirect()->route('open.users')
                ->with('success', 'Role assigned successfully');

        } catch (\Exception $e) {
            return redirect()->route('open.users')
                ->with('error', 'Error occured while assigning role' . $e->getMessage());
        }

    }

    public function render()
    {
        $permissions = Permission::all();

        return view('livewire.admin.roles_and_permissions.roles.create',
            compact('permissions'))->extends('layouts.auth');
    }
}
