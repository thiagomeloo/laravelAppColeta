<button type="submit"
    class="bg-lime-600 hover:bg-lime-800 dark:bg-lime-300 dark:hover:text-lime-500 text-white dark:text-gray-900 transition duration-300 ease-in-out rounded-md text-sm font-medium h-max w-max px-2 py-2 flex row-span-1 items-center text-center">
    @if (isset($classIcon) && $classIcon != '')
        <i class="{{ $classIcon }} px-2"></i>
    @endif
    {{ $slot ?? '' }}
</button>
