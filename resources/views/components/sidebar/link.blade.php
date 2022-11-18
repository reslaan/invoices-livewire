@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center space-x-1  inline-block w-full rounded  text-xs font-medium leading-5 text-white focus:outline-none bg-gray-800  transition duration-150 ease-in-out'
            : 'flex items-center space-x-1 inline-block w-full rounded  text-xs font-medium leading-5 focus:outline-none focus:bg-gray-800 focus:ring-1 focus:ring-gray-500 transition duration-150 ease-in-out';
@endphp

<a :class="!openSide ? ' justify-center  p-1.5':'py-2 px-3 rtl:space-x-reverse'"  {{ $attributes->merge(['class' => $classes])  }}>
    {{ $slot }}
</a>
