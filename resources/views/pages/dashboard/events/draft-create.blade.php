@extends('layouts.dashboard')


@section('contentDashboard')
    <x-card>
        <form action="{{ route('events.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-10 place-content-stretch">
                <div class="col-span-full lg:col-span-3">
                    <input
                        type="text"
                        name="title"
                        id="title"
                        placeholder="Título..."
                        value="{{old('title')}}"
                        class="text-2xl md:text-3xl xl:text-4xl font-bold mb-10 w-full text-gray-400 hover:text-black focus:text-black focus:outline-none"
                        >
                    <x-textarea.autoresize
                        name="description"
                        id="description"
                        placeholder="Digite a descrição do evento..."
                        class="w-full mb-10 focus:outline-none"
                        >{{old('description')}}</x-textarea.autoresize>

                    <div class="w-full mb-10">
                        <label for="frequency" class="block font-medium text-gray-700 mb-2">Com que frequência ocorre: (em dias)</label>
                        <x-select.default
                            id="frequency"
                            name="frequency">
                            @foreach (\App\Enum\FrequencyEnum::cases() as $key => $value)
                                <option value="{{ $value->name }}" @selected(old('frequency') == $value->name)>{{ $value }}</option>
                            @endforeach
                        </x-select.default>
                    </div>

                    <div
                        class="mb-10 grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-3 gap-6">

                        @foreach ($typesMaterials as $material)
                            @continue($material->name == 'outros')
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="type_materials[]" value="{{ $material->id }}" id="{{ $material->id }}" class="form-checkbox">
                                <label for="{{ $material->id }}" class="text-sm">{{ ucwords($material->name) }}</label>
                            </div>
                        @endforeach

                        @php $outros = $typesMaterials->firstWhere('name', 'outros') @endphp
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" name="type_materials[]" value="{{ $outros->id }}" id="{{ $outros->id }}" class="form-checkbox">
                            <label for="{{ $outros->id }}" class="text-sm">{{ ucwords($outros->name) }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-span-full lg:col-span-2 min-h-[320px]">
                    <div class="border h-full w-full flex place-content-stretch bg-blue-600">
                        teste
                    </div>
                </div>
            </div>

            <x-navbar-dashboard.header.button text="Publicar" class="block"/>
        </form>
    </x-card>
@endsection

@section('scripts')
    @stack('scripts-form-textarea-autoresize')
@endsection
