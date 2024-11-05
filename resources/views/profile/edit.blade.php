<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="card">
        <div class="card-body">
          <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6">
            <div class="flex flex-col gap-6">
              <h6 class="text-lg text-gray-600 font-semibold">Photo Profile</h6>
              <div class="card overflow-hidden">
                <div class=" bg-white">
                  @if (auth()->user()->profile_photo_path)
                    <img src="{{ asset(auth()->user()->profile_photo_path) }}" alt="Profile Photo" class="w-full h-auto rounded-t-xl">
                  @else
                    <img src="{{ asset('assets/images/profile/user-1.jpg') }}" alt="Profile Photo" class="w-full h-auto rounded-t-xl">
                  @endif
                    <div class="card-body">
                        @include('profile.partials.update-profile-image-form')
                  </div>
                </div>
              </div>
            </div>
            <div class="flex flex-col gap-6">
              <h6 class="text-lg text-gray-600 font-semibold">Edit Profile</h6>
              <div class="card">
                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
              </div>
              
            </div>
            <div class="flex flex-col gap-6">
              <h6 class="text-lg text-gray-600 font-semibold">Change Password</h6>
              <div class="card">
                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</x-app-layout>
