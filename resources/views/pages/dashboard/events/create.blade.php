@extends('layouts.dashboard')


@section('dashboard-breadcrumb')
    @php
        $breadcrumbs = [
            ['url' => route('dashboard.map.index'), 'text' => 'Home'],
            ['url' => route('dashboard.explore.index'), 'text' => 'Eventos'],
            ['text' => 'Novo'],
        ];
    @endphp
    <x-template.breadcrumb :breadcrumbItems="$breadcrumbs" />
@endsection

@section('dashboard-content')
    <form action="{{ route('dashboard.events.store') }}" method="POST">
        @csrf

        <div class="grid grid-cols-3 gap-4 bg-white p-10">
            {{-- MAPA --}}
            <x-card class="col-span-1 border h-" title="Mapa">

                <label for="frequency" class="block font-medium text-gray-700 mb-2 px-2">
                    Buscar localização:
                </label>
                <div class="w-full mb-5 p-2">
                    <x-form.textarea.autoresize name="searchAddressInput" id="searchAddressInput"
                        placeholder="ex: Rua, Número, Cidade, Estado ou CEP (apenas números)"
                        class="border border-stone-300 py-2 px-2 font-bold w-full text-gray-400 hover:text-black focus:text-black rounded-md shadow-sm focus:outline-none focus:ring-2
                    focus:ring-lime-500 focus:border-lime-500 disabled:opacity-40">
                    </x-form.textarea.autoresize>
                    <div class="col-span-3 w-full flex justify-end p-0">
                        <x-form.button name="searchAddressButton" id="searchAddressButton" type="button"
                            classIcon="fa-solid fa-magnifying-glass">
                            Buscar
                        </x-form.button>
                    </div>
                </div>
                <input type="hidden" name="latitude" id="latitude" value="">
                <input type="hidden" name="longitude" id="longitude" value="">

                <x-map width="w-full" height="h-3/5" id="map" />

            </x-card>

            {{-- DETALHES EVENTO --}}
            <x-card class="col-span-2 border flex-1" title="Detalhes" classBody="pt-2">
                <div class="w-full mb-5 p-2">
                    <label for="frequency" class="block font-medium text-gray-700 mb-2">
                        Titulo:
                    </label>
                    <input type="text" name="title" id="title" placeholder="Digite o Título..."
                        value="{{ old('title') }}" required
                        class="border border-stone-300 py-4 px-2 text-xl font-bold w-full text-gray-400 hover:text-black focus:text-black rounded-md shadow-sm focus:outline-none focus:ring-2
                    focus:ring-lime-500 focus:border-lime-500 disabled:opacity-40">
                </div>

                <div class="w-full mb-5 p-2">
                    <label for="frequency" class="block font-medium text-gray-700 mb-2">
                        Descrição:
                    </label>
                    <x-form.textarea.autoresize name="description" id="description"
                        placeholder="Digite a descrição do evento..."
                        class="border border-stone-300 py-4 px-2 font-bold w-full text-gray-400 hover:text-black focus:text-black rounded-md shadow-sm focus:outline-none focus:ring-2
                    focus:ring-lime-500 focus:border-lime-500 disabled:opacity-40"
                        required>
                        {{ old('description') }}
                    </x-form.textarea.autoresize>
                </div>

                <div class="w-full mb-0 p-2">
                    <label for="frequency" class="block font-medium text-gray-700 mb-2">
                        Com que frequência ocorre: (em dias)
                    </label>
                    <x-form.select.default id="frequency" name="frequency" required>
                        @foreach (\App\Enum\FrequencyEnum::cases() as $key => $value)
                            <option value="{{ $value->name }}" @selected(old('frequency') == $value->name)>
                                {{ $value }}
                            </option>
                        @endforeach
                    </x-form.select.default>
                </div>

                <div class="w-full mb-0 p-2">
                    <label for="type_material" class="block font-medium text-gray-700 mb-2">
                        Selecione um material de preferência para o evento:
                    </label>
                    <x-form.select.default name="type_material_id" id="type_material_id" required>
                        @foreach ($typesMaterials as $material)
                            @continue($material->name == 'outros')
                            <option value="{{ $material->id }}">
                                {{ ucwords($material->name) }}
                            </option>
                        @endforeach

                        @php $typeOutros = $typesMaterials->firstWhere('name', 'outros') @endphp

                        @if ($typeOutros)
                            <option value="{{ $typeOutros->id }}">
                                {{ ucwords($typeOutros->name) }}
                            </option>
                        @endif
                    </x-form.select.default>
                </div>

                <div class="w-full mb-5 p-2">
                    <label for="type_action_id" class="block font-medium text-gray-700 mb-2">
                        Selecione um tipo:
                    </label>
                    <x-form.select.default name="type_action_id" id="type_action_id" required>
                        @foreach ($typesActions as $action)
                            <option value="{{ $action->id }}">
                                {{ ucwords($action->name) }}
                            </option>
                        @endforeach
                    </x-form.select.default>
                </div>
            </x-card>

            {{-- BOTAO PUBLICAR --}}
            <div class="col-span-3 w-full flex justify-end">
                <x-form.button type="submit" classIcon="fa-regular fa-paper-plane">
                    Publicar
                </x-form.button>
            </div>

        </div>
    </form>
@endsection

@push('scripts')
    @vite('resources/js/pages/dashboard/events/index.js')
@endpush
