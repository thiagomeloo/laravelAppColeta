@extends('layouts.dashboard')

@section('dashboard-breadcrumb')
    @php
        $breadcrumbs = [
            ['url' => '/home', 'text' => 'Home'],
            ['url' => '/produtos', 'text' => 'Produtos'],
            ['url' => '/produtos/categoria', 'text' => 'Categoria'],
            ['text' => 'Categoria'],
            ['url' => '#', 'text' => 'Produto']
        ];
    @endphp
    <x-template.breadcrumb :breadcrumbItems="$breadcrumbs" />
@endsection

@section('dashboard-content')
    <main>
        <h2 class="text-lg mb-4">Conteúdo Principal</h2>
        <p>Lorem ipsum dolor sit aet, consectetur adipiscing elit. Duis venenatis lectus eu congue semper. Sed laoreet nisl velit, nec convallis nunc efficitur in.</p>
        <h2 class="text-lg mb-4">Conteúdo Principal</h2>
        <p>Lorem ipsum dolor sit aet, consectetur adipiscing elit. Duis venenatis lectus eu congue semper. Sed laoreet nisl velit, nec convallis nunc efficitur in.</p>
        <h2 class="text-lg mb-4">Conteúdo Principal</h2>
        <p>Lorem ipsum dolor sit aet, consectetur adipiscing elit. Duis venenatis lectus eu congue semper. Sed laoreet nisl velit, nec convallis nunc efficitur in.</p>
        <h2 class="text-lg mb-4">Conteúdo Principal</h2>
        <p>Lorem ipsum dolor sit aet, consectetur adipiscing elit. Duis venenatis lectus eu congue semper. Sed laoreet nisl velit, nec convallis nunc efficitur in.</p>
        <h2 class="text-lg mb-4">Conteúdo Principal</h2>
        <p>Lorem ipsum dolor sit aet, consectetur adipiscing elit. Duis venenatis lectus eu congue semper. Sed laoreet nisl velit, nec convallis nunc efficitur in.</p>
        <h2 class="text-lg mb-4">Conteúdo Principal</h2>
        <p>Lorem ipsum dolor sit aet, consectetur adipiscing elit. Duis venenatis lectus eu congue semper. Sed laoreet nisl velit, nec convallis nunc efficitur in.</p>
    </main>
@endsection
