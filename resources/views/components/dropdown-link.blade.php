<a {{ $attributes->merge(['class' => 'flex gap-2 items-center px-4 py-[6px] hover:bg-blue-500']) }}>
    <i class="ti ti-user text-gray-500 text-xl "></i>
    <p class="text-sm text-gray-500">{{ $slot }}</p>
</a>

