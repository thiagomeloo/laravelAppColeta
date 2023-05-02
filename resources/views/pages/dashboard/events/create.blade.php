@extends('layouts.dashboard')


@section('contentDashboard')
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
                <x-textarea.autoresize
                    name="description"
                    id="description"
                    placeholder="Digite a descrição do evento..."
                    class="w-full mb-10 focus:outline-none"
                    required
                    >{{old('description')}}</x-textarea.autoresize>

                <div class="w-full md:w-1/2 mb-10">
                    <label for="frequency" class="block font-medium text-gray-700 mb-2">Com que frequência ocorre: (em dias)</label>
                    <x-select.default
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
                    <x-select.default
                        name="type_material_id"
                        id="type_material_id"
                        required>
                        @foreach ($typesMaterials as $material)
                            @continue($material->name == 'outros')
                            <div class="flex items-center space-x-2">
                                <option value="{{ $material->id }}">{{ ucwords($material->name) }}</option>
                            </div>
                        @endforeach

                        @php $outros = $typesMaterials->firstWhere('name', 'outros') @endphp
                        <div class="flex items-center space-x-2">
                            <option value="{{ $outros->id }}">{{ ucwords($outros->name) }}</option>
                        </div>
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
@endsection

@section('scripts')
    @stack('scripts-form-textarea-autoresize')
@endsection
