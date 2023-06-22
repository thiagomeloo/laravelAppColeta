<ol class="flex flex-wrap items-center space-x-1.5 md:space-x-3 mb-0">
    @foreach ($breadcrumbItems as $item)
        <li>
            <div class="flex items-center">
                @isset($item['url'])
                    <a href="{{ $item['url'] }}"
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
                @else
                    <span class="cursor-default">{{ $item['text'] }}</span>
                @endisset
            </div>
        </li>
        @if (!$loop->last)
            <div>
                <i class="text-gray-400 fas fa-angle-right"></i>
            </div>
        @endif
    @endforeach
</ol>
