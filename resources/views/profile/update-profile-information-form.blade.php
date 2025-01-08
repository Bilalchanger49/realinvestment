{{--<x-form-section submit="updateProfileInformation">--}}
{{--    <x-slot name="title">--}}
{{--        {{ __('Profile Information') }}--}}
{{--    </x-slot>--}}

{{--    <x-slot name="description">--}}
{{--        {{ __('Update your account\'s profile information and email address.') }}--}}
{{--    </x-slot>--}}

{{--    <x-slot name="form">--}}
{{--        <!-- Profile Photo -->--}}
{{--        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())--}}
{{--            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">--}}
{{--                <!-- Profile Photo File Input -->--}}
{{--                <input type="file" id="photo" class="hidden"--}}
{{--                            wire:model.live="photo"--}}
{{--                            x-ref="photo"--}}
{{--                            x-on:change="--}}
{{--                                    photoName = $refs.photo.files[0].name;--}}
{{--                                    const reader = new FileReader();--}}
{{--                                    reader.onload = (e) => {--}}
{{--                                        photoPreview = e.target.result;--}}
{{--                                    };--}}
{{--                                    reader.readAsDataURL($refs.photo.files[0]);--}}
{{--                            " />--}}

{{--                <x-label for="photo" value="{{ __('Photo') }}" />--}}

{{--                <!-- Current Profile Photo -->--}}
{{--                <div class="mt-2" x-show="! photoPreview">--}}
{{--                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">--}}
{{--                </div>--}}

{{--                <!-- New Profile Photo Preview -->--}}
{{--                <div class="mt-2" x-show="photoPreview" style="display: none;">--}}
{{--                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"--}}
{{--                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">--}}
{{--                    </span>--}}
{{--                </div>--}}

{{--                <x-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">--}}
{{--                    {{ __('Select A New Photo') }}--}}
{{--                </x-secondary-button>--}}

{{--                @if ($this->user->profile_photo_path)--}}
{{--                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">--}}
{{--                        {{ __('Remove Photo') }}--}}
{{--                    </x-secondary-button>--}}
{{--                @endif--}}

{{--                <x-input-error for="photo" class="mt-2" />--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <!-- Name -->--}}
{{--        <div class="col-span-6 sm:col-span-4">--}}
{{--            <x-label for="name" value="{{ __('Name') }}" />--}}
{{--            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" required autocomplete="name" />--}}
{{--            <x-input-error for="name" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Email -->--}}
{{--        <div class="col-span-6 sm:col-span-4">--}}
{{--            <x-label for="email" value="{{ __('Email') }}" />--}}
{{--            <x-input id="email" type="email" class="mt-1 block w-full" wire:model="state.email" required autocomplete="username" />--}}
{{--            <x-input-error for="email" class="mt-2" />--}}

{{--            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())--}}
{{--                <p class="text-sm mt-2">--}}
{{--                    {{ __('Your email address is unverified.') }}--}}

{{--                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" wire:click.prevent="sendEmailVerification">--}}
{{--                        {{ __('Click here to re-send the verification email.') }}--}}
{{--                    </button>--}}
{{--                </p>--}}

{{--                @if ($this->verificationLinkSent)--}}
{{--                    <p class="mt-2 font-medium text-sm text-green-600">--}}
{{--                        {{ __('A new verification link has been sent to your email address.') }}--}}
{{--                    </p>--}}
{{--                @endif--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    </x-slot>--}}

{{--    <x-slot name="actions">--}}
{{--        <x-action-message class="me-3" on="saved">--}}
{{--            {{ __('Saved.') }}--}}
{{--        </x-action-message>--}}

{{--        <x-button wire:loading.attr="disabled" wire:target="photo">--}}
{{--            {{ __('Save') }}--}}
{{--        </x-button>--}}
{{--    </x-slot>--}}
{{--</x-form-section>--}}


<div class="tab-pane fade show active" id="account-general">
    <x-form-section submit="updateProfileInformation">

        <x-slot name="form">
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div class="cd-card-body d-flex align-items-center">
                    @if($this->user->profile_photo_path)
                    <img  src="{{asset('storage/'. $this->user->profile_photo_path )}}"  alt="{{ $this->user->name }}"
                          class="d-block ui-w-80">
                    @else
                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="{{ $this->user->name }}"
                             class="d-block ui-w-80">
                    @endif
                    <div class="ms-4">

                        <label class="btn btn-outline-primary">
                            Upload new photo
                            <input type="file" class="account-settings-fileinput"
                                   wire:model.live="photo"
                                   x-ref="photo"
                                   x-on:change="
                                       photoName = $refs.photo.files[0].name;
                                       const reader = new FileReader();
                                       reader.onload = (e) => {
                                       photoPreview = e.target.result;
                                       };
                                       reader.readAsDataURL($refs.photo.files[0]);
                                  ">
                        </label> &nbsp;

                        @if ($this->user->profile_photo_path)
                            <button type="button" class="btn btn-secondary" wire:click="deleteProfilePhoto">Reset
                            </button>
                        @endif
                        <x-input-error for="photo" class="mt-2"/>
                    </div>
                </div>
            @endif
            <hr class="border-light m-0">
            <div class="cd-card-body">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" wire:model="state.name">
                    <x-input-error for="name" class="mt-2"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">E-mail</label>
                    <input type="text" class="form-control" wire:model="state.email" autocomplete="username">
                    <x-input-error for="email" class="mt-2"/>

                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                        <div class="alert alert-warning mt-3">
                            {{ __('Your email address is unverified.') }}

                            <button type="button"
                                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    wire:click.prevent="sendEmailVerification">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </div>

                        @if ($this->verificationLinkSent)
                            <p class="mt-2 font-medium text-sm text-green-600">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    @endif
                </div>

            </div>

        </x-slot>
        <div class="text-end mt-3">
            <x-slot name="actions">
                <x-action-message class="me-3" on="saved">
                    {{ __('Saved.') }}
                </x-action-message>
                {{--                <button type="button" class="btn btn-primary" wire:loading.attr="disabled" wire:target="photo">--}}
                {{--                    Save changes--}}
                {{--                </button>--}}
                <x-button class="btn btn-primary" wire:loading.attr="disabled" wire:target="photo">
                    {{ __('Save') }}
                </x-button>
            </x-slot>
        </div>
    </x-form-section>
</div>
