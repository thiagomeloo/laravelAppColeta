@extends('layouts.dashboard')


@section('breadcrumbDashboard')
    <x-navbar-dashboard.body.breadcrumb>
        <x-navbar-dashboard.body.breadcrumb.item href="{{ route('dashboard.map.index') }}">
            <i class="fas fa-home"></i>
        </x-navbar-dashboard.body.breadcrumb.item>
        <x-navbar-dashboard.body.breadcrumb.item>
            Evento
        </x-navbar-dashboard.body.breadcrumb.item>
        <x-navbar-dashboard.body.breadcrumb.item separator>
            Novo
        </x-navbar-dashboard.body.breadcrumb.item>
    </x-navbar-dashboard.body.breadcrumb>
@endsection


@section('contentDashboard')
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
                <div name="searchAddressButton" id="searchAddressButton" class="col-span-3 w-full flex justify-end p-0">
                    <x-form.button type="button" classIcon="fa-solid fa-magnifying-glass">
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

            <div class="w-full mb-5 p-2">
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

            <div class="w-full mb-10 p-2">
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
        </x-card>

        {{-- BOTAO PUBLICAR --}}
        <div class="col-span-3 w-full flex justify-end">
            <x-form.button type="submit" classIcon="fa-regular fa-paper-plane">
                Publicar
            </x-form.button>
        </div>
    </div>

    {{-- <x-card>
        <form action="{{ route('dashboard.events.store') }}" method="POST">
            @csrf --}}
    {{-- <div>

                <input type="text" name="title" id="title" placeholder="Título..." value="{{ old('title') }}"
                    required
                    class="text-2xl md:text-3xl xl:text-4xl font-bold mb-10 w-full text-gray-400 hover:text-black focus:text-black focus:outline-none">

                <x-form.textarea.autoresize name="description" id="description"
                    placeholder="Digite a descrição do evento..." class="w-full mb-10 focus:outline-none" required>
                    {{ old('description') }}
                </x-form.textarea.autoresize>

                <div class="w-full md:w-1/2 mb-10">
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

                <div class="w-full md:w-1/2 mb-10">
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

                <input type="hidden" name="latitude" id="latitude" value="1.1">
                <input type="hidden" name="longitude" id="longitude" value="1.1">

                <button type="submit"
                    class="bg-lime-600 hover:bg-lime-800 dark:bg-lime-300 dark:hover:text-lime-500 text-white dark:text-gray-900 transition duration-300 ease-in-out px-3 py-2 rounded-md text-sm font-medium">
                    Publicar
                </button>
            </div> --}}
    {{--
        </form>
    </x-card> --}}
@endsection

@push('scripts')
    @stack('scripts-form-textarea-autoresize')
    @vite('resources/js/pages/dashboard/events/index.js')
@endpush
