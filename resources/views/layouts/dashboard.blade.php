@extends('layouts.app')

@section('content')
    <!-- Topo da página -->
    <header class="bg-gray-800 py-2 px-2 flex items-center justify-between">
        <div>
            <!--Logo-->
            <img class="h-8" src="https://tailwindui.com/img/logos/workflow-mark-on-dark.svg" alt="Workflow">
        </div>
        <div class="flex items-center">
            <div class="hidden lg:block ml-4">
                <button class="bg-gray-700 text-white px-3 py-2 rounded-md text-sm font-medium">Sign In</button>
                <button class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium ml-2">Sign Up</button>
            </div>
        </div>
    </header>

    <div class="flex">
        <!-- Barra lateral -->
        <div class="flex flex-col bg-gray-900 w-64 lg:w-64 h-screen py-4 " id="sidebar">
            <div
                class="flex pb-2 px-4 md:border-b border-b-gray-400 opacity-70 sm:border-b lg:border-b-0 transition-all lg:hidden">
                <!-- Botao Mobile -->
                <button type="button" class="text-gray-500 hover:text-white focus:outline-none focus:text-white lg:hidden"
                    aria-label="Toggle menu" id="menu-toggle">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <!-- Menu -->
            <nav class="mb-8 pt-2">
                <a href="#" class="flex items-center py-2 px-6 text-gray-400 hover:text-white">
                    <i>i</i>
                    <span class="text-nav lg:block">
                        Dashboard
                    </span>
                </a>
                <a href="#" class="flex items-center py-2 px-6 text-gray-400 hover:text-white">
                    <i>i</i>
                    <span class="text-nav lg:block">
                        Dashboard
                    </span>
                </a>
                <a href="#" class="flex items-center py-2 px-6 text-gray-400 hover:text-white">
                    <i>i</i>
                    <span class="text-nav lg:block">
                        Dashboard
                    </span>
                </a>
            </nav>
        </div>

        <!-- Conteúdo -->
        <div class="main flex-1 bg-gray-100">
            <div class="mx-auto p-10">
                <!-- conteúdo do container -->
                <h1>TESTE</h1>
            </div>
        </div>

    </div>

    <!-- JavaScript para o botão mobile -->
    <script>
        const menuToggle = document.getElementById("menu-toggle");
        const sidebar = document.getElementById("sidebar");

        menuToggle.addEventListener("click", () => {

            const navTexts = document.querySelectorAll(".text-nav");

            navTexts.forEach((item) => {
                item.classList.toggle("hidden");
            });

            //minimize sidebar
            sidebar.classList.toggle("w-64");
        });
    </script>
@endsection
