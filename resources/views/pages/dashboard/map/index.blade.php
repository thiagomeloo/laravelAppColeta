@extends('layouts.dashboard')


@section('contentDashboard')
    @php
        $teste = 'hover:text-white';
        
    @endphp

    <h1 class="{{ $teste }}">Map</h1>
@endsection
