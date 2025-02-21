<?php

namespace App\Livewire\Site\RolesAndPermissions\Users;


use App\Models\User;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersComponent extends Component
{

    public function render()
    {
        $roles = Role::all();
        $users = User::select('name', 'id')->get();
//        dd($users);
        return view('livewire.admin.roles_and_permissions.users.index'
            , compact('roles', 'users'))->extends('layouts.auth');
    }
}
