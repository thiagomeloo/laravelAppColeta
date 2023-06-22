@extends('layouts.dashboard')

@section('dashboard-breadcrumb')
    @php
        $breadcrumbs = [
            ['url' => route('dashboard.map.index'), 'text' => 'Home'],
            ['text' => 'Explorar'],
        ];
    @endphp
    <x-template.breadcrumb :breadcrumbItems="$breadcrumbs" />
@endsection

@section('dashboard-content')
    <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-4 2xl:grid-cols-8 gap-4">
        @foreach ($events as $event)
            <x-card.event linkView="{{ route('dashboard.events.show', ['event' => $event->id]) }}" title="{{ $event->title }}"
                owner="{{ $event->owner->name }}" typeEvent="{{ $event->typeAction->name }}"
                description="{{ $event->description }}" latitude="{{ $event->location->latitude }}"
                longitude="{{ $event->location->longitude }}" date="">
            </x-card.event>
        @endforeach
    </div>

    <x-new-event.index />
@endsection


@push('scripts')
    @vite('resources/js/pages/dashboard/explore/index.js')
@endpush
