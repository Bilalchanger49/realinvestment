<?php
namespace App\Livewire\Site\RolesAndPermissions\Users;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class AssignRoleComponent extends Component
{
    public $userId;
    public $selectedUser;
    public $selectedRoles = [];

    public function mount($id)
    {
        $this->userId = $id;
        $this->selectedUser = User::findOrFail($id);

        // Load currently assigned roles
        $this->selectedRoles = $this->selectedUser->roles->pluck('name')->toArray();
    }

    public function assignRole()
    {

        $validate = $this->validate([
            'selectedRoles' => 'required|array|min:1',
        ]);
//        dd($validate);


        try {
            // Sync roles (removes unselected and adds selected)
            $this->selectedUser->syncRoles($this->selectedRoles);

            session()->flash('success', 'Roles assigned successfully');
            return redirect()->route('open.users');

        } catch (\Exception $e) {
            session()->flash('error', 'Error occurred while assigning roles: ' . $e->getMessage());
            return redirect()->route('open.users');
        }
    }

    public function render()
    {
        $roles = Role::get();
        $users = $this->selectedUser;
        return view('livewire.admin.roles_and_permissions.users.edit', compact('users', 'roles'))->extends('layouts.auth');
    }
}
