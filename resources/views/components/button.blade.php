<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full px-2 py-4 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
