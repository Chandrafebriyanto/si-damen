<form method="POST" action="{{ route('login') }}" class="w-[90%] space-y-6">
    @csrf
    <div>
        <label class="block text-black font-semibold text-sm mb-1" for="email">
            Alamat Email
        </label>
        <div class="flex items-center bg-gray-200 rounded-full px-4 py-2 shadow-[3px_3px_6px_rgba(0,0,0,0.1)]">
            {{-- <i class="fas fa-envelope text-gray-700 text-lg"> </i> --}}
            <input class="bg-gray-200 rounded-full ml-3 w-full text-gray-600 placeholder-gray-500 focus:outline-none @error('email') is-invalid @enderror"
                   id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                   placeholder="Masukkan Alamat Email Anda..." type="email" />
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div>
        <label class="block text-black font-semibold text-sm mb-1" for="password">
            Password
        </label>
        <div class="flex items-center bg-gray-200 rounded-full px-4 py-2 shadow-[3px_3px_6px_rgba(0,0,0,0.1)]">
            {{-- <i class="fas fa-lock text-gray-700 text-lg"> </i> --}}
            <input class="bg-gray-200 rounded-full ml-3 w-full text-gray-600 placeholder-gray-500 focus:outline-none @error('password') is-invalid @enderror"
                   id="password" name="password" required autocomplete="current-password"
                   placeholder="Masukkan Password Anda..." type="password" />
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <button class="w-full bg-green-600 hover:bg-green-700 text-white font-bold rounded-full py-3 shadow-[3px_3px_6px_rgba(0,0,0,0.2)]"
            type="submit">
        Masuk
    </button>
</form>
<div class="absolute bottom-0 left-0 w-full bg-yellow-400 rounded-b-3xl py-4 text-center text-black text-xs z-10">
    Belum Punya Akun?
    <a class="font-bold" href="{{ route('register') }}"> Daftar </a>
</div>