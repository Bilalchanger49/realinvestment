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
     * @param array<string, mixed> $input
     */

    public function update(User $user, array $input)
    {
        $validator = Validator::make($input, [
            'name' => ['required', 'string', 'max:255', 'regex:/^[A-Za-z\s]+$/'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'cnic' => ['required', 'string', 'size:15', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'nic_front' => ['nullable'],
            'nic_back' => ['nullable'],
            'signature' => ['nullable'],
            'stripe_account_id' => ['nullable'],
        ])->validateWithBag('updateProfileInformation');

        $base64Image = preg_replace('/^data:image\/\w+;base64,/', '', $validator['signature']);
        $imageData = base64_decode($base64Image);

        $filename = 'signature_' . time() . '.png';
        $fileWithPath = 'signatures/' . $filename; // Store in 'public/images/signatures/'

        Storage::disk('public')->put($fileWithPath, $imageData);
        $imageUrl = asset('storage/' . $fileWithPath);


        if (isset($input['signature'])) {
            $user->signature = $fileWithPath; // Store signature
        }

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if (isset($input['nic_front']) && $input['nic_front'] instanceof \Illuminate\Http\UploadedFile) {
            $this->deleteOldFile($user->nic_front);
            $user->nic_front = $input['nic_front']->store('nic_photos/front/', 'public');
        }

        if (isset($input['nic_back']) && $input['nic_back'] instanceof \Illuminate\Http\UploadedFile) {
            $this->deleteOldFile($user->nic_back);
            $user->nic_back = $input['nic_back']->store('nic_photos/back/', 'public');
        }



        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $isVerified = $user->hasVerifiedEmail()
                ? $this->verifyCNIC($input['name'], $input['email'],$input['cnic'], $user->nic_front, $user->nic_back)
                : false;

            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'cnic' => $input['cnic'],
                'stripe_account_id' => $input['stripe_account_id'],
                'is_verified' => $isVerified,
                'signature' => $user->signature,
            ])->save();
        }

        return redirect()->route('profile.show');
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param array<string, string> $input
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


    protected function verifyCNIC(string $name, string $email, string $cnic, string $nicFront, string $nicBack): bool
    {
        $user = User::where('email', $email)->first(); // Find user by CNIC

        if ($user) {
            $user->update([
                'name' => $name,
                'email' => $email,
                'cnic' => $cnic,
                'nic_front' => $nicFront,
                'nic_back' => $nicBack,
                'verification_status' => 'pending',
            ]);
        } else {

            return false;
        }


        return false;
    }
}
