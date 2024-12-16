@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'inline-flex items-center px-1 pt-1 border-b-2 border-[#FAEC02] text-[#FAEC02] text-lg font-extrabold leading-5 focus:outline-none focus:border-[#FAEC02] transition duration-150 ease-in-out'
                : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-[#FAEC02] text-lg font-extrabold leading-5 hover:text-[#FAEC02] dark:text-gray-400 hover:border-[#FAEC02] focus:outline-none focus:text-[#FAEC02] focus:border-[#FAEC02] transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
