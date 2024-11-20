<div id="{{ $type }}Modal" class="fixed top-5 right-5 flex items-start justify-end">
    <div 
        data-aos="fade-left"
        class="relative w-[35rem] border-l-4 {{ $type === 'error' ? 'border-red-700 bg-red-200' : 'border-green-700 bg-green-200' }} rounded-md shadow-lg bg-white flex items-center gap-2 p-4">
        
        <div class="absolute bottom-0 right-0 w-full h-1 {{ $type === 'error' ? 'bg-red-300' : 'bg-green-300' }} overflow-hidden">
            <div id="{{ $type }}ProgressBar" class="h-full {{ $type === 'error' ? 'bg-red-600' : 'bg-green-600' }}" style="width: 0;"></div>
        </div>

        <div class="w-10 h-10 flex items-center justify-center p-2 rounded-full {{ $type === 'error' ? 'bg-red-500' : 'bg-green-500' }} cursor-pointer hover:scale-[1.01]">
            <i class="fa-solid fa-check text-white"></i>
        </div>
        <h1 class="text-slate-800 font-primary">{{ $message }}</h1>
    </div>
</div>

<script>
    const progressBar = document.getElementById('{{ $type }}ProgressBar');
    progressBar.style.transition = 'width 3s linear'; 
    progressBar.style.width = '100%';
    function closeModal() {
        document.getElementById('{{ $type }}Modal').style.display = 'none';
    }
    setTimeout(closeModal, 3000);
</script>