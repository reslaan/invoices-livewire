<div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <!--
      Background backdrop, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100"
        To: "opacity-0"
    -->
    <div class="fixed inset-0 bg-gray-800/50 transition-opacity"></div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
      <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
              <div class=" mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                <!-- Heroicon name: outline/exclamation-triangle -->
                <x-icon.error></x-icon.error>
              </div>
              <div class="mt-3 text-center sm:mt-0 ltr:sm:ml-4 rtl:sm:mr-4 ltr:sm:text-left rtl:sm:text-right">
                <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">{{$title}}</h3>
                <div class="mt-2">
                  <p class="text-sm text-gray-500">{{$content}}</p>
                </div>
              </div>
            </div>
          </div>

          <div class="bg-gray-50 px-4 py-3  sm:flex sm:flex-row justify-end space-y-2 sm:space-y-0 sm:space-x-4 rtl:space-x-reverse sm:px-6">
            {{$footer}}

          </div>
        </div>
      </div>
    </div>
  </div>
