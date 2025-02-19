<?php

namespace App\Livewire\Site\RolesAndPermissions\Permissions;


use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class CreatePermissionComponent extends Component
{
    public $permission_name;

    public function addPermission(Request $request)
    {
        try {
            $name = $this->permission_name;
            Permission::create([
                'name' => $name,
                'guard_name' => 'web'
            ]);
            return redirect()->route('open.permission')
                ->with('success', 'Permission Added Successfully');
        } catch (\Exception $e) {
            return redirect()->route('open.permission')
                ->with('error', 'Error occured while creating a permission');
        }
    }

    public function render()
    {
        return view('livewire.admin.roles_and_permissions.permissions.create')->extends('layouts.auth');
    }
}
