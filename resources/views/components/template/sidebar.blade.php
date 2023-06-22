<aside class="h-screen pt-4 fixed md:static bg-gray-200 dark:bg-gray-900 border-0 border-r border-gray-400 border-opacity-30 dark:border-opacity-10 z-50">
    <div class="flex flex-col h-full justify-between px-4">
        <ul class="space-y-4">
            <li class="flex items-center {{ getThemeColors()?->primary?->link ?? '' }} w-full">
                <x-navbar-dashboard.body.menu.item text="Mapa" classIcon="fa-solid fa-map"
                    url="{{ route('dashboard.map.index') }}" />
            </li>
            <li class="flex items-center {{ getThemeColors()?->primary?->link ?? '' }} w-full">
                <x-navbar-dashboard.body.menu.item text="Explorar" classIcon="fa-solid fa-magnifying-glass"
                    url="{{ route('dashboard.explore.index') }}" />
            </li>
            <li class="flex items-center {{ getThemeColors()?->primary?->link ?? '' }} w-full">
                <x-navbar-dashboard.body.menu.item text="Meus Eventos" classIcon="fa-solid fa-house-flag"
                    url="{{ route('dashboard.events.myEvents') }}" />
            </li>
        </ul>

        <div class="mb-20">
            <x-navbar-dashboard.header.button text="Sair" />
        </div>
    </div>

</aside>

