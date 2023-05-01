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
                    <x-navbar.body.menu.button href="{{ route('auth.login') }}">
                        Login
                    </x-navbar.body.menu.button>
                </x-slot:buttons>
            </x-navbar.body.menu>
        </x-slot:body>
    </x-navbar>
@endsection

@section('content')
    {{-- SECTION - BEM VINDOS --}}
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-12 mx-auto">
            <div class="text-center mb-20">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-lime-600 dark:text-lime-400">
                    Bem Vindo</h1>
                <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-500">
                    Aqui você encontra o lugar mais
                    próximo
                    para o descarte dos seus
                    resíduos
                    .
                </p>
                <div class="flex mt-6 justify-center">
                    <div class="w-16 h-1 rounded-full bg-lime-600 inline-flex"></div>
                </div>
            </div>
            <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4 md:space-y-0 space-y-6">
                <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
                    <div
                        class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-white dark:bg-opacity-50 text-lime-600 dark:text-lime-300 mb-5 flex-shrink-0">
                        <i class="fa-solid fa-leaf text-4xl"></i>
                    </div>
                    <div class="flex-grow">
                        <h2 class="text-gray-900 dark:text-gray-500 text-lg title-font font-medium mb-3">Coleta</h2>
                        <p class="leading-relaxed text-base">
                            Procure por pessoas dispostas a descartar os resíduos que você deseja reciclar.
                        </p>
                    </div>
                </div>
                <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
                    <div
                        class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-white dark:bg-opacity-50 text-lime-600 dark:text-lime-300 mb-5 flex-shrink-0">
                        <i class="fa-solid fa-tree-city text-4xl"></i>
                    </div>
                    <div class="flex-grow">
                        <h2 class="text-gray-900 dark:text-gray-500 text-lg title-font font-medium mb-3">Descarte</h2>
                        <p class="leading-relaxed text-base">
                            Contribua para a preservação do meio ambiente descartando os resíduos de forma adequada e
                            utilizando os pontos de coleta disponíveis.
                        </p>
                    </div>
                </div>
                <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
                    <div
                        class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-white dark:bg-opacity-50 text-lime-600 dark:text-lime-300 mb-5 flex-shrink-0">
                        <i class="fa-solid fa-recycle text-4xl"></i>
                    </div>
                    <div class="flex-grow">
                        <h2 class="text-gray-900 dark:text-gray-500 text-lg title-font font-medium mb-3">Sustentabilidade
                        </h2>
                        <p class="leading-relaxed text-base">
                            Seja parte da mudança positiva que o mundo precisa, adote práticas sustentáveis em sua rotina e
                            contribua para um futuro mais equilibrado e saudável para todos.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- SECTION - BEM VINDOS --}}

    {{-- SECTION - MAP --}}
    <section class="text-gray-600 body-font">
        <div class="container mx-auto flex px-5 py-16 items-center justify-center flex-col">
            {{-- DIV MAPA QUE OCULPA BOA PARTE DA TELA --}}
            <div class="sm:w-4/5 md:w-5/6 w-11/12 justify-center self-center rounded my-4" style="height: 35rem;">
                <div class="w-90 h-full rounded" id="mapa"></div>
            </div>

            <div class="text-center lg:w-2/3 w-full">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900 dark:text-gray-500">Mapa</h1>
                <p class="mb-8 leading-relaxed">
                    Ajude a preservar o meio ambiente localizando os pontos de coleta ou descarte mais próximos de você e
                    faça a diferença na hora de descartar corretamente materiais recicláveis, contribuindo para uma vida
                    mais sustentável.
                </p>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    {{-- SCRIPS DA NAVBAR --}}
    @vite('resources/js/components/blade/navbar/index.js')

    {{-- SCRIPTS DA PÁGINA --}}
    @vite('resources/js/pages/home/index.js')
@endsection
