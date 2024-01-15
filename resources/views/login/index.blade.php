<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Solusi Aplikasi Integrasi</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/67b6ece322.js" crossorigin="anonymous"></script>

    @vite('resources/css/app.css')
</head>

<body class="bg-slate-100">

    <div class="mx-3 lg:mx-96 my-40">
        <div class="bg-white rounded-sm mx-5 lg:mx-48 shadow-xl border-t-4 border-y-blue-500">
            <div class="text-center font-bold text-4xl p-5">Solusi Aplikasi Integrasi</div>
            <hr>
            <div class="text-center text-md p-5">
                <form action="{{ route('authentication') }}" method="post">
                    @csrf
					@if(session()->has('loginError'))
						<div class="mb-3 flex pl-3 py-3 bg-red-600 text-white rounded-md">
							<p>{{ session('loginError') }}</p>
						</div>
					@endif
                    <div class="mb-3 flex items-center justify-center">
                        <input type="text" placeholder="Username" name="username"
                            value="{{ old('username') }}"
                            class="py-2 px-3 h-full rounded-l-md border-2 w-72 @error('username') border-red-600 @enderror">
                        <i class="fa fa-user px-3 h-[2.55rem] bg-slate-200 rounded-r-md flex items-center"></i>
                    </div>
                    <div class="mb-5 flex items-center justify-center">
                        <input type="password" placeholder="Password" name="password"
                            value="{{ old('password') }}"
                            class="py-2 px-3 h-full rounded-l-md border-2 w-72 @error('password') border-red-600 @enderror">
                        <i class="fa fa-lock px-3 h-[2.55rem] bg-slate-200 rounded-r-md flex items-center"></i>
                    </div>
                    <div class="flex justify-end items-end lg:mr-2">
						<button type="submit" class="bg-blue-500 py-2 px-7 rounded-md text-white">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
