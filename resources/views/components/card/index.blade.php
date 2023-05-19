<div {{ $attributes->merge(['class' => 'bg-white shadow-md rounded-md p-6']) }}>
    @isset($title)
        <h2 class="text-xl font-bold mb-4">{{ $title }}</h2>
    @endisset

    <div class="w-full h-auto overflow-auto {{ $classBody ?? '' }}">
        {{ $slot ?? '' }}
    </div>
</div>
