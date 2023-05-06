@extends('layouts.dashboard')


@section('contentDashboard')
    <x-card>
        <div>
            @can('update', $event)
                <a href="#" class="float-right bg-lime-600 hover:bg-lime-800 dark:bg-lime-300 dark:hover:text-lime-500 text-white dark:text-gray-900 transition duration-300 ease-in-out px-3 py-2 rounded-md text-sm font-medium">
                    Editar
                </a>
            @endcan

            <div class="mb-10 w-full">
                <span
                    class="text-2xl md:text-3xl xl:text-4xl font-bold text-black break-words"
                    >{{ $event->title }}</span><br>
                <i class="text-xs md:text-base text-gray-500">Organizado por: {{ $event->owner->name }}</i>
            </div>

            <div class="w-full mb-10">
                <span>{{ $event->description }}</span>
            </div>

            <div class="w-full mb-10">
                <span class="block font-medium text-gray-700 mb-2">Status: </span><span class="capitalize">{{ $event->statusEvent->name }}</span>
            </div>

            <div class="w-full mb-10">
                <span class="block font-medium text-gray-700 mb-2">Frequência: </span><span>{{ $event->frequency }} dias</span>
            </div>

            <div class="w-full mb-10">
                <span class="block font-medium text-gray-700 mb-2">Material de preferência:</span>
                <ul class="list-inside md:list-outside list-disc">
                    <li class="capitalize">- {{ $event->typeMaterial->name }}</li>
                </ul>
            </div>
        </div>
    </x-card>
@endsection

{{-- @section('contentDashboard')
    <x-card>
        <form action="{{ route('events.store') }}" method="POST">
            @csrf
            <div>
                <input
                    type="text"
                    name="title"
                    id="title"
                    placeholder="Título..."
                    value="{{old('title')}}"
                    required
                    class="text-2xl md:text-3xl xl:text-4xl font-bold mb-10 w-full text-gray-400 hover:text-black focus:text-black focus:outline-none"
                    >
                <x-form.textarea.autoresize
                    name="description"
                    id="description"
                    placeholder="Digite a descrição do evento..."
                    class="w-full mb-10 focus:outline-none"
                    required
                    >{{old('description')}}</x-textarea.autoresize>

                <div class="w-full md:w-1/2 mb-10">
                    <label for="frequency" class="block font-medium text-gray-700 mb-2">Com que frequência ocorre: (em dias)</label>
                    <x-form.select.default
                        id="frequency"
                        name="frequency"
                        required>
                        @foreach (\App\Enum\FrequencyEnum::cases() as $key => $value)
                            <option value="{{ $value->name }}" @selected(old('frequency') == $value->name)>{{ $value }}</option>
                        @endforeach
                    </x-select.default>
                </div>

                <div class="w-full md:w-1/2 mb-10">
                    <label for="type_material" class="block font-medium text-gray-700 mb-2">Selecione um material de preferência para o evento:</label>
                    <x-form.select.default
                        name="type_material_id"
                        id="type_material_id"
                        required>
                        @foreach ($typesMaterials as $material)
                            @continue($material->name == 'outros')
                            <option value="{{ $material->id }}">{{ ucwords($material->name) }}</option>
                        @endforeach

                        @php $typeOutros = $typesMaterials->firstWhere('name', 'outros') @endphp
                        @if($typeOutros)
                            <option value="{{ $typeOutros->id }}">{{ ucwords($typeOutros->name) }}</option>
                        @endif
                    </x-select.default>
                </div>

                <input type="hidden" name="latitude" id="latitude" value="1.1">
                <input type="hidden" name="longitude" id="longitude" value="1.1">

                <button type="submit" class="bg-lime-600 hover:bg-lime-800 dark:bg-lime-300 dark:hover:text-lime-500 text-white dark:text-gray-900 transition duration-300 ease-in-out px-3 py-2 rounded-md text-sm font-medium">
                    Publicar
                </button>
            </div>

        </form>
    </x-card>
@endsection --}}
