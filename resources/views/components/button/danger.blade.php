@props(['loading' => false])
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex justify-center items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    @if ($loading && $target = $attributes->wire('click')->value())

    <span wire:loading.remove wire:target="{{$target}}">{{$slot}}</span>
    <span wire:loading   wire:target="{{$target}}">{{$loading}}</span>

    @else
    {{$slot}}

  @endif
</button>
