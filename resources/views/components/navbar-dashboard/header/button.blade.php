<button class="{{ getThemeColors()?->primary?->button ?? '' }} px-3 py-2 rounded-md text-sm font-medium hidden lg:block">
    {{ $text ?? ($slot ?? '') }}
</button>
