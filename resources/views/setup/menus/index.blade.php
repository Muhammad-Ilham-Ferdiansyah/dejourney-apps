<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Setup Menu') }}
        </h2>
    </x-slot>

    <div class="card h-full px-5">
        <div class="card-body">
            <h4 class="text-gray-600 text-lg font-semibold mb-6"> {{ $title }}</h4>
            <div class="relative overflow-x-auto mb-5">
                <!-- table -->
                <a href="/menus/create"
                    class="py-3 mb-5 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                    <i class="ti ti-plus"></i>
                    Tambah
                </a>
                @if (session('status') === 'menu-created')
                <div class="bg-teal-400 border text-sm text-teal-500 rounded-md p-3 mb-3" role="alert">
                    <span x-data="{ show: true }" x-show="show" x-transition
                        x-init="setTimeout(() => show = false, 2000)" class="font-bold">
                        {{ __('Menu Created Sucessfully.') }}
                    </span>
                </div>
                @elseif (session('status') === 'menu-updated')
                <div class="bg-teal-400 border text-sm text-teal-500 rounded-md p-3 mb-3" role="alert">
                    <span x-data="{ show: true }" x-show="show" x-transition
                        x-init="setTimeout(() => show = false, 2000)" class="font-bold">
                        {{ __('Menu Updated Sucessfully.') }}
                    </span>
                </div>
                @elseif (session('status') === 'menu-deleted')
                <div class="bg-teal-400 border text-sm text-teal-500 rounded-md p-3 mb-3" role="alert">
                    <span x-data="{ show: true }" x-show="show" x-transition
                        x-init="setTimeout(() => show = false, 2000)" class="font-bold">
                        {{ __('Menu Deleted Sucessfully.') }}
                    </span>
                </div>
                @endif
                <table class="text-left w-full whitespace-nowrap text-sm border-collapse border-slate-500">
                    <thead class="text-gray-700 ">
                        <tr class="font-semibold text-gray-600">
                            <th scope="col" class="p-4 border border-slate-600">#</th>
                            <th scope="col" class="p-4 border border-slate-600">Nama Menu/Deskripsi</th>
                            <th scope="col" class="p-4 border border-slate-600">Jenis Menu</th>
                            <th scope="col" class="p-4 border border-slate-600">Status</th>
                            <th scope="col" class="p-4 border border-slate-600">Order No</th>
                            <th scope="col" class="p-4 border border-slate-600">Created At</th>
                            <th scope="col" class="p-4 border border-slate-600">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($menus->count() === 0)
                        <tr>
                            <td colspan="7" class="p-4 border border-slate-700 text-center">No data!</td>
                        </tr>
                        @endif
                        @foreach ($menus as $menu)
                        <tr>
                            <td class="p-4 border border-slate-700 font-semibold text-gray-600 ">{{ $loop->iteration }}</td>
                            <td class="p-4 border border-slate-700">
                                <div class="flex flex-col gap-1">
                                    <h3 class=" font-semibold text-gray-600">
                                        {{ $menu->name }}
                                    </h3>
                                    <span class="font-normal text-gray-500">
                                        {{ $menu->description }}
                                    </span>
                                </div>
                            </td>
                            <td class="p-4 border border-slate-700">
                                @if($menu->main_id == '0')
                                <span class="inline-flex items-center py-[3px] px-[10px] rounded-2xl font-semibold bg-blue-600 text-white">Menu Induk</span>
                                @else
                                <span class="inline-flex items-center py-[3px] px-[10px] rounded-2xl font-semibold text-white bg-cyan-500">Sub Menu</span>
                                @endif
                            </td>
                            <td class="p-4 border border-slate-700">
                                @if($menu->published == '1')
                                <span class="inline-flex items-center py-[3px] px-[10px] rounded-2xl font-semibold text-white bg-teal-500">Aktif</span>
                                @else
                                <span class="inline-flex items-center py-[3px] px-[10px] rounded-2xl font-semibold text-white bg-red-500">Tidak Aktif</span>
                                @endif
                            </td>
                            <td class="p-4 border border-slate-700">{{ $menu->orderno }}</td>
                            <td class="p-4 border border-slate-700">{{ $menu->created_at->diffForHumans() }}</td>
                            <td class="p-4 border border-slate-700">
                                <a href="/menus/{{ $menu->id }}/edit"
                                    class="py-3 px-4 mb-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-cyan-500 text-white hover:bg-cyan-600">
                                    <i class="ti ti-pencil"></i>
                                    Edit
                                </a>
                                <a href="{{ route('menus.confirm-delete', $menu->id) }}"
                                    class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md bg-red-500 text-white hover:bg-red-600">
                                    <i class="ti ti-trash"></i>
                                    Delete
                                </a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $menus->links() }}
        </div>
    </div>




</x-app-layout>
