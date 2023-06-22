@extends('layouts.app')

@section('css')
    <style>
        .menu-open {
            display: none;
        }
        @media (max-width: 768px) {
            .menu-closed {
                display: none;
            }
            .menu-open {
                display: block;
            }
        }
    </style>
@endsection

@section('header')
    @include('components.template.header')
@endsection

@section('content')
    <div class="flex flex-grow">
        <div class="flex-none w-fit menu-closed" id="sidebar">
            @include('components.template.sidebar')
        </div>
        <div class="flex-grow flex flex-col max-h-screen overflow-auto">
            <div class="p-4 pb-0">
                @yield('dashboard-breadcrumb')
            </div>

            <div class="flex-1 p-4">
                @yield('dashboard-content')
            </div>

            <div>
                @include('components.template.footer')
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- @vite('resources/js/components/blade/navbar-dashboard/index.js') --}}
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            var sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('block');
        });
    </script>
@endpush



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
