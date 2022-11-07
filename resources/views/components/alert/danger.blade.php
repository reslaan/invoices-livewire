@if (session()->has('message'))
<div class="alert pt-10 fixed inset-0 z-10  flex justify-center items-top">
    <div class="relative overflow-hidden transition ease-out duration-300 bg-red-500  shadow  rounded-lg w-1/2  sm:w-1/3 h-16  py-5 px-6 mb-3 font-bold text-base text-white inline-flex items-center "
        role="alert">
        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle"
            class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor"
                d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
            </path>
        </svg>
        {{ session('message') }}
        <div class=" progress-bar transition-all ease-in-out  duration-[2300ms] absolute bottom-0 inset-x-0 w-full h-1.5   bg-inherit brightness-50"></div>
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
