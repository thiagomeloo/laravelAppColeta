@extends('layouts.dashboard')


@section('dashboard-breadcrumb')
    @php
        $breadcrumbs = [
            ['url' => route('dashboard.map.index'), 'text' => 'Home'],
            ['text' => 'Evento'],
            ['text' => 'Meus Eventos'],
        ];
    @endphp
    <x-template.breadcrumb :breadcrumbItems="$breadcrumbs" />
@endsection

@section('dashboard-content')
@endsection
