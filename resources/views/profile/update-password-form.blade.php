{{--<x-form-section submit="updatePassword">--}}
{{--    <x-slot name="title">--}}
{{--        {{ __('Update Password') }}--}}
{{--    </x-slot>--}}

{{--    <x-slot name="description">--}}
{{--        {{ __('Ensure your account is using a long, random password to stay secure.') }}--}}
{{--    </x-slot>--}}

{{--    <x-slot name="form">--}}
{{--        <div class="col-span-6 sm:col-span-4">--}}
{{--            <x-label for="current_password" value="{{ __('Current Password') }}"/>--}}
{{--            <x-input id="current_password" type="password" class="mt-1 block w-full" wire:model="state.current_password"--}}
{{--                     autocomplete="current-password"/>--}}
{{--            <x-input-error for="current_password" class="mt-2"/>--}}
{{--        </div>--}}

{{--        <div class="col-span-6 sm:col-span-4">--}}
{{--            <x-label for="password" value="{{ __('New Password') }}"/>--}}
{{--            <x-input id="password" type="password" class="mt-1 block w-full" wire:model="state.password"--}}
{{--                     autocomplete="new-password"/>--}}
{{--            <x-input-error for="password" class="mt-2"/>--}}
{{--        </div>--}}

{{--        <div class="col-span-6 sm:col-span-4">--}}
{{--            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}"/>--}}
{{--            <x-input id="password_confirmation" type="password" class="mt-1 block w-full"--}}
{{--                     wire:model="state.password_confirmation" autocomplete="new-password"/>--}}
{{--            <x-input-error for="password_confirmation" class="mt-2"/>--}}
{{--        </div>--}}
{{--    </x-slot>--}}

{{--    <x-slot name="actions">--}}
{{--        <x-action-message class="me-3" on="saved">--}}
{{--            {{ __('Saved.') }}--}}
{{--        </x-action-message>--}}

{{--        <x-button>--}}
{{--            {{ __('Save') }}--}}
{{--        </x-button>--}}
{{--    </x-slot>--}}
{{--</x-form-section>--}}


<div  wire:ignore.self class="tab-pane fade" id="account-change-password">
    <x-form-section  submit="updatePassword">
        <x-slot name="form">
            <div class="cd-card-body">
                <div class="mb-3">
                    <label class="form-label">Current Password</label>
                    <input type="password" class="form-control" id="current_password" wire:model="state.current_password"
                           autocomplete="current-password">
                    <x-input-error for="current_password" class="mt-2 text-danger"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">New Password</label>
                    <input type="password" id="password" class="form-control" wire:model="state.password"
                           autocomplete="new-password">
                    <x-input-error for="password" class="mt-2 text-danger"/>
                </div>

                <div class="mb-3">
                    <label class="form-label">Repeat New Password</label>
                    <input type="password" class="form-control" id="password_confirmation" wire:model="state.password_confirmation"
                           autocomplete="new-password">
                    <x-input-error for="password_confirmation" class="mt-2 text-danger"/>
                </div>
            </div>
        </x-slot>
        <div class="text-end mt-3">
            <x-slot name="actions">
                <x-action-message class="me-3 align-self-end" on="saved">
                    {{ __('Saved.') }}
                </x-action-message>
                <button class="btn btn-primary w-25 mb-5 me-3 align-self-end">
                    Save
                </button>
{{--                <x-action-message class="me-3" on="saved">--}}
{{--                    {{ __('Saved.') }}--}}
{{--                </x-action-message>--}}

{{--                <x-button class="btn btn-primary">--}}
{{--                    {{ __('Save') }}--}}
{{--                </x-button>--}}
            </x-slot>
        </div>
    </x-form-section>
</div>
