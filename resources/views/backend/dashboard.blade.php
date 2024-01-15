@extends('backend.layout')

@section('content')

<div class="mb-4">
    <h1 class="text-xl font-bold mb-2 lg:mx-4">Data Information</h1>
    <hr>
</div>

<div class="mb-4 lg:mx-4">
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
        <div class="flex justify-between bg-white shadow-lg rounded border border-b-4 border-[#dee2e6] p-6 mb-5">
            <div class="">
                <h1 class="text-4xl font-bold mb-2">6</h1>
                <p>Total Profile</p>
            </div>
            <i class="fa-solid fa-user text-[#d9d9d9] lg:text-8xl hidden lg:block"></i>
        </div>
    </div>
    
</div>
    
@endsection