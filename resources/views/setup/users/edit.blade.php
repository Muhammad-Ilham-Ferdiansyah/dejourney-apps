<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Setup User') }}
        </h2>
    </x-slot>

    <div class="card">
        <div class="card-body flex flex-col gap-6">
            <h6 class="text-lg text-gray-600 font-semibold">{{ $title }}</h6>
            <div class="card">
                <div class="card-body">
                <form method="POST" action="/users/{{ $user->id }}" class="flex flex-col gap-6">
                    @method('PUT')
                    @csrf
                    <div>
                        <label for="role_id"
                            class="block text-sm font-semibold mb-2 text-gray-600">Pilih Role User</label>
                            <select name="role_id" id="role_id" class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 ">
                                <option disabled>Role User</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $user->role_id }}" {{ $role->id == $user->role_id ? 'selected' : '' }}>{{ $role->name }}
                                @endforeach
                            </select>
                        @error('role_id')
                            <div class="text-red-500">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="name"
                            class="block text-sm font-semibold mb-2 text-gray-600">Nama</label>
                        <input type="text" id="name" name="name"
                            class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 "
                            placeholder="Nama User" aria-describedby="hs-input-helper-text" value="{{ old('name',$user->name) }}">
                        @error('name')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label for="username"
                            class="block text-sm font-semibold mb-2 text-gray-600">Username</label>
                        <input type="text" id="username" name="username"
                            class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 "
                            placeholder="Username" aria-describedby="hs-input-helper-text" value="{{ old('username',$user->username) }}">
                        @error('username')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label for="email"
                            class="block text-sm font-semibold mb-2 text-gray-600">Email</label>
                        <input type="email" id="email" name="email"
                            class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 "
                            placeholder="Email" aria-describedby="hs-input-helper-text" value="{{ old('email', $user->email) }}">
                        @error('email')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label for="is_active"
                            class="block text-sm font-semibold mb-2 text-gray-600">Pilih Status Aktif</label>
                            <select name="is_active" class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 ">
                                <option disabled>Status</option>
                                <option value="1" {{ $user->is_active == 1 ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ $user->is_active == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                        @error('is_active')
                            <div class="text-red-500">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="flex justify-start">
                        <button class="btn text-sm text-white font-medium w-fit hover:bg-blue-700 mr-4">Submit</button>
                        <a href="/users"
                          class="btn text-sm font-medium w-fit bg-red-500 text-white hover:bg-red-600">
                          Kembali
                        </a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>