<div id="mobile-menu"
    class="absolute inset-x-0 z-20 w-full bg-white px-6 py-4 shadow-md transition-all duration-300 ease-in-out dark:bg-gray-900 lg:relative lg:top-0 lg:mt-0 lg:flex lg:w-auto lg:translate-x-0 lg:items-center lg:bg-transparent lg:p-0 lg:opacity-100 lg:shadow-none lg:dark:bg-transparent opacity-0 -translate-x-full">
    <div class="flex flex-col space-y-4 lg:mt-0 lg:flex-row lg:space-y-0">
        {{ $items ?? '' }}
    </div>

    {{ $buttons ?? '' }}
</div>
