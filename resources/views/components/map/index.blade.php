<div
    {{ $attributes->merge([
        'class' => ($height ?? 'h-[300px]') . ' ' . ($width ?? 'w-[300px]') . ' ' . ($class ?? '') . ' ' . 'map',
        'id' => $id ?? 'map' . rand(0, 100000),
        'latitude' => $latitude ?? null,
        'longitude' => $longitude ?? null,
        'zoom' => $zoom ?? '15',
        'markers' => $markers ?? json_encode([]),
    ]) }}>
</div>
