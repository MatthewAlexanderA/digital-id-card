<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}">

        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/67b6ece322.js" crossorigin="anonymous"></script>

        <title>Matthew Alexander Andriyanto</title>

        @vite('resources/css/app.css')
    </head>
    <body class="bg-black font-mono">
        <div class="relative">
            <div class="bg-slate-100">
                <img src="{{ asset('assets/hero/matthew-lg.jpeg') }}" alt="" class="rounded-sm">
            </div>
            <div class="absolute w-full">
                <div class="backdrop-blur-sm bg-white/10">
                    <div class="bg-gradient-to-l from-sky-500 to-indigo-500 text-white rounded-t-md mx-5 -mt-96 p-3 z-10 h-96 px-10">
                        <h1 class="text-3xl font-extrabold mb-3 mt-2">Matthew Alexander Andriyanto</h1>
                        <p class="text-xl font-semibold">PT. Solusi Aplikasi Integrasi</p>
                        <p class="text-xl">Pre Sales</p> 

                        <p class="text-md mt-3"><i class="fa-solid fa-envelope"></i> matthew@solusiaplikasi.id</p>
                        <p class="text-md"><i class="fa-solid fa-phone"></i> +62 895 1739 2715</p>
                        <form action="{{ route('add-to-contact') }}" method="POST">
                            @csrf
                            <input type="hidden" name="name" value="Matthew Alexander Andriyanto">
                            <input type="hidden" name="company" value="PT. Solusi Aplikasi Integrasi">
                            <input type="hidden" name="job" value="Pre Sales">
                            <input type="hidden" name="email" value="matthew@solusiaplikasi.id">
                            <input type="hidden" name="phone" value="+62 895 1739 2715">
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
