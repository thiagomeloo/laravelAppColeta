@extends('layouts.app')

@section('header')
    <x-navbar>
        <x-slot:header>
            <x-navbar.header.brand>
                App Coleta
            </x-navbar.header.brand>
            <x-navbar.header.button-menu-mobile />
        </x-slot:header>
        <x-slot:body>
            <x-navbar.body.menu>
                <x-slot:items>
                    <x-navbar.body.menu.item>
                        Home
                    </x-navbar.body.menu.item>
                </x-slot:items>
                <x-slot:buttons>
                    <x-navbar.body.menu.button>
                        Login
                    </x-navbar.body.menu.button>
                </x-slot:buttons>
            </x-navbar.body.menu>
        </x-slot:body>
    </x-navbar>
@endsection

@section('content')
    <h1>
        Conteúdo
    </h1>
@endsection

@section('scripts')
    @vite('resources/js/components/blade/navbar/index.js')
@endsection
