<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, mixed>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'cnic' => ['required', 'string', 'size:13', Rule::unique('users')->ignore($user->id)], // 13-digit CNIC
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'nic_front' => ['required', 'mimes:jpg,jpeg,png', 'max:2048'],
            'nic_back' => ['required', 'mimes:jpg,jpeg,png', 'max:2048'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }
        if (isset($input['nic_front'])) {
            $this->deleteOldFile($user->nic_front);
            $user->nic_front = $input['nic_front']->store('nic_photos/front/', 'public');
        }

        if (isset($input['nic_back'])) {
            $this->deleteOldFile($user->nic_back);
            $user->nic_back = $input['nic_back']->store('nic_photos/back/', 'public');
        }


        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $isVerified = $user->hasVerifiedEmail()
                ? $this->verifyCNIC($input['cnic'], $user->nic_front, $user->nic_back)
                : false;

            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'cnic' => $input['cnic'],
                'is_verified' => $isVerified, // Only verify if email is verified
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'cnic' => $input['cnic'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }

    private function deleteOldFile(?string $filePath): void
    {
        if ($filePath && Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
        }
    }

    protected function verifyCNIC(string $cnic, string $nicFront, string $nicBack): bool
    {
        // Implement OCR-based CNIC verification (this is just a placeholder)
        return true;
    }
}
