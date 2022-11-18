@props([
    'disabled' => false,
    'label' => false,
    'error' => false,
    'target' => $attributes->wire('model')->value(),
])
<div>
    @if ($label)
        <label for={{ $target }} class='block font-medium capitalize  text-sm rtl:text-right'>
            {{ $label }}
        </label>
    @endif

    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
        'type' => 'text',
        'id' => $target,
        'class' =>
            'w-full rounded-md text-sm shadow-sm border-gray-300 focus:border-gray-400 focus:ring-1.5 focus:ring-gray-300  disabled:opacity-50',
    ]) !!}>


    @if ($error)
        @error($target)
            <span class="text-sm text-danger">{{ $message }}</span>
        @enderror
    @endif
</div>
