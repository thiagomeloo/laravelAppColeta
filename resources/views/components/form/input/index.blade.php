@props([
    'label' => '',
    'id' => '',
    'name' => '',
    'type' => 'text',
    'value' => '',
    'placeholder' => '',
    'class' => '',
    'classIcon' => '',
])

<div class="w-full py-2 px-2">

    @if (isset($label) && $label != '')
        <label for="{{ $id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            {{ $label }}
        </label>
    @endif

    <div class="relative">
        @if (isset($classIcon) && $classIcon != '')
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <i class="{{ $classIcon }} w-5 h-5 text-gray-500 dark:text-gray-400"></i>
            </div>
        @endif
        <input
            {{ $attributes->merge([
                'class' =>
                    'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-lime-500 focus:border-lime-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-lime-500 dark:focus:border-lime-500' .
                    ($classIcon != '' ? ' pl-10' : '') .
                    ' ' .
                    $class,
                'id' => $id,
                'name' => $name,
                'type' => $type,
                'value' => $value,
                'placeholder' => $placeholder,
            ]) }} />
    </div>
</div>
