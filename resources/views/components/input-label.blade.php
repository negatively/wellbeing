@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-md font-black text-gray-900']) }}>
    {{ $value ?? $slot }}
</label>
