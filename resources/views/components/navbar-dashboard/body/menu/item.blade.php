<a href="#" class="flex items-center py-2 px-6 gap-2 {{ getThemeColors()?->primary?->link ?? '' }} ">
    <i class="{{ $classIcon ?? '' }}"></i>
    <span class="text-nav lg:block">
        {{ $text ?? ($slot ?? '') }}
    </span>
</a>
