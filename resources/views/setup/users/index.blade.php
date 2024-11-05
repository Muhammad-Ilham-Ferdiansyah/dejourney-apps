<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Setup users') }}
        </h2>
    </x-slot>

    <div class="card h-full px-5">
        <div class="card-body">
            <h4 class="text-gray-600 text-lg font-semibold mb-6"> {{ $title }}</h4>
            <div class="relative overflow-x-auto mb-5">
                <!-- table -->
                <a href="/users/create"
                    class="py-3 mb-5 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                    <i class="ti ti-plus"></i>
                    Tambah
                </a>
                @if (session('status') === 'user-created')
                <div class="bg-teal-400 border text-sm text-teal-500 rounded-md p-3 mb-3" role="alert">
                    <span x-data="{ show: true }" x-show="show" x-transition
                        x-init="setTimeout(() => show = false, 2000)" class="font-bold">
                        {{ __('User Created Sucessfully.') }}
                    </span>
                </div>
                @elseif (session('status') === 'user-updated')
                <div class="bg-teal-400 border text-sm text-teal-500 rounded-md p-3 mb-3" role="alert">
                    <span x-data="{ show: true }" x-show="show" x-transition
                        x-init="setTimeout(() => show = false, 2000)" class="font-bold">
                        {{ __('User Updated Sucessfully.') }}
                    </span>
                </div>
                @elseif (session('status') === 'role-deleted')
                <div class="bg-teal-400 border text-sm text-teal-500 rounded-md p-3 mb-3" role="alert">
                    <span x-data="{ show: true }" x-show="show" x-transition
                        x-init="setTimeout(() => show = false, 2000)" class="font-bold">
                        {{ __('User Deleted Sucessfully.') }}
                    </span>
                </div>
                @endif
                <table class="text-left w-full whitespace-nowrap text-sm border-collapse border-slate-500">
                    <thead class="text-gray-700 ">
                        <tr class="font-semibold text-gray-600">
                            <th scope="col" class="p-4 border border-slate-600">#</th>
                            <th scope="col" class="p-4 border border-slate-600">Nama User/Username</th>
                            <th scope="col" class="p-4 border border-slate-600">Email</th>
                            <th scope="col" class="p-4 border border-slate-600">Nama Role</th>
                            <th scope="col" class="p-4 border border-slate-600">Status</th>
                            <th scope="col" class="p-4 border border-slate-600">Joined At</th>
                            <th scope="col" class="p-4 border border-slate-600">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($users->count() === 0)
                        <tr>
                            <td colspan="7" class="p-4 border border-slate-700 text-center">No data!</td>
                        </tr>
                        @endif
                        @foreach ($users as $user)
                        <tr>
                            <td class="p-4 border border-slate-700 font-semibold text-gray-600 ">{{ $loop->iteration }}</td>
                            <td class="p-4 border border-slate-700">
                                <div class="flex flex-col gap-1">
                                    <h3 class=" font-semibold text-gray-600">
                                        {{ $user->name }}
                                    </h3>
                                    <span class="font-normal text-gray-500">
                                        {{ $user->username }}
                                    </span>
                                </div>
                            </td>
                            <td class="p-4 border border-slate-700">{{ $user->email }}</td>
                            <td class="p-4 border border-slate-700">
                                @if($user->role_id == '1')
                                <span class="inline-flex items-center py-[3px] px-[10px] rounded-2xl font-semibold text-white bg-teal-500">{{ $user->role->name }}</span>
                                @else
                                <span class="inline-flex items-center py-[3px] px-[10px] rounded-2xl font-semibold text-white bg-red-500">{{ $user->role->name }}</span>
                                @endif
                            </td>
                            <td class="p-4 border border-slate-700">
                                @if($user->is_active == '1')
                                <span class="inline-flex items-center py-[3px] px-[10px] rounded-2xl font-semibold text-white bg-teal-500">Aktif</span>
                                @else
                                <span class="inline-flex items-center py-[3px] px-[10px] rounded-2xl font-semibold text-white bg-red-500">Tidak Aktif</span>
                                @endif
                            </td>
                            <td class="p-4 border border-slate-700">{{ $user->created_at->diffForHumans() }}</td>
                            <td class="p-4 border border-slate-700">
                                <a href="/users/{{ $user->id }}/edit"
                                    class="py-3 px-4 mb-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-cyan-500 text-white hover:bg-cyan-600">
                                    <i class="ti ti-pencil"></i>
                                    Edit
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $users->links() }}
        </div>
    </div>




</x-app-layout>
