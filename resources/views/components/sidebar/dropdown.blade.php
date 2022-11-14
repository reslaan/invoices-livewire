<div x-data="{ openMenu: false }">

    <button @click="openMenu=!openMenu" :class="!openSide ? 'justify-center':' justify-between'"
        class=" flex w-full items-center  rounded py-2 px-3 text-xs hover:bg-gray-800 hover:text-white focus:bg-gray-800 focus:text-white focus:outline-none focus:ring-1 focus:ring-gray-500">
        <div class="flex items-center  space-x-1">
            @if (isset($icon))
                {{ $icon }}
            @endif

            <span x-show="openSide"> {{ $trigger }}</span>
        </div>

        <x-icon.chevron-down x-bind:class="openMenu ? 'rotate-90' : ''"  class="transition"></x-icon.chevron-down>
    </button>

    <div x-show="openMenu" @click.outside="openMenu = false" x-transition class="transition pt-2 pl-4">
        <ul class="border-l border-gray-700 pl-2 space-y-1 ">
        {{ $slot }}
        </ul>
    </div>

</div>