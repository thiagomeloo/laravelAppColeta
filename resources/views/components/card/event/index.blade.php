<div class="max-w-2xl overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
    <div class="object-cover w-full h-64">
        <x-map width="w-full" height="h-64" latitude="{{ $latitude ?? '' }}" longitude="{{ $longitude ?? '' }}"
            zoom="{{ $zoom ?? '' }}" markers="{{ $markers ?? '' }}" />
    </div>
    <div class="p-3">
        <div>
            <span class="text-xs font-medium text-lime-600 uppercase dark:text-lime-400">
                {{ $typeEvent ?? '' }}
            </span>
            <a href="#"
                class="block mt-2 text-xl font-semibold text-gray-800 transition-colors duration-300 transform dark:text-white hover:text-gray-600 hover:underline"
                tabindex="0" role="link">
                {{ $title ?? '' }}
            </a>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                {{ $description ?? '' }}
            </p>
        </div>

        <div class="mt-4 flex justify-between place-items-end">
            <a href="#" class="font-semibold text-gray-700 dark:text-gray-200" tabindex="0"
                role="link">{{ $owner ?? '' }}
            </a>
            <span class="py-1 text-xs text-gray-600 dark:text-gray-300">{{ $date ?? '' }}</span>
        </div>
    </div>
</div>
