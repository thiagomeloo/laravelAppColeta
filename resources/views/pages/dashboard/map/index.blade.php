@extends('layouts.dashboard')

@section('breadcrumbDashboard')
    <x-navbar-dashboard.body.breadcrumb>
        <x-navbar-dashboard.body.breadcrumb.item>
            <i class="fas fa-home"></i>
        </x-navbar-dashboard.body.breadcrumb.item>
        <x-navbar-dashboard.body.breadcrumb.item separator>
            Mapa
        </x-navbar-dashboard.body.breadcrumb.item>
    </x-navbar-dashboard.body.breadcrumb>
@endsection

@section('contentDashboard')
    <div class="grid grid-cols-3 gap-4">
        <x-card class="col-span-1 " title="Filtro">
            <form class="flex items-center">
                <div class="grid grid-cols-1 gap-4 flex-1">
                    <x-form.input type="text" id="inputCep" name="inputCep" placeholder="Digite o CEP que deseja buscar"
                        classIcon="fa fa-search" />
                    <x-form.range title="Raio de Busca" value="0" valueMin="0" valueMax="100" id="raio"
                        unidadeMedida="Km" />
                    <div>
                        <p class="block mb-2 text-base font-medium text-gray-900 dark:text-white text-start">
                            Material de Interesse
                        </p>
                        <div class="grid grid-cols-4 gap-2 items-center">
                            @for ($i = 0; $i < 10; $i++)
                                <x-form.checkbox name="material" value="1" label="Papel" />
                                <x-form.checkbox name="material" value="1" label="Vidro" />
                                <x-form.checkbox name="material" value="1" label="Plástico" />
                                <x-form.checkbox name="material" value="1" label="Outros" />
                            @endfor
                        </div>
                    </div>
                    <x-form.button class="mt-8">
                        Filtrar
                    </x-form.button>
                </div>

            </form>

        </x-card>
        <x-card class="col-span-2" title="Mapa">
            <x-map width="w-full" height="h-4/5" id="map" />
        </x-card>
    </div>
@endsection

@push('scripts')
    @vite('resources/js/pages/dashboard/map/index.js')
@endpush
