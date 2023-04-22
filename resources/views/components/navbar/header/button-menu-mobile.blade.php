<div class="flex lg:hidden">
    {{-- alterna o valor de fechado e aberto --}}
    <button type="button" id="btn-menu-mobile"
        class="text-gray-500 hover:text-gray-600 focus:text-gray-600 focus:outline-none dark:text-gray-200 dark:hover:text-gray-400 dark:focus:text-gray-400"
        aria-label="toggle menu">

        {{-- se estiver fechado --}}
        <span id="icon-btn-menu-mobile-close">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16"></path>
            </svg>
        </span>

        {{-- se estiver aberto --}}
        <span id="icon-btn-menu-mobile-open" class="hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </span>
    </button>
</div>
