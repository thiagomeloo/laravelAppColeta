@extends('layouts.app')

@section('content')
    <x-navbar-dashboard>
        <x-navbar-dashboard.header>
            <x-slot:contentLeft>
                <x-navbar-dashboard.header.brand>
                    <a class="text-2xl font-bold cursor-pointer lg:text-3xl text-lime-600 hover:text-lime-800 dark:text-lime-400 dark:hover:text-lime-600"
                        target="_blank">
                        App Coleta
                    </a>
                </x-navbar-dashboard.header.brand>
            </x-slot:contentLeft>
            <x-slot:contentRight>
                <x-navbar-dashboard.header.button text="Sair" />
            </x-slot:contentRight>
        </x-navbar-dashboard.header>

        <x-navbar-dashboard.body>
            <x-slot:leftBar>
                <x-navbar-dashboard.body.button-menu-mobile />
                <x-navbar-dashboard.body.menu>
                    <x-navbar-dashboard.body.menu.item text="Mapa" classIcon="fa-solid fa-map" />
                    <x-navbar-dashboard.body.menu.item text="Explorar" classIcon="fa-solid fa-magnifying-glass" />
                    <x-navbar-dashboard.body.menu.item text="Meus Eventos" classIcon="fa-solid fa-house-flag" />
                </x-navbar-dashboard.body.menu>
            </x-slot:leftBar>

            <x-slot:content>
                @yield('contentDashboard')
            </x-slot:content>
        </x-navbar-dashboard.body>
    </x-navbar-dashboard>

    @yield('scripts')
    @vite('resources/js/components/blade/navbar-dashboard/index.js')
@endsection
