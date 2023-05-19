<li>
    <div class="flex items-center justify-center">
        {{-- SEPARADOR --}}
        @if (isset($separator))
            <i class="mr-1 text-gray-400 fas fa-angle-right"></i>
        @endif
        {{-- LINK --}}
        <a href="{{ $href ?? '#' }}"
            class="ml-1 font-medium text-gray-700 hover:text-lime-600 md:ml-2 dark:text-gray-400 dark:hover:text-lime-400 cursor-pointer">
            {{ $slot ?? '' }}
        </a>
    </div>
</li>
