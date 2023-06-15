<ol class="flex flex-wrap items-center space-x-1.5 md:space-x-3 mb-0">
    @foreach ($breadcrumbItems as $item)
        <li>
            <div class="flex items-center">
                <a @if(isset($item['url'])) href="{{ $item['url'] }}" @else href="#" @endif
                    @class([
                        'font-medium',
                        'text-gray-700',
                        'dark:text-gray-400',
                        'hover:text-lime-600' => isset($item['url']),
                        'dark:hover:text-lime-400' => isset($item['url']),
                        'cursor-pointer' => isset($item['url']),
                    ])
                    >
                    {{ $item['text'] }}
                </a>
            </div>
        </li>
        @if (!$loop->last)
            <div>
                <i class="text-gray-400 fas fa-angle-right"></i>
            </div>
        @endif
    @endforeach
</ol>
