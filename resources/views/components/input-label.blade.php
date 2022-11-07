@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium capitalize  text-sm ']) }}>
    {{ $value ?? $slot }}
</label>
