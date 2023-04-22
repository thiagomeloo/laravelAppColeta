<nav class="mx-auto p-6 lg:flex lg:items-center lg:justify-between border-b-2">
    <div class="flex items-center justify-between">
        {{ $header ?? '' }}
    </div>
    {{ $body ?? '' }}
</nav>

{{-- LEMBRAR DE IMPORTAR O SCRIPT NECESSÁRIO QUE FICA EM: resources/js/components/blade/navbar/index.js --}}
