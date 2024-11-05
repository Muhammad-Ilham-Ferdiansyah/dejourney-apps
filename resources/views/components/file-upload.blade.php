<div class="flex flex-col items-start gap-2">
    <label for="{{ $name }}" class="text-gray-700 font-semibold">{{ $label ?? 'Upload Profile Photo' }}</label>
    <input type="file" name="{{ $name }}" id="profile_photo" accept="image/*" class="block w-full text-sm text-gray-500
        file:mr-4 file:py-2 file:px-4
        file:rounded-full file:border-0
        file:text-sm file:font-semibold
        file:bg-blue-600 file:text-white
        hover:file:bg-blue-700"
        {{ $attributes }} onchange="previewImage()">

    @error($name)
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror

    <div class="mt-3" id="preview-container" style="display: none;">
        <img class="img-preview w-16 h-16 object-cover" alt="Preview Profile Photo">
    </div>
</div>

<script>
    function previewImage() {
        const imageInput = document.querySelector('#profile_photo');
        const previewContainer = document.querySelector('#preview-container');
        const imgPreview = document.querySelector('.img-preview');

        if (imageInput.files && imageInput.files[0]) {
            const oFReader = new FileReader();
            oFReader.readAsDataURL(imageInput.files[0]);

            oFReader.onload = function(oFREvent) {
                previewContainer.style.display = 'block';
                imgPreview.src = oFREvent.target.result;
            }
        }
    }
</script>
