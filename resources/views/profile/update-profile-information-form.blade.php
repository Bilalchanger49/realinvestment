<div class="tab-pane fade show active" id="account-general">
    <x-form-section submit="updateProfileInformation">

        <x-slot name="form">
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div class="cd-card-body d-flex align-items-center">
                    <div x-data="{ photoPreview: @entangle('photoPreview') }" class="d-flex align-items-center">
                        <!-- Profile Photo Display -->
                        <div class="me-3"> <!-- Add margin to the right of the image to separate the button area -->
                            <img
                                :src="photoPreview ? photoPreview : '{{ $this->user->profile_photo_path ? asset('storage/'.$this->user->profile_photo_path) : 'https://bootdey.com/img/Content/avatar/avatar1.png' }}'"
                                alt="{{ $this->user->name }}" class="d-block ui-w-80">
                        </div>

                        <!-- Button Area (Upload & Reset) -->
                        <div class="ms-4">
                            <!-- Upload New Photo Button -->
                            <label class="btn btn-base m-0">
                                Upload new photo
                                <input type="file" class="account-settings-fileinput"
                                       wire:model.live="photo"
                                       x-ref="photo"
                                       x-on:change="
                       photoName = $refs.photo.files[0].name;
                       const reader = new FileReader();
                       reader.onload = (e) => {
                           photoPreview = e.target.result;  // Update preview
                       };
                       reader.readAsDataURL($refs.photo.files[0]);
                   ">
                            </label> &nbsp;

                            <!-- Reset Button (if photo exists) -->
                            @if ($this->user->profile_photo_path)
                                <button type="button" class="btn btn-secondary" wire:click="deleteProfilePhoto">
                                    Reset
                                </button>
                            @endif
                            <x-input-error for="photo" class="mt-2"/>
                        </div>
                    </div>

                </div>
            @endif
            <hr class="border-light m-0">
            <div class="cd-card-body">
                <div class="mb-3">
                    <label class="form-label">Verification Status</label>
                    <div>
                        @if ($this->user->is_verified)
                            <span class="badge bg-success">Verified</span>
                        @else
                            <span class="badge bg-warning">Unverified</span>
                        @endif
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" wire:model="state.name">
                    <x-input-error for="name" class="mt-2"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">CNIC</label>
                    <input type="text" class="form-control" wire:model.defer="state.cnic">
                    <x-input-error for="cnic" class="mt-2"/>
                </div>

                <div class="mb-3">
                    <label class="form-label">NIC Front Image:</label>
                    <div class="me-3 d-flex">

                    <img src="{{asset('storage/'.$this->user->nic_front)}}"
                         alt="{{ $this->user->name }}" class="d-block ui-w-80">
                    <input type="file" name="nic_front" accept="image/*" class="form-control nic-input" wire:model="state.nic_front">
                    <x-input-error for="nic_front" class="mt-2"/>
                        <img src="{{asset('storage/'.$this->user->nic_front)}}"
                             alt="{{ $this->user->name }}" class="d-block ui-w-80">
                        <input type="file" name="nic_front" accept="image/*" class="form-control"
                               wire:model="state.nic_front">
                        <x-input-error for="nic_front" class="mt-2"/>

                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">NIC Back Image:</label>
                    <div class="me-3 d-flex">
                        <img src="{{asset('storage/'.$this->user->nic_back)}}"
                             alt="{{ $this->user->name }}" class="d-block ui-w-80">


                    <input type="file" name="nic_back" accept="image/*" class="form-control nic-input" wire:model="state.nic_back">
                    <x-input-error for="nic_back" class="mt-2"/>

                        <input type="file" name="nic_back" accept="image/*" class="form-control"
                               wire:model="state.nic_back" >
                        <x-input-error for="nic_back" class="mt-2"/>

                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">E-mail</label>
                    <input type="text" class="form-control" wire:model="state.email" autocomplete="username">
                    <x-input-error for="email" class="mt-2"/>
                </div>

                <div class="mb-3">
                    <div class="card">
                        <div class="card-header">Digital Signature Form</div>
                        <div class="card-body">

                            @if(session('alert-success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('alert-success') }}
                                </div>
                            @endif

                                <div x-data="signaturePad()" class="p-4">
                                    <div>
                                        <canvas x-ref="signature_canvas" class="border rounded shadow"></canvas>
                                    </div>

                                    <!-- Hidden input for Livewire binding -->
                                    <input type="hidden" wire:model.defer="state.signature" x-ref="signature_input"
                                           @change="$wire.set('state.signature', $event.target.value)">
                                    <x-input-error for="signature" class="mt-2"/>

                                </div>
                        </div>
                    </div>
                </div>


                <div class="mb-3">

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
                <x-action-message class="me-3 align-self-end" on="saved">
                    {{ __('Saved.') }}
                </x-action-message>
                <button class="btn btn-primary w-25 mb-5 me-3 align-self-end"  wire:loading.attr="disabled"
                        wire:target="photo">
                    Save
                </button>
            </x-slot>
        </div>

    </x-form-section>
</div>
