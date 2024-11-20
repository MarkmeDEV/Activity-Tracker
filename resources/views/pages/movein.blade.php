<x-layout>
    <div class="w-full flex items-center mt-10 flex-col gap-5">
        <div class="flex flex-col items-center"> 
            <h1 class="font-primary text-2xl font-semibold">Upload the move in file </h1>
            <p class="font-primary text-gray-400">Drag or click the box inside to upload a file</p>
        </div>
        <div class="flex items-center justify-center w-full max-w-[50rem] mt-10">
            <form class="w-full" method="POST" enctype="multipart/form-data" action="{{ route('movein.store') }}">
                @csrf
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-200 transition-all ease-in-out">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">.CSV with UTF-8 or Without (MAX. 2MB)</p>
                    </div>
                    <input id="dropzone-file" type="file" name="csv_file" class="hidden" accept=".csv" />
                </label>

                <div id="uploaded-file-info" class="mt-5 w-full max-w-[50rem] p-4 bg-gray-100 rounded-md flex justify-between items-center hidden">
                    <div>
                        <h2 class="font-primary text-lg font-semibold mb-2">Uploaded File</h2>
                        <p id="file-name" class="text-gray-600"></p>
                    </div>
                    <button id="remove-file-button" class="text-red-500 font-semibold hover:text-red-700 transition-all ease-in-out">
                        Remove
                    </button>
                </div>

                <button class="mt-10 w-full bg-slate-800 p-2 text-white font-primary rounded-md hover:bg-slate-900/80 transition-all ease-in-out">
                    Submit
                </button>
            </form>
        </div> 
    </div>
    <script>
        const fileInput = document.getElementById('dropzone-file');
        const fileInfo = document.getElementById('uploaded-file-info');
        const fileNameDisplay = document.getElementById('file-name');
        const removeButton = document.getElementById('remove-file-button');
    
        fileInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                // Show file information
                fileNameDisplay.textContent = `File Name: ${file.name}`;
                fileInfo.classList.remove('hidden');
            }
        });
    
        removeButton.addEventListener('click', function(e) {
            e.preventDefault();
            // Reset file input
            fileInput.value = '';
            // Hide file information
            fileInfo.classList.add('hidden');
            // Clear displayed file name
            fileNameDisplay.textContent = '';
        });
    </script>
    @if(session('success'))
        <x-modal-message type="success" :message="session('success')" />
    @endif
    @if($errors->has('csv_file'))
        <x-modal-message type="error" :message="$errors->first('csv_file')" />
    @endif
</x-layout>