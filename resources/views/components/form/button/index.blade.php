<button
    {{ $attributes->merge([
        'type' => 'button',
        'class' =>
            'px-6 py-2 font-medium tracking-wide dark:bg-lime-300 dark:hover:text-lime-500 text-white dark:text-gray-900 capitalize transition-colors duration-300 transform bg-lime-600 rounded-lg hover:bg-lime-800 focus:outline-none focus:ring focus:ring-lime-300 focus:ring-opacity-80' .
            ($class ?? ''),
    ]) }}>
    @if (isset($classIcon) && $classIcon != '')
        <i class="{{ $classIcon }} px-2"></i>
    @endif
    {{ $slot ?? '' }}
</button>
