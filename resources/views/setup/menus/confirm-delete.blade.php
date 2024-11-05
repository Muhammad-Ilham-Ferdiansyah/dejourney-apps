<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Setup Menu') }}
        </h2>
    </x-slot>

    <div class="card">
        <div class="card-body flex flex-col gap-6">
            <h6 class="text-lg text-gray-600 font-semibold">{{ $title }}</h6>
            <div class="card">
                <div class="card-body">
                <form method="POST" action="{{ route('menus.destroy', $menu->id) }}" class="flex flex-col gap-6">
                    @method('DELETE')
                    @csrf
                    <div>
                        <label for="main_id"
                            class="block text-sm font-semibold mb-2 text-gray-600">Pilih Jenis Menu</label>
                            <select name="main_id" id="main_id" class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 disabled-form" disabled>
                                <option disabled>Jenis Menu</option>
                                <option value="0" {{ $menu->main_id == '0' ? 'selected' : '' }}>Menu Utama</option>
                                <option value="1" {{ $menu->main_id == '1' ? 'selected' : '' }}>Sub Menu</option>
                            </select>
                        @error('main_id')
                            <div class="text-red-500">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="name"
                            class="block text-sm font-semibold mb-2 text-gray-600">Nama Menu</label>
                        <input type="text" id="name" name="name"
                            class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 disabled-form"
                            placeholder="Nama Menu" aria-describedby="hs-input-helper-text" value="{{ old('name', $menu->name) }}" disabled>
                        @error('name')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                   
                    <div>
                        <label for="description"
                            class="block text-sm font-semibold mb-2 text-gray-600">Description</label>
                       <textarea class="responsive-textarea disabled-form" name="description" id="description" disabled>{{ old('description', $menu->description) }}</textarea>
                       @error('description')
                            <div class="text-red-500">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="orderno"
                            class="block text-sm font-semibold mb-2 text-gray-600">Order No</label>
                        <input type="text" id="orderno" name="orderno"
                            class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 disabled-form"
                            placeholder="Order No" aria-describedby="hs-input-helper-text" value="{{ old('orderno', $menu->orderno) }}" disabled>
                        @error('orderno')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label for="published"
                            class="block text-sm font-semibold mb-2 text-gray-600">Pilih Status Menu</label>
                            <select name="published" class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 disabled-form" disabled>
                                <option disabled>Status</option>
                                <option value="1" {{ $menu->published == '1' ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ $menu->published == '0' ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                        @error('published')
                            <div class="text-red-500">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="flex justify-start">
                      <button class="btn text-sm font-medium w-fit bg-red-500 text-white hover:bg-red-600 mr-4">Hapus</button>
                      <a href="/menus"
                          class="btn text-sm text-white font-medium w-fit hover:bg-blue-700 mr-4">
                          Kembali
                      </a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>