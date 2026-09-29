<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Profil Sekolah</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>

        /* =========================
           GRADASI ABU + PUTIH
        ========================= */

        .gradient-gray-white {
            background: linear-gradient(135deg, #374151, #e5e7eb);
        }

        .gradient-gray-white:hover {
            background: linear-gradient(135deg, #1f2937, #d1d5db);
        }

        .text-gradient {
            background: linear-gradient(90deg, #374151, #9ca3af);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .focus-gray-white:focus {
            border-color: #6b7280;
            box-shadow: 0 0 0 2px rgba(107, 114, 128, 0.25);
        }

    </style>

</head>


<body class="bg-gray-100 flex items-center justify-center min-h-screen">


    <div class="w-full max-w-md p-8 bg-white rounded-xl shadow-md border border-gray-200">


        {{-- JUDUL --}}
        <div class="text-center mb-6">

            <h1 class="text-2xl font-bold text-gradient">
                Profil SMK YPC Tasikmalaya
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Silakan login untuk masuk ke sistem
            </p>

        </div>


        {{-- PESAN ERROR --}}
        @if(session('error'))

            <div class="mb-4 p-3 bg-gray-100 border border-gray-300 text-gray-700 rounded-lg text-sm">

                {{ session('error') }}

            </div>

        @endif


        {{-- FORM LOGIN --}}
        <form action="/login" method="POST" class="space-y-4">

            @csrf


            {{-- USERNAME --}}
            <div>

                <label for="username"
                       class="block text-sm font-medium text-gray-700 mb-1">

                    Username

                </label>


                <input type="text"
                       id="username"
                       name="username"
                       value="{{ old('username') }}"
                       placeholder="Masukkan username"
                       required
                       autocomplete="username"
                       class="focus-gray-white w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none">


                @error('username')

                    <p class="text-gray-600 text-xs mt-1">
                        {{ $message }}
                    </p>

                @enderror

            </div>


            {{-- PASSWORD --}}
            <div>

                <label for="password"
                       class="block text-sm font-medium text-gray-700 mb-1">

                    Password

                </label>


                <input type="password"
                       id="password"
                       name="password"
                       placeholder="Masukkan password"
                       required
                       autocomplete="current-password"
                       class="focus-gray-white w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none">


                @error('password')

                    <p class="text-gray-600 text-xs mt-1">
                        {{ $message }}
                    </p>

                @enderror

            </div>


            {{-- INGAT SAYA --}}
            <div class="flex items-center text-xs text-gray-600">

                <label class="flex items-center space-x-2 cursor-pointer">

                    <input type="checkbox"
                           name="remember"
                           class="rounded border-gray-300 text-gray-600 focus:ring-gray-500">

                    <span>
                        Ingat saya
                    </span>

                </label>

            </div>


            {{-- TOMBOL LOGIN --}}
            <button type="submit"
                    class="gradient-gray-white w-full py-2.5 text-white font-medium text-sm rounded-lg transition duration-200 shadow">

                Masuk

            </button>


        </form>


        {{-- FOOTER --}}
        <div class="mt-6 text-center text-xs text-gray-500">

            Belum punya akun?

            <span class="text-gradient font-medium">
                Hubungi Administrator
            </span>

        </div>


    </div>


</body>

</html>
