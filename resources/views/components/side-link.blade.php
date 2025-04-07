@props(['active', 'svgPath', 'icon'])

@php
    $classes = ($active ?? false)
                ? 'group inline-flex items-center w-full py-2 px-5 border-r-4 border-purple-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-purple-400/50 transition duration-150 ease-in-out'
                : 'group inline-flex items-center w-full py-2 px-5 border-r-4 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>

    <x-dynamic-component
        :component="$icon"
        class="w-5 h-5 mr-3 {{ $active ? 'text-purple-400' : 'text-gray-500 group-hover:text-primary' }}"
    />
    
    {{ $slot }}
</a>