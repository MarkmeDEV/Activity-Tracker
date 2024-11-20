@section('title', 'Register | Locnstor')
<x-layout>

    <div class="w-full flex justify-center mt-10">
        <div class="w-[35rem] shadow-lg border border-gray-200 py-5 flex flex-col px-10">
            <div class="flex flex-col items-center">
                <h1 class="font-bold font-primary text-slate-800 text-2xl">Sign Up</h1>
                <p class="font-primary text-gray-600">Sign in to view the kwh dashboard</p>
            </div>
            <form class="mt-10" action="" method="POST"> 
                @csrf
                <div class="w-full flex flex-col">
                    <label for="fullname" class="font-primary text-secondary cursor-pointer">Fullname</label>
                    <input type="text" value="{{ old('fullname') }}" name="fullname" class="font-slate-900 p-2 w-full border rounded-md mt-1
                    @error('fullname')
                        border-red-500"
                    @enderror
                    />
                    @error('fullname')
                        <p class="text-red-500 font-karla text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full flex flex-col">
                    <label for="email" class="font-primary text-secondary cursor-pointer">Email</label>
                    <input type="text" value="{{ old('email') }}" name="email" class="font-slate-900 p-2 w-full border rounded-md mt-1
                    @error('email')
                        border-red-500"
                    @enderror
                    />
                    @error('email')
                        <p class="text-red-500 font-karla text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full flex flex-col mt-5">
                    <label for="password" class="font-primary text-secondary cursor-pointer">Password</label>
                    <input type="password" name="password" class="font-slate-900 p-2 w-full border rounded-md mt-1
                    @error('password')
                        border-red-500"
                    @enderror
                    />
                    @error('password')
                        <p class="text-red-500 font-karla text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full flex flex-col mt-5">
                    <label for="password_confimation" class="font-primary text-secondary cursor-pointer">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="font-slate-900 p-2 w-full border rounded-md mt-1" />
                </div>
                <button class="bg-slate-800 mt-5 w-full p-3 rounded-md text-white font-primary hover:bg-slate-900 focus:outline-none focus:ring-4 focus:ring-slate-800/20 focus:ring-offset-2 focus:ring-offset-slate-900">
                    Submit
                </button>

                <div class="mt-5 text-center">
                    <p class="font-primary text-slate-900">Already have an account? <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-700">Sign In</a></p>
                </div>
                <div class="mt-10 flex justify-end gap-2 items-center">
                    <a href="#" class="font-primary text-gray-400 text-sm">Concern</a> 
                    <span class="text-sm text-gray-400">|</span>
                    <a href="#" class="font-primary text-gray-400 text-sm">Terms and Condition</a>                     
                </div>
            </form>  
        </div>
    </div>
    @if(session('success'))
        <x-modal-message type="success" :message="session('success')" />
    @endif

</x-layout>