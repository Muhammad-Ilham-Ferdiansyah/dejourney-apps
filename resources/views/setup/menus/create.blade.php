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
                <form method="POST" action="/menus" class="flex flex-col gap-6">
                    @csrf
                    <div>
                        <label for="main_id"
                            class="block text-sm font-semibold mb-2 text-gray-600">Pilih Jenis Menu</label>
                            <select name="main_id" id="main_id" class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 ">
                                <option disabled>Jenis Menu</option>
                                <option value="0">Menu Utama</option>
                                <option value="1">Sub Menu</option>
                                @foreach ($menu_induk as $mi)
                                    <option value="{{ $mi->id }}">{{ $mi->name }}
                                        <span>[Menu Induk]</span></option>
                                @endforeach
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
                            class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 "
                            placeholder="Nama Menu" aria-describedby="hs-input-helper-text" value="{{ old('name') }}">
                        @error('name')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                   
                    <div>
                        <label for="description"
                            class="block text-sm font-semibold mb-2 text-gray-600">Description</label>
                       <textarea class="responsive-textarea" name="description" id="description">{{ old('description') }}</textarea>
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
                            class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 "
                            placeholder="Order No" aria-describedby="hs-input-helper-text" value="{{ old('orderno') }}">
                        @error('orderno')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label for="link"
                            class="block text-sm font-semibold mb-2 text-gray-600">Link</label>
                        <input type="text" id="link" name="link"
                            class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 "
                            placeholder="Link Href" aria-describedby="hs-input-helper-text" value="{{ old('link') }}">
                        @error('link')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label for="icon"
                            class="block text-sm font-semibold mb-2 text-gray-600">Icon <span class="underline">(ex: ti ti-user)</span></label>
                        <input type="text" id="icon" name="icon"
                            class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 "
                            placeholder="Icon Menu" aria-describedby="hs-input-helper-text" value="{{ old('icon') }}">
                        @error('icon')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label for="published"
                            class="block text-sm font-semibold mb-2 text-gray-600">Pilih Status Menu</label>
                            <select name="published" class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 ">
                                <option disabled>Status</option>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        @error('published')
                            <div class="text-red-500">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="flex justify-start">
                        <button class="btn text-sm text-white font-medium w-fit hover:bg-blue-700 mr-4">Submit</button>
                        <a href="/menus"
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