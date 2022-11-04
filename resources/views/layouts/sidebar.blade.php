<aside id="sidebar" class="transition-all -ml-16 sm:-ml-0 z-10  duration-500  min-h-screen w-64  bg-gray-900 text-white">
    <div class="px-6 pt-8">
        <div class="flex items-center justify-between">
            <a href="#" class="flex items-center justify-center rounded bg-primary p-1.5 px-2"><i
                    class="bi-layers"></i></a>
            <button id="sidebarBtn" class="rounded bg-gray-700 px-1 transition duration-500"><i
                    class="bi-arrow-left  "></i></button>
        </div>
    </div>

    <div class="px-6 pt-4">
        <hr class="border-gray-700" />
    </div>
    <div class="px-6 pt-4">
        <ul class="flex flex-col space-y-2 text-gray-500">
            <li class="rounded focus-within:text-white hover:bg-gray-800 hover:text-white">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <i class="bi-hdd-stack pr-1"></i> <span>{{ __('Dashboard') }}</span>
                </x-nav-link>
            </li>
            <li class="treeview rounded">
                <a href="#"
                    class="treeview-btn flex w-full items-center justify-between rounded py-2 px-3 text-xs hover:bg-gray-800 hover:text-white focus:bg-gray-800 focus:text-white focus:outline-none focus:ring-1 focus:ring-gray-500">
                    <div><i class="bi-file-earmark-text pr-1"></i> <span>Invoices</span> </div>
                    <i class="bi-arrow-down  transition duration-300"></i>
                </a>

                <div class="treeview-menu hidden transition-all duration-[2000ms]  pt-2 pl-4">
                    <ul class="border-l border-gray-700 pl-2 space-y-1">
                        <li class="rounded focus-within:text-white hover:bg-gray-800 hover:text-white">
                            <x-nav-link :href="route('invoices')" :active="request()->routeIs('invoices')">
                                 <span>{{ __('All') }}</span>
                            </x-nav-link>
                        </li>
                        <li class="rounded focus-within:text-white hover:bg-gray-800 hover:text-white">
                            <a href="#"
                                class="foucs:outline-none inline-block w-full rounded py-2 px-3 text-xs focus:bg-gray-800 focus:ring-1 focus:ring-gray-500">
                                <span>Categories</span> </a>
                        </li>
                        <li class="rounded focus-within:text-white hover:bg-gray-800 hover:text-white">
                            <a href="#"
                                class="foucs:outline-none inline-block w-full rounded py-2 px-3 text-xs focus:bg-gray-800 focus:ring-1 focus:ring-gray-500">
                                <span>Instructor</span> </a>
                        </li>
                        <li class="rounded focus-within:text-white hover:bg-gray-800 hover:text-white">
                            <a href="#"
                                class="foucs:outline-none inline-block w-full rounded py-2 px-3 text-xs focus:bg-gray-800 focus:ring-1 focus:ring-gray-500">
                                <span>Video Library</span> </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="rounded focus-within:text-white hover:bg-gray-800 hover:text-white">
                <x-nav-link :href="route('post')" :active="request()->routeIs('post')">
                    <i class="bi-layers pr-1"></i> <span>{{ __('Design') }}</span>
                </x-nav-link>
            </li>
            <li class="rounded focus-within:text-white hover:bg-gray-800 hover:text-white">
                <a href="#"
                    class="foucs:outline-none inline-block w-full rounded py-2 px-3 text-xs focus:bg-gray-800 focus:ring-1 focus:ring-gray-500"><i
                        class="bi-bag pr-1"></i> <span>Market & sell</span> </a>
            </li>
            <li class="rounded focus-within:text-white hover:bg-gray-800 hover:text-white">
                <a href="#"
                    class="foucs:outline-none inline-block w-full rounded py-2 px-3 text-xs focus:bg-gray-800 focus:ring-1 focus:ring-gray-500"><i
                        class="bi-bar-chart-fill"></i> <span>Reporting</span> </a>
            </li>
            <li class="rounded focus-within:text-white hover:bg-gray-800 hover:text-white">
                <a href="#"
                    class="foucs:outline-none inline-block w-full rounded py-2 px-3 text-xs focus:bg-gray-800 focus:ring-1 focus:ring-gray-500"><i
                        class="bi-info-circle"></i> <span>Support</span> </a>
            </li>
        </ul>
    </div>
    <div class="px-6 pt-8">
        <hr class="border-gray-700" />
    </div>
    <div class="px-6 pt-4">
        <ul class="flex flex-col space-y-2 text-gray-500">
            <li class="rounded focus-within:text-white hover:bg-gray-800 hover:text-white">
                <a href="#"
                    class="foucs:outline-none inline-block w-full rounded py-2 px-3 text-xs focus:bg-gray-800 focus:ring-1 focus:ring-gray-500"><i
                        class="bi-gear"></i> <span>Settings</span> </a>
            </li>
            <li class="rounded focus-within:text-white hover:bg-gray-800 hover:text-white">
                <a href="#"
                    class="foucs:outline-none inline-block w-full rounded py-2 px-3 text-xs focus:bg-gray-800 focus:ring-1 focus:ring-gray-500"><i
                        class="bi-bell"></i> <span>Notifications</span> </a>
            </li>
            <li class="rounded focus-within:text-white hover:bg-gray-800 hover:text-white">
                <a href="#"
                    class="foucs:outline-none inline-block w-full rounded py-2 px-3 text-xs focus:bg-gray-800 focus:ring-1 focus:ring-gray-500"><i
                        class="bi-grid"></i> <span>App</span> </a>
            </li>
        </ul>
    </div>
</aside>
@push('script')
<script>
    const sidebarBtn = document.getElementById('sidebarBtn');
    const dropMenu = document.querySelectorAll('.treeview-btn');
    const navItems = document.querySelectorAll('li');
    const sidebar = document.getElementById('sidebar');
    const content = document.querySelector('.content');

// content.style.left = sidebar.offsetWidth +"px"

sidebarBtn.addEventListener('click', function() {
    // content.style.left = sidebar.offsetWidth +"px" ;
        this.classList.toggle('rotate-180')
        this.classList.toggle('ml-3')
        sidebar.classList.toggle('w-20')
        sidebar.classList.toggle('w-64')
        content.classList.toggle('ml-20')
        content.classList.toggle('ml-64')




        // const search = document.querySelector('input[type="search"]').parentElement
        // search.classList.toggle('hidden')
        // search.nextSibling.nextSibling.classList.toggle('hidden')
        // document.querySelector('input[type="search"]').parentElement.classList.toggle('hidden')
        navItems.forEach(e => {
            e.querySelector('a').classList.toggle('px-2.5')
            e.querySelector('span').classList.toggle('hidden')
            e.querySelector('span').classList.toggle('transition-all')
            e.querySelector('span').classList.toggle('duration-500')
        })
        dropMenu.forEach(e => {
            e.querySelector('.bi-arrow-down ').classList.toggle('hidden')
        })

    })
    dropMenu.forEach(e => {
        e.addEventListener('click', function(event) {
            event.preventDefault();
            // if(sidebar.classList.contains('w-20')){
            //     sidebar.classList.toggle('w-20')
            //     sidebar.classList.toggle('w-64')
            // }
            e.querySelector('.bi-arrow-down').classList.toggle('rotate-90')
            e.nextSibling.nextSibling.classList.toggle("hidden");
        })
        // if(sidebar.classList.contains('w-20')){
        //     e.addEventListener('mouseover',function(){
        //         e.nextSibling.nextSibling.classList.toggle('hidden')
        //     })
        // }

    })
</script>
@endpush

