@props(['submit'])

<div {{ $attributes->merge(['class' => '']) }}>

    <div class="mt-5">
        <form wire:submit="{{ $submit }}">
                <div >
                    {{ $form }}
                </div>

            @if (isset($actions))
                    {{ $actions }}
            @endif
        </form>
    </div>
</div>
