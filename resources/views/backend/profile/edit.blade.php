@extends('backend.layout')

@section('profile')
active
@endsection
@section('title')
Profile
@endsection

@section('content')

<div class="lg:px-8">
    <div class="bg-[#f7f7f7] border border-[#d2d4d7] rounded-t-md shadow-sm p-4">
        <a href="{{ route('profiles.index') }}"
            class="bg-red-600 rounded-md text-center text-white py-2 px-4">Back</a>

        @if ($errors->any())
        <div class="mt-5 bg-[#f8d7da] rounded-md border border-[#f5c2c7] text-red-900 p-4">
            <strong>Whoops!</strong> There were some problems with your input.
            <ul class="list-disc ml-7 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if (session()->has('error'))
            <div class="mt-5 bg-[#f8d7da] rounded-md border border-[#f5c2c7] text-red-900 p-4">
                <p>{{ session('error') }}</p>
            </div>
        @endif
    </div>
    <div class="bg-[#f7f7f7] border-x border-b border-[#d2d4d7] rounded-b-md shadow-sm p-4">
        <form action="{{ route('profiles.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        
            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                <div>
                    <label class="block text-sm font-medium text-gray-700">
                        Image (9:16)
                    </label>
                    @if ($profile->image)
                        <img src="{{ asset('storage/' . $profile->image) }}" class="img-preview mb-1 mt-1 col-sm-5 max-h-60">
                    @else
                        <img class="img-preview mb-1 mt-1 col-sm-5 max-h-60">
                    @endif
                    <input type="hidden" name="oldImage" value="{{ $profile->image }}">
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="file" class="py-2 px-3 block w-full leading-5 rounded-md transition duration-150 ease-in-out lg:text-sm lg:leading-5" 
                            name="image" id="image" onchange="previewImage()">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">
                        Logo
                    </label>
                    @if ($profile->logo)
                        <img src="{{ asset('storage/' . $profile->logo) }}" class="logo-preview mb-1 mt-1 col-sm-5 max-h-60">
                    @else
                        <img class="logo-preview mb-1 mt-1 col-sm-5 max-h-60">
                    @endif
                    <input type="hidden" name="oldLogo" value="{{ $profile->logo }}">
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="file" class="py-2 px-3 block w-full leading-5 rounded-md transition duration-150 ease-in-out lg:text-sm lg:leading-5" 
                               name="logo" id="logo" onchange="previewLogo()">
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 mt-3">
                <div class="lg:mb-3">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-3">
                        Name
                    </label>
                    <input type="text" name="name" id="name" class="py-2 px-3 block w-full leading-5 rounded-md transition duration-150 ease-in-out lg:text-sm lg:leading-5"
                        placeholder="Name" value="{{ $profile->name }}">
                </div>

                <div class="lg:mb-3">
                    <label for="url" class="block text-sm font-medium text-gray-700 mb-3">
                        Url Link
                    </label>
                    <input type="text" name="url" id="url" class="py-2 px-3 block w-full leading-5 rounded-md transition duration-150 ease-in-out lg:text-sm lg:leading-5"
                        placeholder="Url Link" value="{{ $profile->url }}">
                </div>
        
                <div class="lg:mb-3">
                    <label for="company" class="block text-sm font-medium text-gray-700 mb-3">
                        Company Name
                    </label>
                    <input type="text" name="company" id="company" class="py-2 px-3 block w-full leading-5 rounded-md transition duration-150 ease-in-out lg:text-sm lg:leading-5"
                        placeholder="Company Name" value="{{ $profile->company }}">
                </div>
        
                <div class="lg:mb-3">
                    <label for="job" class="block text-sm font-medium text-gray-700 mb-3">
                        Job Title
                    </label>
                    <input type="text" name="job" id="job" class="py-2 px-3 block w-full leading-5 rounded-md transition duration-150 ease-in-out lg:text-sm lg:leading-5"
                        placeholder="Job Title" value="{{ $profile->job }}">
                </div>

                <div class="lg:mb-3">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-3">
                        Email
                    </label>
                    <input type="text" name="email" id="email" class="py-2 px-3 block w-full leading-5 rounded-md transition duration-150 ease-in-out lg:text-sm lg:leading-5"
                        placeholder="Email" value="{{ $profile->email }}">
                </div>
        
                <div class="lg:mb-3">
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-3">
                        Phone Number
                    </label>
                    <input type="text" name="phone" id="phone" class="py-2 px-3 block w-full leading-5 rounded-md transition duration-150 ease-in-out lg:text-sm lg:leading-5"
                        placeholder="Phone Number" value="{{ $profile->phone }}">
                </div>
            </div>

            <div class="mt-3">
                <label for="address" class="block text-sm font-medium text-gray-700 mb-3">
                    Company Address
                </label>
                    <textarea name="address" id="company_address" rows="3" class="py-2 px-3 block w-full leading-5 rounded-md transition duration-150 ease-in-out lg:text-sm lg:leading-5"
                        placeholder="Company Address">{{ $profile->address }}</textarea>
            </div>
        
            <div class="mt-4 text-right">
                <button type="submit" class="px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-800 transition duration-150 ease-in-out">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

<script>
    function previewLogo() {
        const image = document.querySelector('#logo');
        const imgPreview = document.querySelector('.logo-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

@endsection