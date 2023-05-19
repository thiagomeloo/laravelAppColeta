@extends('layouts.dashboard')

@section('breadcrumbDashboard')
    <x-navbar-dashboard.body.breadcrumb>
        <x-navbar-dashboard.body.breadcrumb.item href="{{ route('dashboard.map.index') }}">
            <i class="fas fa-home"></i>
        </x-navbar-dashboard.body.breadcrumb.item>
        <x-navbar-dashboard.body.breadcrumb.item href="{{ route('dashboard.explore.index') }}" separator>
            Explorar
        </x-navbar-dashboard.body.breadcrumb.item>
    </x-navbar-dashboard.body.breadcrumb>
@endsection

@section('contentDashboard')
    <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-4 2xl:grid-cols-8 gap-4">
        @foreach ($events as $event)
            <x-card.event linkView="{{ route('dashboard.events.show', ['event' => $event->id]) }}" title="{{ $event->title }}" owner="{{ $event->owner->name }}" typeEvent="Coleta"
                description="{{ $event->description }}"
                date="10/10/2021">
            </x-card.event>
        @endforeach
    </div>

    <x-new-event.index />
@endsection


@push('scripts')
    @vite('resources/js/pages/dashboard/explore/index.js')
@endpush
