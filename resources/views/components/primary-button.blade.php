<button {{ $attributes->merge(['type' => 'submit', 'class' => 'py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-blue-600 text-white hover:bg-blue-700']) }}>
    {{ $slot }}
</button>
