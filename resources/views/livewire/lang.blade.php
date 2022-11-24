<div>

    <button wire:click="setLang" class="flex items-center active:translate-y-px text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">

        @if (app()->getLocale() == 'ar')
        <x-icon.english></x-icon.english>
        @else
        <x-icon.arabic></x-icon.arabic>
        @endif

      {{-- <img src="{{  app()->getLocale() == 'ar' ? asset('img/english.svg') : asset('img/arabic.svg')}}  " class="w-5 h-5" alt=""> --}}
    </button>
</div>
