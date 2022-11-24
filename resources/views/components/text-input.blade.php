@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['type'=>'text','class' => 'w-full rounded-md  text-sm shadow-sm dark:bg-gray-800 dark:text-gray-300  border-gray-300 dark:border-gray-600 focus:border-gray-400 dark:focus:border-gray-500 focus:ring-1.5 focus:ring-gray-300 dark:focus:ring-gray-800  disabled:opacity-50']) !!}>
