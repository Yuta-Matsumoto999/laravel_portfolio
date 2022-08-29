<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full px-4 py-4 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:outline-none focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 font-semibold']) }}>
    {{ $slot }}
</button>
