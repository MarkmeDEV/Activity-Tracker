@section('title', 'Login')
<x-layout>

    <div class="w-full flex justify-center mt-10">
        <div class="w-[35rem] shadow-lg border rounded-md border-gray-200 py-5 flex flex-col px-10">
            <div class="flex flex-col items-center">
                <h1 class="font-bold font-primary text-slate-800 text-2xl">Sign In</h1>
                <p class="font-primary text-gray-600">Sign in to view the kwh dashboard</p>
            </div>
            <form class="mt-10" action="{{route('login')}}" method="POST"> 
                @csrf
                <div class="w-full flex flex-col">
                    <label for="email" class="font-primary text-secondary cursor-pointer">Email</label>
                    <input type="text" name="email" class="font-slate-900 p-2 w-full border rounded-md mt-1
                    @error('email') border-red-500 @enderror" value="{{ old('email') }}" />
                    @error('email')
                        <p class="text-red-500 font-karla text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full flex flex-col mt-5">
                    <label for="password" class="font-primary text-secondary cursor-pointer">Password</label>
                    <input type="password" name="password" class="font-slate-900 p-2 w-full border rounded-md mt-1
                    @error('password') border-red-500 @enderror" value="{{ old('password') }}" />
                    @error('password')
                        <p class="text-red-500 font-karla text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full flex items-center gap-1 justify-end mt-5">
                    <input name="remember_me" type="checkbox" id="remember_me">
                    <label for="remember_me" class="text-slate-900 font-primary">Remember me</label>
                </div>
                <button type="submit" class="bg-slate-800 mt-5 w-full p-3 rounded-md text-white font-primary hover:bg-slate-900 focus:outline-none focus:ring-4 focus:ring-slate-800/20 focus:ring-offset-2 focus:ring-offset-slate-900">
                    Submit
                </button>
                <div class="flex items-center justify-end text-slate-800 hover:text-black transition-all ease-in-out font-primary mt-5">
                    <a href="#">Forgot Password</a>
                </div>
                <div class="mt-5 text-center">
                    <p class="font-primary text-slate-900">I don't have an account. <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-700">Sign Up</a></p>
                </div>
                <div class="mt-10 flex justify-end gap-2 items-center">
                    <a href="#" class="font-primary text-gray-400 text-sm">Concern</a> 
                    <span class="text-sm text-gray-400">|</span>
                    <a href="#" class="font-primary text-gray-400 text-sm">Terms and Condition</a>                     
                </div>
            </form>  
        </div>
    </div>
    @if($errors->has('Failed'))
        <x-modal-message type="error" :message="$errors->first('Failed')" />
    @endif
</x-layout>