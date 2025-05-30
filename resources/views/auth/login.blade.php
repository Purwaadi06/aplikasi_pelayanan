<x-guest-layout>
    <div class=" flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md bg-white rounded-xl shadow-md p-8 space-y-6">
            <h2 class="text-2xl font-bold text-center text-gray-800">Masuk ke Akun</h2>

            {{-- Notifikasi status --}}
            @if (session('status'))
                <div class="text-green-600 text-sm">
                    {{ session('status') }}
                </div>
            @endif

            {{-- Form Login --}}
            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input 
                        id="email" 
                        name="email" 
                        type="email" 
                        required 
                        autofocus 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                               focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                    />
                    @error('email')
                        <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input 
                        id="password" 
                        name="password" 
                        type="password" 
                        required 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                               focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                    />
                    @error('password')
                        <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Remember Me & Lupa Password --}}
                <div class="flex items-center justify-between">
                    <label class="inline-flex items-center">
                        <input 
                            type="checkbox" 
                            name="remember" 
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                        >
                        <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:underline">
                            Lupa password?
                        </a>
                    @endif
                </div>

                {{-- Tombol Submit --}}
                <div>
                    <button 
                        type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md 
                               shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 
                               focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    >
                        Masuk
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
