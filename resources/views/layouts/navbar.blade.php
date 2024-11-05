   <!--  Header Start -->
   <header class="full-container w-full text-sm">
    <!-- ========== HEADER ========== -->
    <nav class=" w-full bg-gray-800  flex items-center justify-between" aria-label="Global">
        <ul class="icon-nav flex items-center gap-4">
            <li class="relative xl:hidden">
                <a class="text-xl  icon-hover cursor-pointer text-heading" id="headerCollapse"
                    data-hs-overlay="#application-sidebar-brand"
                    aria-controls="application-sidebar-brand" aria-label="Toggle navigation"
                    href="javascript:void(0)">
                    <i class="ti ti-menu-2 relative z-1"></i>
                </a>
            </li>
            <div class="px-4 py-4">
                <h2 class="font-semibold text-3xl">dejournal apps</h2>
            </div>
        </ul>
        <div class="flex items-center gap-4 px-4 py-4">
            <div>{{ Auth::user()->name }}</div>
            <div
            class="hs-dropdown relative inline-flex [--placement:bottom-right] sm:[--trigger:hover]">
                <a class="relative hs-dropdown-toggle cursor-pointer align-middle rounded-full">
                    @if (auth()->user()->profile_photo_path)
                    <img class="object-cover w-9 h-9 rounded-full"
                        src="{{ asset(auth()->user()->profile_photo_path) }}" alt="{{ auth()->user()->name }}" aria-hidden="true">
                    @else
                    <img class="object-cover w-9 h-9 rounded-full"
                        src="{{ asset('assets/images/profile/user-1.jpg') }}" alt="{{ auth()->user()->name }}" aria-hidden="true">
                    @endif
                </a>
                <div class="card hs-dropdown-menu transition-[opacity,margin] border border-gray-400 rounded-[7px] duration hs-dropdown-open:opacity-100 opacity-0 mt-2 min-w-max  w-[200px] hidden z-[12]"
                    aria-labelledby="hs-dropdown-custom-icon-trigger">
                    <div class="card-body p-0 py-2">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <a href="javscript:void(0)"
                            class="flex gap-2 items-center px-4 py-[6px] hover:bg-blue-500">
                            <i class="ti ti-mail text-gray-500 text-xl"></i>
                            <p class="text-sm text-gray-500">My Account</p>
                        </a>
                        <a href="javscript:void(0)"
                            class="flex gap-2 items-center px-4 py-[6px] hover:bg-blue-500">
                            <i class="ti ti-list-check text-gray-500 text-xl "></i>
                            <p class="text-sm text-gray-500">My Task</p>
                        </a>
                        <div class="px-4 py-5 grid">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-button-link :href="route('logout')" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-button-link>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- ========== END HEADER ========== -->
</header>
<!--  Header End -->