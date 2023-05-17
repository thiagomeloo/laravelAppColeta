<div
    {{ $attributes->merge([
        'class' => ($height ?? 'h-[300px]') . ' ' . ($width ?? 'w-[300px]'),
        'id' => $id ?? 'map' . rand(0, 100000),
        'data-latitude' => $latitude ?? null,
        'data-longitude' => $longitude ?? null,
        'data-zoom' => $zoom ?? '15',
        'data-markers' => $markers ?? json_encode([]),
    ]) }}>
</div>
