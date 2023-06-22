<a href="{{ $url ?? "#" }}" class="flex items-center {{ getThemeColors()?->primary?->link ?? '' }} ">
    <i class="{{ $classIcon ?? '' }} mr-2"></i>
    <span class="text-nav lg:block">
        {{ $text ?? ($slot ?? '') }}
    </span>
</a>
