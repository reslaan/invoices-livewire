<header class="bg-white dark:bg-gray-700  shadow dark:shadow-gray-600">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex  sm:flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-300 leading-tight">
                {{ $title }}
            </h2>
            {{$slot}}
        </div>
    </div>
</header>
