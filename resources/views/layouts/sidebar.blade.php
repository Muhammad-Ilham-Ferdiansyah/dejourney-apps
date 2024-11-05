<?php 
use App\Models\Menu;
use App\Models\RoleMenu;
$role = Auth::user()->role;

// Ambil menu induk yang diizinkan untuk role tersebut, dengan submenu (children)
$menus = Menu::whereIn('id', $role->menus->pluck('id'))
             ->where('main_id', 0) // Hanya menu induk
             ->with(['children' => function($query) use ($role) {
                 $query->whereIn('id', $role->menus->pluck('id'));
             }])
             ->get();
?>
<aside id="application-sidebar-brand"
class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full  transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed top-0 with-vertical h-screen z-[999] flex-shrink-0 border-r-[1px] w-[270px] border-gray-400  bg-white left-sidebar transition-all duration-300">
<div class="p-5">
    <a href="../" class="text-nowrap">
        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
    </a>
</div>
<div class="scroll-sidebar" data-simplebar="">
    <div class="px-6 mt-8">
        <nav class="w-full flex flex-col sidebar-nav">
            <ul id="sidebarnav" class="text-gray-600 text-sm">
                @foreach ($menus as $menu)
                    <li class="text-xs font-bold py-5">
                        <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                        <span>{{ Str::upper($menu->name) }}</span>
                    </li>
                    @if ($menu->children->isNotEmpty())
                        @foreach ($menu->children as $submenu)
                            <li class="sidebar-item">
                                <a class="sidebar-link gap-3 py-2 px-3 rounded-md w-full flex items-center hover:text-blue-600 hover:bg-blue-500"
                                    href="{{ $submenu->link }}">
                                    <i class="{{ $submenu->icon }} text-xl"></i> <span>{{ $submenu->name }}</span>
                                </a>
                            </li>
                        @endforeach
                    @endif
                @endforeach
            </ul>
        </nav>
    </div>
</div>


<!-- </aside> -->
</aside>
