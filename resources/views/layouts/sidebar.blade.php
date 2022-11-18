<aside :class="openSide ? 'w-64 ' : 'w-0 ltr:-ml-20 rtl:-mr-20 ltr:sm:-ml-0 rtl:sm:-mr-0 sm:w-20'"     class="fixed  transition-all  z-20  duration-500  min-h-screen  bg-gray-900 text-white">
    <div class="px-6 pt-8">
        <div class="flex items-center justify-between">
            <a href="#" class="flex items-center justify-center rounded bg-primary p-1.5 px-2"><i
                    class="bi-layers"></i></a>
            <button x-on:click="openSide = !openSide" :class="!openSide ?   'rotate-180 ltr:ml-4 rtl:mr-4 ltr:sm:ml-3 rtl:sm:mr-3' : ''" id="sidebarBtn"
                class="rounded bg-gray-700 px-1 transition duration-500"><i class="bi-arrow-left"></i></button>
        </div>
    </div>

    <div class="px-6 pt-4">
        <hr class="border-gray-700" />
    </div>
    <div class="px-6 pt-4">
        <ul class="flex flex-col space-y-2 text-gray-500">
            <x-sidebar.item>
                <x-sidebar.link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                   <x-icon.dashboard></x-icon.dashboard>  <span x-show="openSide">{{ __('Dashboard') }}</span>
                </x-sidebar.link>
            </x-sidebar.item>



            <li class="rounded">
                <x-sidebar.dropdown>
                    <x-slot name="icon">
                        <x-icon.file></x-icon.file>
                    </x-slot>
                    <x-slot name="trigger">
                        Sales
                    </x-slot>


                    <x-sidebar.item>
                        <x-sidebar.link :href="route('invoices')"  :active="request()->routeIs('invoices')">
                            <span>{{ __('All') }}</span>
                        </x-sidebar.link>
                    </x-sidebar.item>
                    <x-sidebar.item>
                        <x-sidebar.link href="#">
                            <span>Categories</span>
                        </x-sidebar.link>
                    </x-sidebar.item>
                    <x-sidebar.item>
                        <x-sidebar.link href="#">
                            <span>Instructor</span>
                        </x-sidebar.link>
                    </x-sidebar.item>

                </x-sidebar.dropdown>
            </li>
            <li class="rounded">
                <x-sidebar.dropdown>
                    <x-slot name="icon">
                        <x-icon.tv></x-icon.tv>
                    </x-slot>
                    <x-slot name="trigger">
                        POS
                    </x-slot>


                    <x-sidebar.item>
                        <x-sidebar.link :href="route('invoices')"  :active="request()->routeIs('invoices')">
                            <span>{{ __('All') }}</span>
                        </x-sidebar.link>
                    </x-sidebar.item>
                    <x-sidebar.item>
                        <x-sidebar.link href="#">
                            <span>Categories</span>
                        </x-sidebar.link>
                    </x-sidebar.item>
                    <x-sidebar.item>
                        <x-sidebar.link href="#">
                            <span>Instructor</span>
                        </x-sidebar.link>
                    </x-sidebar.item>

                </x-sidebar.dropdown>
            </li>
            <li class="rounded">
                <x-sidebar.dropdown>
                    <x-slot name="icon">
                        <x-icon.user></x-icon.user>
                    </x-slot>
                    <x-slot name="trigger">
                        Customers
                    </x-slot>


                    <x-sidebar.item>
                        <x-sidebar.link :href="route('invoices')"  :active="request()->routeIs('invoices')">
                            <span>{{ __('Manage Customers') }}</span>
                        </x-sidebar.link>
                    </x-sidebar.item>
                    <x-sidebar.item>
                        <x-sidebar.link href="#">
                            <span>Customers settings</span>
                        </x-sidebar.link>
                    </x-sidebar.item>


                </x-sidebar.dropdown>
            </li>
            <li class="rounded">
                <x-sidebar.dropdown>
                    <x-slot name="icon">
                        <x-icon.cube></x-icon.cube>
                    </x-slot>
                    <x-slot name="trigger">
                        stocked
                    </x-slot>


                    <x-sidebar.item>
                        <x-sidebar.link :href="route('invoices')"  :active="request()->routeIs('invoices')">
                            <span>{{ __('Manage stocked') }}</span>
                        </x-sidebar.link>
                    </x-sidebar.item>
                    <x-sidebar.item>
                        <x-sidebar.link href="#">
                            <span>stocked settings</span>
                        </x-sidebar.link>
                    </x-sidebar.item>


                </x-sidebar.dropdown>
            </li>
            <li class="rounded">
                <x-sidebar.dropdown>
                    <x-slot name="icon">
                        <x-icon.truck></x-icon.truck>
                    </x-slot>
                    <x-slot name="trigger">
                        Purchases
                    </x-slot>


                    <x-sidebar.item>
                        <x-sidebar.link :href="route('invoices')"  :active="request()->routeIs('invoices')">
                            <span>{{ __('Manage stocked') }}</span>
                        </x-sidebar.link>
                    </x-sidebar.item>
                    <x-sidebar.item>
                        <x-sidebar.link href="#">
                            <span>stocked settings</span>
                        </x-sidebar.link>
                    </x-sidebar.item>


                </x-sidebar.dropdown>
            </li>
            <li class="rounded">
                <x-sidebar.dropdown>
                    <x-slot name="icon">
                        <x-icon.cash></x-icon.cash>
                    </x-slot>
                    <x-slot name="trigger">
                        Finance
                    </x-slot>


                    <x-sidebar.item>
                        <x-sidebar.link :href="route('invoices')"  :active="request()->routeIs('invoices')">
                            <span>{{ __('Manage stocked') }}</span>
                        </x-sidebar.link>
                    </x-sidebar.item>
                    <x-sidebar.item>
                        <x-sidebar.link href="#">
                            <span>stocked settings</span>
                        </x-sidebar.link>
                    </x-sidebar.item>


                </x-sidebar.dropdown>
            </li>
            <x-sidebar.item>
                <x-sidebar.link :href="route('post')" :active="request()->routeIs('post')">
                    <i class="bi-layers pr-1"></i> <span x-show="openSide">{{ __('Design') }}</span>
                </x-sidebar.link>
            </x-sidebar.item>

            <x-sidebar.item>
                <x-sidebar.link href="#">
                    <i class="bi-bag pr-1"></i> <span x-show="openSide">Market & sell</span>
                </x-sidebar.link>
            </x-sidebar.item>
            <x-sidebar.item>
                <x-sidebar.link href="#">
                    <i class="bi-bar-chart-fill"></i>
                     <span
                        x-show="openSide">Reporting</span> </x-sidebar.link>
            </x-sidebar.item>
            <x-sidebar.item>
                <x-sidebar.link href="#"><i class="bi-info-circle"></i> <span x-show="openSide">Support</span>
                </x-sidebar.link>
            </x-sidebar.item>
        </ul>
    </div>
    <div class="px-6 pt-8">
        <hr class="border-gray-700" />
    </div>
    <div class="px-6 pt-4">
        <ul class="flex flex-col space-y-2 text-gray-500">
            <x-sidebar.item>
                <x-sidebar.link href="#"><i class="bi-gear"></i> <span x-show="openSide">Settings</span>
                </x-sidebar.link>
            </x-sidebar.item>
            <x-sidebar.item>
                <x-sidebar.link href="#"><i class="bi-bell"></i> <span x-show="openSide">Notifications</span>
                </x-sidebar.link>
            </x-sidebar.item>
            <x-sidebar.item>
                <x-sidebar.link href="#">
                    <i class="bi-grid"></i> <span x-show="openSide">App</span>
                </x-sidebar.link>
            </x-sidebar.item>
        </ul>
    </div>
</aside>
