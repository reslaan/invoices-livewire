@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md text-sm shadow-sm border-gray-300 focus:border-gray-400 focus:ring-1.5 focus:ring-gray-300  disabled:opacity-50']) !!}>
