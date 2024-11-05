@props([
    'active' => true,
    'type' => 'anchor'
])

@php
    $classList = "rounded-md px-3 py-2 text-sm font-medium " .
                ($active ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white");

    $href = '/' . strtolower($slot ?? '')
@endphp

@if($type === 'anchor')
    <a {{ $attributes->merge(['class' => $classList, 'href' => $href, 'aria-current' => $active ? 'page' : '']) }}>{{ $slot }}</a>
@else
    <button {{ $attributes->merge(['class' => $classList, 'onclick' => "window.location.href='$href'"]) }}></button>
@endif
