<x-layout>
    <div class="w-full grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
        <div class="w-full h-full rounded-md p-5 bg-white shadow-lg">
            <div class="flex items-start justify-between">
                <h3 class="font-primary text-slate-800 text-xl font-bold">Total Move in</h3>
                <div class="w-16 h-16 bg-slate-200 rounded-full flex items-center justify-center">
                    <i class="ri-archive-fill text-slate-800 text-xl"></i>
                </div>
            </div>
            <h1 class="text-3xl font-primary font-extrabold mb-3">300</h1>
            <small class="px-3 bg-slate-300 p-1 font-primary rounded-md animate-pulse">Person</small>
        </div>
    </div>
    <div class="w-full my-5 flex items-center justify-end">
        <a 
        href="{{ route('list') }}"
        class="px-5 py-2 bg-slate-800 text-white flex items-center gap-2 rounded-md font-primary text-sm hover:bg-slate-900
        transition-all ease-in-out">
            <i class="ri-file-list-3-fill text-white"></i>
            Import New Move In
        </a>
    </div>
    <div class="relative overflow-x-auto bg-white">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-sm text-gray-700 uppercase bg-gray-50 bg-slate-800">
                <tr>
                    <th scope="col" class="px-6 py-4 text-white font-primary rounded-tl-lg">
                        Fullname
                    </th>
                    {{-- <th scope="col" class="px-6 py-4 text-white font-primary">
                        Email
                    </th> --}}
                    <th scope="col" class="px-6 py-4 text-white font-primary">
                        Phone
                    </th>
                    <th scope="col" class="px-6 py-4 text-white font-primary">
                        Marketing Desc
                    </th>
                    <th scope="col" class="px-6 py-4 text-white font-primary">
                        Move In Date
                    </th>
                    <th scope="col" class="px-6 py-4 text-white font-primary rounded-tr-lg">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($moveIn as $movein)
                    <tr class="border-b border-gray-200 hover:bg-gray-300 cursor-pointer" 
                    onclick="getId({
                        id: {{ $movein->id }},
                        fullname: '{{ $movein->fullname }}',
                        phone: '{{ $movein->phone }}',
                        marketing_desc: '{{ $movein->marketing_desc }}',
                        date: '{{ $movein->date }}'
                    })">

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ str_replace('"', '', $movein->fullname) }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $movein->phone }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $movein->marketing_desc }}
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($movein->date)->toFormattedDateString() }}
                        </td>
                        <td class="px-6 py-4 flex items-center gap-3 z-[99]">
                            <a href="#" class="text-slate-800 text-2xl border border-gray-200 rounded-md px-2 py-1 hover:bg-slate-800 transition-all ease-in-out hover:text-white">
                                <i class="ri-edit-box-fill"></i>
                            </a>
                            <a href="#"  onclick="event.stopPropagation();" class="text-red-500 text-2xl border border-gray-200 rounded-md px-2 py-1 hover:bg-red-500 transition-all ease-in-out hover:text-white">
                                <i class="ri-delete-bin-fill"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
        <div class="mt-10 p-5">
            {{ $moveIn->links() }}
        </div>
    </div>

    <div id="viewSelectedRow" class="w-full flex items-center justify-center h-screen absolute inset-0 bg-black/50 overflow-hidden" onclick="closeModal()">
        <div class="w-[30rem] mx-5 px-10 py-5 bg-white z-[99] rounded-md transition-all ease-in-out delay-100" onclick="event.stopPropagation();">
            <h3 class="font-primary text-xl font-semibold">Storer Info</h3>
            <p class="text-sm font-karla text-gray-500">Here's the info of the storer</p>
            <form class="w-full mt-5 flex flex-col gap-5">
                @csrf
                <div>
                    <label for="fullname" class="font-primary text-secondary cursor-pointer">Fullname</label>
                    <input type="text" id="fullname" name="fullname" class="font-slate-900 p-2 w-full border rounded-md mt-1" />    
                </div>
                <div>
                    <label for="phone" class="font-primary text-secondary cursor-pointer">Phone</label>
                    <input type="text" id="phone" name="phone" class="font-slate-900 p-2 w-full border rounded-md mt-1" />    
                </div>
                <div>
                    <label for="marketingType" class="font-primary text-secondary cursor-pointer">Marketing Type</label>
                    <input type="text" id="marketingType" name="marketingType" class="font-slate-900 p-2 w-full border rounded-md mt-1" />    
                </div>
                <div>
                    <label for="moveInDate" class="font-primary text-secondary cursor-pointer">Move in Date</label>
                    <input type="date" id="moveInDate" name="moveInDate" class="font-slate-900 p-2 w-full border rounded-md mt-1" disabled/>    
                </div>

                <div class="mt-10">
                    <button type="submit" class="bg-slate-800 mt-5 w-full p-3 rounded-md text-white font-primary hover:bg-slate-900 focus:outline-none focus:ring-4 focus:ring-slate-800/20 focus:ring-offset-2 focus:ring-offset-slate-900">
                        Edit
                    </button>
                </div>
            </form>

        </div>
    </div>

    <script>
        const showModal = document.getElementById('viewSelectedRow');
        
        function getId(movein){
            showModal.classList.remove('hidden');
            document.getElementById('fullname').value = movein.fullname;
            document.getElementById('phone').value = movein.phone;
            document.getElementById('marketingType').value = movein.marketing_desc;
            document.getElementById('moveInDate').value = movein.date;
            console.log(movein);
            
        }

        function closeModal(){
            return showModal.classList.add('hidden')
        }
    </script>
</x-layout>
