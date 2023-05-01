<div class="flex">

    <!-- Barra lateral -->
    <div class="flex flex-col w-64 lg:w-64 h-screen py-4 bg-white dark:bg-gray-900" id="sidebar">
        {{ $leftBar ?? '' }}
    </div>

    <!-- Conteúdo -->
    <div
        class="main flex-1 bg-gray-200 dark:bg-gray-900 border border-t-0 border-gray-400 border-opacity-30 dark:border-opacity-10">
        <div class="mx-auto p-10">
            {{ $content ?? '' }}
        </div>
    </div>

</div>
