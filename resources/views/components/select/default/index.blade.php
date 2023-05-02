<select {{ $attributes->merge(['class' => 'form-select block w-full px-4 py-3 rounded-md shadow-sm focus:outline-none focus:ring-2
focus:ring-lime-500 focus:border-lime-500 border-gray-300 disabled:opacity-40']) }}>
    {{ $slot }}
</select>
