<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#9B1D41] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#7A1833] focus:bg-[#7A1833] active:bg-[#5C1325] focus:outline-none focus:ring-2 focus:ring-[#9B1D41] focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
