<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Setup Roles') }}
        </h2>
    </x-slot>

    <div class="card">
        <div class="card-body flex flex-col gap-6">
            <h6 class="text-lg text-gray-600 font-semibold">{{ $title }}</h6>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/role_menus/{{ $role->id }}" class="flex flex-col gap-6">
                        @method('PUT')
                        @csrf
                        @foreach ($menus as $menu)
                            <div>
                                <input type="checkbox" id="menu_{{ $menu->id }}" name="menus[]" value="{{ $menu->id }}" 
                                    {{ in_array($menu->id, $selectedMenus) ? 'checked' : '' }}
                                    class="menu-parent" data-menu-id="{{ $menu->id }}">
                                <label class="px-3" for="menu_{{ $menu->id }}">{{ $menu->name }}</label>
                                
                                @if ($menu->children->isNotEmpty())
                                    <div class="px-4 py-2">
                                        @foreach ($menu->children as $child)
                                            <div class="py-2">
                                                <input type="checkbox" id="menu_{{ $child->id }}" name="menus[]" value="{{ $child->id }}" 
                                                    {{ in_array($child->id, $selectedMenus) ? 'checked' : '' }}
                                                    class="menu-child menu-child-{{ $menu->id }}">
                                                <label class="px-3" for="menu_{{ $child->id }}">{{ $child->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @endforeach
                        <div class="flex justify-start">
                            <button
                                class="btn text-sm text-white font-medium w-fit hover:bg-blue-700 mr-4">Submit</button>
                            <a href="/role_menus"
                                class="btn text-sm font-medium w-fit bg-red-500 text-white hover:bg-red-600">
                                Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const parentCheckboxes = document.querySelectorAll('.menu-parent');
    
            parentCheckboxes.forEach(parent => {
                parent.addEventListener('click', function() {
                    const menuId = parent.getAttribute('data-menu-id');
                    const childCheckboxes = document.querySelectorAll(`.menu-child-${menuId}`);
                    childCheckboxes.forEach(child => {
                        child.checked = parent.checked;
                    });
                });
            });
        });
    </script>

</x-app-layout>
