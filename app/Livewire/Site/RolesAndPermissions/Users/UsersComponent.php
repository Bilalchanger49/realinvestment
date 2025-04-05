<?php

namespace App\Livewire\Site\RolesAndPermissions\Users;


use App\Models\User;
use Illuminate\Support\Facades\Request;
use Laravel\Socialite\Facades\Socialite;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Exception;

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

    public function googlepage(){

        return socialite::driver('google')->redirect();
    }

    public function googlecallback(){
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if($finduser)

            {

                Auth::login($finduser);

                return redirect()->intended('/');

            }

            else

            {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('12345678')
                ]);

                Auth::login($newUser);

                return redirect()->intended('/');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }


}
