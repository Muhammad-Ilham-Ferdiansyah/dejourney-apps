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
                <form method="POST" action="/roles/{{ $role->id }}" class="flex flex-col gap-6">
                    @method('PUT')
                    @csrf
                    <div>
                        <label for="name"
                            class="block text-sm font-semibold mb-2 text-gray-600">Nama Role</label>
                        <input type="text" id="name" name="name"
                            class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 "
                            placeholder="Nama Role" aria-describedby="hs-input-helper-text" value="{{ old('name', $role->name) }}">
                        @error('name')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label for="description"
                            class="block text-sm font-semibold mb-2 text-gray-600">Description</label>
                       <textarea class="responsive-textarea" name="description" id="description">{{ old('description', $role->description) }}</textarea>
                       @error('description')
                            <div class="text-red-500">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="flex justify-start">
                      <button class="btn text-sm text-white font-medium w-fit hover:bg-blue-700 mr-4">Submit</button>
                      <a href="/roles"
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