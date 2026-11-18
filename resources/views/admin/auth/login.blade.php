<!DOCTYPE html>
<html lang="id" class="h-full bg-stone-950">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator - Bawang Hitam Sembalun</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full flex items-center justify-center p-4 bg-gradient-to-br from-stone-950 via-stone-900 to-stone-950 text-stone-200">

    <div class="w-full max-w-md">
        <!-- Brand Logo Header -->
        <div class="text-center mb-8">
            <div class="inline-flex w-16 h-16 rounded-2xl bg-gradient-to-tr from-amber-600 to-amber-500 text-stone-950 items-center justify-center font-black shadow-lg shadow-amber-500/20 mb-4 border border-amber-400/30">
                <svg class="w-9 h-9" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.5 6 4 10 4 15a8 8 0 0016 0c0-5-4.5-9-8-13z"/></svg>
            </div>
            <h1 class="text-2xl font-black text-white tracking-tight">Portal Manajemen Admin</h1>
            <p class="text-xs text-stone-400 mt-1.5">Bawang Hitam Sembalun • Inovasi Pangan Lereng Rinjani</p>
        </div>

        <!-- Login Card -->
        <div class="bg-stone-900/90 backdrop-blur-xl border border-stone-800 rounded-3xl p-7 sm:p-8 shadow-2xl space-y-6">
            
            @if(session('success'))
                <div class="p-3.5 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs font-medium">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="p-3.5 rounded-xl bg-rose-500/10 border border-rose-500/20 text-rose-400 text-xs font-medium">
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-bold uppercase tracking-wider text-stone-400 mb-1.5">
                        Alamat Email Admin
                    </label>
                    <div class="relative">
                        <input type="email" name="email" id="email" required autofocus
                            value="{{ old('email') }}"
                            placeholder="nama@email.com"
                            class="w-full bg-stone-950/70 border border-stone-800 rounded-xl px-4 py-3 text-sm text-white placeholder-stone-600 focus:outline-hidden focus:border-amber-500 focus:ring-1 focus:ring-amber-500 transition-colors">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-xs font-bold uppercase tracking-wider text-stone-400 mb-1.5">
                        Kata Sandi (Password)
                    </label>
                    <div class="relative">
                        <input type="password" name="password" id="password" required
                            placeholder="••••••••"
                            class="w-full bg-stone-950/70 border border-stone-800 rounded-xl px-4 py-3 text-sm text-white placeholder-stone-600 focus:outline-hidden focus:border-amber-500 focus:ring-1 focus:ring-amber-500 transition-colors">
                    </div>
                </div>

                <div class="flex items-center justify-between text-xs pt-1">
                    <label class="flex items-center gap-2 cursor-pointer text-stone-400 hover:text-stone-300">
                        <input type="checkbox" name="remember" value="1" checked class="rounded-sm border-stone-700 bg-stone-950 text-amber-600 focus:ring-amber-500">
                        <span>Ingat Sesi Masuk</span>
                    </label>
                </div>

                <button type="submit" class="w-full py-3.5 px-4 rounded-xl text-xs font-bold uppercase tracking-wider text-stone-950 bg-gradient-to-r from-amber-400 to-amber-500 hover:from-amber-500 hover:to-amber-600 shadow-md shadow-amber-500/20 transition-all font-sans mt-2">
                    Masuk ke Admin Panel
                </button>
            </form>

            <!-- Back to website link -->
            <div class="text-center pt-2">
                <a href="{{ route('home') }}" class="text-xs text-stone-500 hover:text-amber-400 transition-colors inline-flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    <span>Kembali ke Halaman Utama Website</span>
                </a>
            </div>

        </div>
    </div>

</body>
</html>
