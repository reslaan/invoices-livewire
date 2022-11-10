@props(['loading' => false])

<button  {{ $attributes->merge(['type' => 'submit', 'class' => ' inline-flex justify-center items-center px-4 py-2 bg-gray-800 hover:bg-gray-700 active:bg-gray-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest  focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 active:translate-y-px disabled:opacity-25 transition ease-in-out duration-150'])  }}>

    @if ($loading && $target = $attributes->wire('click')->value())

      <span wire:loading.remove wire:target="{{$target}}">{{$slot}}</span>
      <span wire:loading   wire:target="{{$target}}">{{$loading}}</span>

      @else
      {{$slot}}

    @endif

</button>
