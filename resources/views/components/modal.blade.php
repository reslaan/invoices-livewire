<div class="relative modal z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

    <div class="fixed inset-0 bg-gray-800/50  transition-opacity"></div>

    <div class="fixed transition-all duration-500 inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-start justify-center p-4 text-center sm:items-center sm:p-0">

            <div
                class="relative transform overflow-hidden rounded-lg  dark:text-white text-left shadow-xl transition-all sm:my-8 w-full sm:max-w-lg">
                @if (isset($header))
                    <div class="bg-gray-50 dark:bg-gray-800 px-4 py-3 flex sm:flex-row justify-between items-center sm:px-6">
                        <h3 class="text-lg font-medium leading-6 text-dark dark:text-white">
                            {{ $header }}
                        </h3>
                        <button type="button" wire:click="closeModal"                            class=" inline-flex w-auto justify-center  text-2xl  focus:outline-none  ">&times;</button>
                    </div>
                @endif

                <div class="bg-white dark:bg-gray-900 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        {{ $content }}
                    </div>
                </div>
                @if (isset($footer))
                    <div class="bg-gray-50 dark:bg-gray-800 px-4 py-3  sm:flex  sm:flex-row  justify-end space-y-2 sm:space-y-0 sm:space-x-4 rtl:space-x-reverse sm:px-6">
                        {{ $footer }}
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
