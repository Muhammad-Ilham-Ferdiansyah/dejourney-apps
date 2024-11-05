<section>

    <form action="{{ route('profile.photo.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Menampilkan Komponen Upload Foto Profil -->
        <x-file-upload name="profile_photo" label="Upload Profile Photo" :currentPhoto="auth()->user()->profile_photo_url ?? null"/>
    
        <!-- Tombol Submit -->
        <div class="flex items-center gap-4 mt-3">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-image-updated')
            <div class="bg-teal-400 border text-sm text-teal-500 rounded-md p-3" role="alert">
                <span 
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="font-bold">
                    {{ __('Updated.') }}
                </span>
            </div>
            @endif
        </div>
    </form>
    
</section>
