<?php

namespace App\Livewire\Site\RolesAndPermissions\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class EditRoleComponent extends Component
{
    public $roleId;
    public $role_name;
    public $selectPermission = [];

    public function mount($id)
    {
        $role = Role::findOrFail($id);
        $this->roleId = $role->id;
        $this->role_name = $role->name;
        $this->selectPermission = $role->permissions->pluck('name')->toArray();
    }

    public function updateRole()
    {
        $this->validate([
            'role_name' => 'required|unique:roles,name,' . $this->roleId,
            'selectPermission' => 'required|array|min:1',
        ]);

        try {
            $role = Role::findOrFail($this->roleId);
            $role->name = $this->role_name;
            $role->save();

            $role->syncPermissions($this->selectPermission);

            session()->flash('success', 'Role updated successfully.');

        } catch (\Exception $e) {
            session()->flash('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function render()
    {
        $permissions = Permission::all();
        return view('livewire.admin.roles_and_permissions.roles.edit', compact('permissions'))
            ->extends('layouts.auth');
    }
}
