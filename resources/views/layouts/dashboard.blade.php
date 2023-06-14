@extends('layouts.app')

@section('content')
    {{-- <x-navbar-dashboard>
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
                    <x-navbar-dashboard.body.menu.item text="Mapa" classIcon="fa-solid fa-map"
                        url="{{ route('dashboard.map.index') }}" />
                    <x-navbar-dashboard.body.menu.item text="Explorar" classIcon="fa-solid fa-magnifying-glass"
                        url="{{ route('dashboard.explore.index') }}" />
                    <x-navbar-dashboard.body.menu.item text="Meus Eventos" classIcon="fa-solid fa-house-flag"
                        url="{{ route('dashboard.events.myEvents') }}" />
                </x-navbar-dashboard.body.menu>
            </x-slot:leftBar>

            <x-slot:breadcrumb>
                @yield('breadcrumbDashboard')
            </x-slot:breadcrumb>

            <x-slot:content>
                @yield('contentDashboard')
            </x-slot:content>
        </x-navbar-dashboard.body>
    </x-navbar-dashboard> --}}
@endsection

@push('scripts')
    {{-- @vite('resources/js/components/blade/navbar-dashboard/index.js') --}}
@endpush
