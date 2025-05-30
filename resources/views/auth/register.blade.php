<x-guest-layout>
    <div class="flex items-center justify-center bg-gray-50 px-4 py-12">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-md px-8 py-10 space-y-6">
            
            {{-- Judul --}}
            <div class="text-center">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-800">Buat Akun Baru</h2>
                <p class="mt-1 text-sm text-gray-500">Isi data di bawah untuk mendaftar</p>
            </div>

            {{-- Form Register --}}
            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                {{-- Name --}}
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input 
                        id="name" 
                        name="name" 
                        type="text" 
                        required 
                        autofocus 
                        autocomplete="name" 
                        value="{{ old('name') }}"
                        class="mt-1 block w-full px-4 py-2 border border-gray-200 rounded-xl shadow-sm 
                               focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 
                               text-gray-800 bg-gray-50"
                    />
                    @error('name')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input 
                        id="email" 
                        name="email" 
                        type="email" 
                        required 
                        autocomplete="email" 
                        value="{{ old('email') }}"
                        class="mt-1 block w-full px-4 py-2 border border-gray-200 rounded-xl shadow-sm 
                               focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 
                               text-gray-800 bg-gray-50"
                    />
                    @error('email')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
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
                        autocomplete="new-password"
                        class="mt-1 block w-full px-4 py-2 border border-gray-200 rounded-xl shadow-sm 
                               focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 
                               text-gray-800 bg-gray-50"
                    />
                    @error('password')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Konfirmasi Password --}}
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                    <input 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        type="password" 
                        required 
                        autocomplete="new-password"
                        class="mt-1 block w-full px-4 py-2 border border-gray-200 rounded-xl shadow-sm 
                               focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 
                               text-gray-800 bg-gray-50"
                    />
                    @error('password_confirmation')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Aksi --}}
                <div class="flex items-center justify-between pt-2">
                    <a 
                        href="{{ route('login') }}" 
                        class="text-sm text-indigo-600 hover:underline"
                    >
                        Sudah punya akun?
                    </a>

                    <button 
                        type="submit"
                        class="inline-flex justify-center py-3 px-6 border border-transparent rounded-xl 
                               shadow-md text-white bg-indigo-600 hover:bg-indigo-700 
                               focus:outline-none focus:ring-2 focus:ring-indigo-500 font-medium"
                    >
                        Daftar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
