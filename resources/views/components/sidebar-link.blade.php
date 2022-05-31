@props(['active'])

@php
$classes = ($active ?? false)
            ?  'flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-900 text-ellipsis whitespace-nowrap rounded bg-gray-100'
            : 'flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-100 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }} href="#!" data-mdb-ripple="true" data-mdb-ripple-color="dark">
    {{ $slot }}
</a>