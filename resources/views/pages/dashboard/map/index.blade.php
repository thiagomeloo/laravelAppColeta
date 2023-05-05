@extends('layouts.dashboard')


@section('contentDashboard')
    {{-- Grid com duas divs uma com 1/3 e outra com 2/3 --}}
    <div class="grid grid-cols-3 gap-4">
        <x-card class="col-span-1 " title="Filtro">
            <form class="flex items-center">
                <x-form.input type="text" id="inputCep" name="inputCep" placeholder="Digite o CEP que deseja buscar"
                    classIcon="fa fa-search" />


            </form>
        </x-card>
        <x-card class="col-span-2" title="Mapa">
            <div id="map" class="w-full h-[500px]"></div>
        </x-card>
    </div>
@endsection
