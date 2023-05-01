@extends('layouts.app')

@section('content')
    <div class="container flex items-center justify-center min-h-screen px-6 mx-auto">
        <div class="w-full">
            <div class="m-auto md:w-8/12 lg:w-6/12 xl:w-6/12">
                <div class="rounded-xl bg-gray-200 shadow-2xl">
                    <div class="p-6 sm:p-16">
                        <div class="space-y-4">
                            <a class="text-2xl font-bold cursor-pointer lg:text-3xl text-lime-600 hover:text-lime-800"
                                target="_blank">
                                App Coleta
                            </a>
                            <p class="mt-3 text-gray-500">
                                Faça login para continuar
                            </p>
                        </div>
                        <div class="mt-16 grid space-y-4">
                            <a href="{{ route('auth.google.redirect') }}"
                                class="h-12 px-6 py-2 border-2 rounded-full transition duration-300 text-gray-600 hover:text-lime-600 hover:bg-lime-50 border-gray-300 hover:border-lime-600 focus:bg-lime-100 active:bg-lime-100 cursor-pointer">
                                <div class="relative flex items-center space-x-4 justify-center ">
                                    <i class="absolute left-0 text-lg fa-brands fa-google"></i>
                                    <span class="block w-max font-semibold tracking-wide text-sm sm:text-base">
                                        Continue com o Google
                                    </span>
                                </div>
                            </a>

                            <a href="#"
                                class="h-12 px-6 py-2 border-2 rounded-full transition duration-300 text-gray-600 hover:text-lime-600 hover:bg-lime-50 border-gray-300 hover:border-lime-600 focus:bg-lime-100 active:bg-lime-100 cursor-pointer">
                                <div class="relative flex items-center space-x-4 justify-center ">
                                    <i class="absolute left-0 text-lg fab fa-facebook"></i>
                                    <span class="block w-max font-semibold tracking-wide text-sm sm:text-base">
                                        Continue com o Facebook
                                    </span>
                                </div>
                            </a>

                        </div>

                        <div class="mt-32 space-y-4 text-gray-600 text-center sm:-mb-8">
                            <p class="text-xs">
                                &copy; {{ now()->format('Y') }} App Coleta. Todos os direitos reservados.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
