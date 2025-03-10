@props(['for'])

@error($for)
    <p class="text-danger" {{ $attributes->merge(['class' => 'text-sm text-red-600']) }}>{{ $message }}</p>
@enderror
