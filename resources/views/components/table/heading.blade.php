{{-- <th {{$attributes->merge(['class' => 'py-4 leading-4 tracking-wider'])}}>
{{$slot}}
</th> --}}

@props([
    'sortable' => null,
    'direction' => null,
])

<th {{ $attributes->merge(['class' => 'capitalize text-sm  sm:text-md py-4 ']) }}>

    @unless($sortable)
        {{ $slot }}

    @else
        <button  class="group mx-auto flex justify-center items-center  space-x-px leading-4 ">
            <span>{{ $slot }}</span>
            <span class="">
                @if ($direction === 'asc')
                <x-icon.chevron-up ></x-icon.chevron-up>
                @elseif ($direction === 'desc')
                <x-icon.chevron-down ></x-icon.chevron-down>
                @else
                <x-icon.chevron-up class="opacity-0 group-hover:opacity-100 transition-opacity duration-300"></x-icon.chevron-up>
                @endif
            </span>
        </button>
    @endunless

</th>
