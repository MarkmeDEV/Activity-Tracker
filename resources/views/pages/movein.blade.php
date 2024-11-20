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
                    <tr class="border-b border-gray-200 hover:bg-gray-300 cursor-pointer" onclick="getId({{$movein->id}})">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ str_replace('"', '', $movein->fullname) }}
                        </th>
                        {{-- <td class="px-6 py-4">
                            {{ $movein->email }}
                        </td> --}}
                        <td class="px-6 py-4">
                            {{ $movein->phone }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $movein->marketing_desc }}
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($movein->date)->toFormattedDateString() }}
                        </td>
                        <td class="px-6 py-4 flex items-center gap-3">
                            <a href="#" class="text-slate-800 text-2xl border border-gray-200 rounded-md px-2 py-1 hover:bg-slate-800 transition-all ease-in-out hover:text-white">
                                <i class="ri-edit-box-fill"></i>
                            </a>
                            <a href="#" class="text-red-500 text-2xl border border-gray-200 rounded-md px-2 py-1 hover:bg-red-500 transition-all ease-in-out hover:text-white">
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
    <script>
        function getId(id){
            console.log(id);
        }
    </script>
</x-layout>
