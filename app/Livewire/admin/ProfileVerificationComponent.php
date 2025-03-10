<?php

namespace App\Livewire\admin;


use App\Models\User;
use Livewire\Component;

class ProfileVerificationComponent extends Component
{

    public function render()
    {
        $requests = User::where('verification_status', 'pending')->get();
        return view('livewire.admin.profileverification', compact('requests'))->extends('layouts.auth');
    }

    public function verify($id)
    {
        $verification = User::findOrFail($id);
        $verification->update(['verification_status' => 'verified']);

        if ($verification) {
            $verification->update(['verification_status' => 'verified']);
            $verification->update(['is_verified' => 1]);
        }

        session()->flash('success', 'CNIC verified successfully.');
    }

    public function reject($id)
    {
        dd();
        $verification = User::findOrFail($id);
        $verification->update(['verification_status' => 'rejected']);

        session()->flash('error', 'CNIC verification request rejected.');
    }


}
