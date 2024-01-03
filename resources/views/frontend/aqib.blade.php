<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}">

        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/67b6ece322.js" crossorigin="anonymous"></script>

        <title>Aqibun Najih</title>

        @vite('resources/css/app.css')
    </head>
    <body class="bg-black font-sans">
        <div class="relative overflow-hidden">  
            <div class="bg-slate-100">
                <img src="{{ asset('assets/hero/aqib.jpeg') }}" alt="" class="rounded-sm">
            </div>
            {{-- <div class="absolute inset-0 -mt-48 w-80 grid justify-items-end ml-48">
                <img src="{{ asset('assets/images/blob.svg') }}" class="text-white opacity-40" alt="">
            </div> --}}
            <div class="absolute inset-0 mt-1 mr-4 grid justify-items-end">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo PT. Solusi Aplikasi Integrasi" class="w-16 h-16">
            </div>
            <div class="absolute w-full">
                <div class="backdrop-blur-sm bg-white/10">
                    <div class="bg-gradient-to-l from-sky-500 to-indigo-500 text-white rounded-t-lg mx-8 -mt-96 p-3 z-10 h-96 px-10">
                        <h1 class="text-3xl font-extrabold mb-1 mt-2">Aqibun Najih</h1>
                        <p class="text-xl mb-3">Business Development Manajer</p> 
                        <p class="text-xl font-semibold"><b>PT. Solusi Aplikasi Integrasi</b></p>

                        <p class="text-md mt-3"><i class="fa-solid fa-envelope"></i> <span class="ml-1">aqib@solusiaplikasi.id</span></p>
                        <p class="text-md"><i class="fa-solid fa-phone"></i> +62 857 3222 5859</p>
                        <form action="{{ route('add-to-contact') }}" method="POST">
                            @csrf
                            <input type="hidden" name="name" value="Aqibun Najih">
                            <input type="hidden" name="company" value="PT. Solusi Aplikasi Integrasi">
                            <input type="hidden" name="job" value="Business Development Manajer">
                            <input type="hidden" name="email" value="aqib@solusiaplikasi.id">
                            <input type="hidden" name="phone" value="+62 857 3222 5859">
                            <input type="hidden" name="address" value="BLOCK 21 BUILDING Jl. Siantar No. 18, Cideng, Jakarta Pusat 10150 Indonesia">
                            <input type="hidden" name="url" value="http://solusiaplikasi.id">
                            <div class="text-center">
                                <button type="submit" class="mt-5 py-3 px-5 bg-amber-500 rounded-lg font-bold">Add to Contact</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
