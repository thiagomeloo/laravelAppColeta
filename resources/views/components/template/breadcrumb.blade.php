<nav class="flex items-center text-sm mb-4">
    <ol class="list-none flex items-center">
        @foreach($breadcrumbs as $breadcrumb)
            @if(!$loop->last)
                <li>
                    <a href="{{ $breadcrumb['url'] }}" class="text-blue-500 hover:text-blue-700">{{ $breadcrumb['title'] }}</a>
                    <svg class="h-4 w-4 mx-2 fill-current text-gray-500" viewBox="0 0 24 24">
                        <path
                            d="M9 17l5-5-5-5"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                </li>
            @else
                <li class="font-semibold text-gray-700">{{ $breadcrumb['title'] }}</li>
            @endif
        @endforeach
    </ol>
</nav>
