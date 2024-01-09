<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}">

        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/67b6ece322.js" crossorigin="anonymous"></script>

        <title>{{ $title }}</title>

        @vite('resources/css/app.css')
    </head>
    <body class="bg-black font-sans">
        <div class="relative overflow-hidden">  
            <div class="bg-slate-100">
                <img src="{{ asset('storage/'.$profile->image) }}" alt="" class="rounded-sm">
            </div>
            <div class="absolute inset-0 mt-1 mr-4 grid justify-items-end">
                    <img src="{{ asset('storage/'.$profile->logo) }}" alt="Logo" class="w-16 h-16">
            </div>
            <div class="absolute w-full">
                <div class="backdrop-blur-sm bg-white/10">
                    <div class="bg-gradient-to-l from-sky-500 to-indigo-500 text-white rounded-t-lg mx-8 -mt-96 p-3 z-10 h-96 px-10">
                        <h1 class="text-3xl font-extrabold mb-1 mt-2">{{ $profile->name }}</h1>
                        <p class="text-xl mb-3">{{ $profile->job }}</p> 
                        <p class="text-xl font-semibold"><b>{{ $profile->company }}</b></p>

                        <p class="text-md mt-3"><i class="fa-solid fa-envelope"></i> <span class="ml-1">{{ $profile->email }}</span></p>
                        <p class="text-md"><i class="fa-solid fa-phone"></i> {{ $profile->phone }}</p>
                        <form action="{{ route('add-to-contact') }}" method="POST">
                            @csrf
                            <input type="hidden" name="name" value="{{ $profile->name }}">
                            <input type="hidden" name="company" value="{{ $profile->company }}">
                            <input type="hidden" name="job" value="{{ $profile->job }}">
                            <input type="hidden" name="email" value="{{ $profile->email }}">
                            <input type="hidden" name="phone" value="{{ $profile->phone }}">
                            <input type="hidden" name="address" value="{{ $profile->address }}">
                            <input type="hidden" name="url" value="{{ $profile->url }}">
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
