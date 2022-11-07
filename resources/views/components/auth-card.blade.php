<div  {!! $attributes->merge(['class' => 'relative min-h-screen bg-gray-900 flex flex-col sm:justify-center items-center pt-6 sm:pt-0']) !!} >
    <div class="absolute  top-1/4  align-middle bg-primary/50 rounded-full h-1/2 w-1/4 filter blur-[80px]"></div>


    <div class="z-10 ">
        {{ $logo }}
    </div>

    <div class="w-full z-10 sm:max-w-md mt-6 px-6 py-4 bg-gray-900 text-gray-400  border border-gray-800  overflow-hidden sm:rounded-lg">
        {{ $slot }}
        <div class="">

        </div>
    </div>
</div>
