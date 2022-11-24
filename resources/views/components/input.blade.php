@props([
    'disabled' => false,
    'label' => false,
    'error' => false,
    'target' => $attributes->wire('model')->value(),
])
<div class="rtl:text-right">
    @if ($label)
        <label for={{ $target }} class='block font-medium capitalize  text-sm '>
            {{ $label }}
        </label>
    @endif

    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
        'type' => 'text',
        'id' => $target,
        'class' =>
            'w-full rounded-md text-sm shadow-sm dark:bg-gray-800 dark:text-gray-300 border-gray-300 dark:border-gray-500 focus:border-gray-400 dark:focus:border-gray-500 focus:ring-1.5 focus:ring-gray-300 dark:focus:ring-gray-800 disabled:opacity-50',
    ]) !!}>


    @if ($error)
        @error($target)
            <span class="text-sm t text-danger">{{ $message }}</span>
        @enderror
    @endif
</div>
