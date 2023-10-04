@props([
    'is_even'
])

<tr @class([
    'transition cursor-pointer',
    'hover:bg-gray-200' => $is_even,
    'bg-gray-100 hover:bg-gray-300' => !$is_even,
])>
    {{ $slot }}
</tr>
