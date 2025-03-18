<?php

namespace App\Livewire\admin;


use App\Models\User;
use App\Notifications\ProfileVerificationResponseNotification;
use Livewire\Component;

class ProfileVerificationComponent extends Component
{
    public $rejectionReason;
    public $userId;

    public function openRejectionPopup($userId)
    {
        $this->userId = $userId;
    }
    public function render()
    {
        $requests = User::where('verification_status', 'pending')->get();
        return view('livewire.admin.profileverification', compact('requests'))->extends('layouts.auth');
    }

    public function verify($id)
    {
        $verification = User::findOrFail($id);

        if ($verification) {
            $verification->update(['verification_status' => 'verified']);
            $verification->update(['is_verified' => 1]);
        }

        session()->flash('success', 'CNIC verified successfully.');
        return redirect()->route('admin.profile.verification');
    }

    public function reject($id)
    {
        $verification = User::findOrFail($this->userId);
//        dd($this->rejectionReason);
        $verification->update(['verification_status' => 'rejected']);

        $verification->notify(new ProfileVerificationResponseNotification( $this->rejectionReason));

        session()->flash('success', 'CNIC verification request rejected.');
        return redirect()->route('admin.profile.verification');
    }


}
