@props(['disabled' => false, 'error' => false])

@php
$classes = ($error ?? false)
            ? 'mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-red-500 rounded-md'
            : 'mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md';
@endphp

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => $classes]) !!} >
  {{$slot}}
</select>
