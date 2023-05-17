<div class="inline-flex items-center justify-center">
    <label class="relative flex cursor-pointer items-center rounded-full p-3" for="checkbox-1" data-ripple-dark="true">
        <input type="checkbox"
            class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-lime-500 checked:bg-lime-500 checked:before:bg-lime-500 hover:before:opacity-10"
            id="checkbox-1" defaultChecked />
        <div
            class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-white opacity-0 transition-opacity peer-checked:opacity-100">
            <i class="fas fa-check"></i>
        </div>
    </label>
    @if (isset($label))
        <label for="checkbox-1"
            class="text-sm text-gray-700 dark:text-gray-300 cursor-pointer select-none">{{ $label }}</label>
    @endif
</div>
