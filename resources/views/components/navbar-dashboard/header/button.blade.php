<button
    {{ $attributes->merge(['class' => "bg-lime-600 hover:bg-lime-800 dark:bg-lime-300 dark:hover:text-lime-500 text-white
     dark:text-gray-900 transition duration-300 ease-in-out px-3 py-2 rounded-md text-sm font-medium"]) }}>
    {{ $text ?? ($slot ?? '') }}
</button>
