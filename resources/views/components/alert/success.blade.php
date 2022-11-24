@if (session()->has('message'))
    <div class="alert pt-10 fixed inset-0 z-10  flex justify-center items-top">
        <div class="relative overflow-hidden transition ease-out duration-300 bg-green-500  shadow  rounded-lg w-1/2  sm:w-1/3 h-16  py-5 px-6 mb-3 font-bold text-base text-white inline-flex items-center "
            role="alert">
            <x-icon.success></x-icon.success>
            {{ session('message') }}
            <div
                class=" progress-bar transition-all ease-in-out  duration-[2300ms] absolute bottom-0 inset-x-0 w-full h-1.5   bg-inherit brightness-50">
            </div>
        </div>
    </div>

    <script>
        const bar = document.querySelector('.progress-bar')


        setTimeout(() => {
            bar.classList.add('w-0');
        }, 100);
        setTimeout(() => {
            document.querySelector('.alert').classList.add("hidden")
        }, 2300);
    </script>
@endif
