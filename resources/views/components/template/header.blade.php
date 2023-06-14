<header class="p-4 flex justify-between items-center border-b border-gray-400 border-opacity-30 dark:border-opacity-10 bg-gray-200 dark:bg-gray-900">
    <x-navbar-dashboard.header.brand>
        <a class="text-2xl font-bold cursor-pointer lg:text-3xl text-lime-600 hover:text-lime-800 dark:text-lime-400 dark:hover:text-lime-600"
            target="_blank">
            App Coleta
        </a>
    </x-navbar-dashboard.header.brand>

    <div>
        <button id="menu-toggle" class="focus:outline-none">
            <svg class="h-6 w-6 text-lime-600 hover:text-lime-800 dark:text-lime-400 dark:hover:text-lime-600" viewBox="0 0 24 24">
                <path
                    d="M4 6h16M4 12h16M4 18h16"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
            </svg>
        </button>
    </div>

    {{-- <x-navbar-dashboard.header.button text="Sair" /> --}}
</header>
