@extends('layouts.dashboard')


@section('contentDashboard')
    <x-card>
        <div>
            @can('update', $event)
                <a href="{{ route('dashboard.events.edit', ['event' => $event->id]) }}"
                    class="float-right bg-lime-600 hover:bg-lime-800 dark:bg-lime-300 dark:hover:text-lime-500 text-white dark:text-gray-900 transition duration-300 ease-in-out px-3 py-2 rounded-md text-sm font-medium">
                    Editar
                </a>
            @endcan

            <div class="mb-10 w-full">
                <span
                    class="text-2xl md:text-3xl xl:text-4xl font-bold text-black break-words">{{ $event->title }}</span><br>
                <i class="text-xs md:text-base text-gray-500">Organizado por: {{ $event->owner->name }}</i>
            </div>

            <div class="w-full mb-10">
                <span>{{ $event->description }}</span>
            </div>

            <div class="w-full mb-10">
                <span class="block font-medium text-gray-700 mb-2">Status: </span><span
                    class="capitalize">{{ $event->statusEvent->name }}</span>
            </div>

            <div class="w-full mb-10">
                <span class="block font-medium text-gray-700 mb-2">Frequência: </span><span>{{ $event->frequency }}
                    dias</span>
            </div>

            <div class="w-full mb-10">
                <span class="block font-medium text-gray-700 mb-2">Material de preferência:</span>
                <ul class="list-inside md:list-outside list-disc">
                    <li class="capitalize">- {{ $event->typeMaterial->name }}</li>
                </ul>
            </div>

            <div class="w-full mb-10">
                <span class="block font-medium text-gray-700 mb-2">Comentários:</span>
                <div class="w-full mb-10">
                    <x-form.textarea.autoresize
                        name="comment"
                        id="comment"
                        placeholder="Deixe um comentário..."
                        class="w-full focus:outline-none"
                        required
                        >{{old('comment')}}</x-textarea.autoresize>
                    <div class="w-full text-right">
                        <button type="submit" class="bg-lime-600 hover:bg-lime-800 dark:bg-lime-300 dark:hover:text-lime-500 text-white dark:text-gray-900 transition duration-300 ease-in-out px-3 py-2 rounded-md text-sm font-medium">
                            Publicar
                        </button>
                    </div>
                </div>
                <ul class="list-disc w-full">
                    @forelse ($event->eventInteractions as $eventInteractions)
                        <li class="bg-gray-300 px-5 py-2 rounded-md mb-1">
                            <span>{{ $eventInteractions->user->name }}</span><br>
                            <span>{{ $eventInteractions->title }}</span><br>
                            <span>{{ $eventInteractions->description }}</span><br>
                            <ul>
                                @foreach ($eventInteractions->eventInteractionsResponses as $eventInteractionsResponses)
                                    <li>
                                        <span>{{ $eventInteractionsResponses->user->name }}</span>
                                        <span>{{ $eventInteractionsResponses->text }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @empty
                        <li class="bg-gray-300 p-5 rounded-md mb-1">Sem comentários</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </x-card>
    <x-new-event.index />
@endsection
