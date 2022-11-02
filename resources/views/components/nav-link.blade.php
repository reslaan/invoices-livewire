@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-block w-full rounded py-2 px-3 text-xs font-medium leading-5 text-white focus:outline-none bg-gray-800  transition duration-150 ease-in-out'
            : 'inline-block w-full rounded py-2 px-3 text-xs font-medium leading-5 focus:outline-none focus:bg-gray-800 focus:ring-1 focus:ring-gray-500 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>


{{-- foucs:outline-none inline-block w-full rounded py-2 px-3 text-xs focus:bg-gray-800 focus:ring-1 focus:ring-gray-500 --}}
