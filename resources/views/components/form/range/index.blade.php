<div class="relative py-2 px-2">

    <label for="{{ $id }}" class="block mb-2 text-base font-medium text-gray-900 dark:text-white text-start">
        {{ $title }}
    </label>

    <input id="{{ $id }}" type="range"type="range" value="{{ $value ?? 0 }}" min="{{ $valueMin ?? 0 }}"
        max="{{ $valueMax ?? ($valueMin ?? 0) }}" step="{{ $valueStep ?? 1 }}"
        class="w-full h-2 mb-1 bg-lime-200 rounded-lg appearance-none cursor-pointer border border-lime-600 dark:bg-gray-700">

    <div class="flex justify-between text-xs text-gray-600 italic px-2">
        <span>
            <span class="font-bold">{{ $valueMin ?? 0 }}</span>
            {{ $unidadeMedida ? ' ' . $unidadeMedida : '' }}
        </span>
        <span class="pt-4">
            <span class="range-sm-value font-bold">{{ $value ?? 0 }}</span>
            {{ $unidadeMedida ? ' ' . $unidadeMedida : '' }}
        </span>
        <span>
            <span class="font-bold">{{ $valueMax ?? ($valueMin ?? 0) }}</span>
            {{ $unidadeMedida ? ' ' . $unidadeMedida : '' }}
        </span>
    </div>
</div>

@push('scripts')
    <script>
        const range = document.getElementById("<?php echo $id; ?>");
        range?.addEventListener('input', function(e) {
            range.nextElementSibling.querySelector('.range-sm-value').innerHTML = e.target.value;
        });
    </script>
@endpush
