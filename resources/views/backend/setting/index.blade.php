@extends('backend.layout')

@section('title')
Settings
@endsection

@section('content')

<div class="lg:px-8">
    <div class="bg-[#f7f7f7] border border-[#d2d4d7] rounded-t-md shadow-sm p-4">
        <a href="{{ route('dashboard.index') }}"
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
        <form action="{{ route('setting.update',$user->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-4">
                <label for="username" class="block text-md font-bold leading-6 text-gray-900">Username</label>
                <div class="mt-1">
                    <input type="text" name="username" id="username" placeholder="Username" value="{{$user->username}}"
                        class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-300 lg:text-sm lg:leading-6">
                </div>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-md font-bold leading-6 text-gray-900">Password</label>
                <div class="mt-1">
                    <input type="password" name="password" id="password" placeholder="Password"
                        class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-300 lg:text-sm lg:leading-6">
                </div>
            </div>
            <div class="mb-4">
                <label for="re-password" class="block text-md font-bold leading-6 text-gray-900">Confirm Password</label>
                <div class="mt-1">
                    <input type="password" name="re-password" id="re-password" placeholder="Confirm Password"
                        class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-300 lg:text-sm lg:leading-6">
                </div>
            </div>
            <input type="hidden" name="oldPass" value="{{ $user->password }}">
            <div class="pt-4 text-right">
                <button type="submit" class="bg-blue-600 rounded-md text-center text-white py-2 px-5">Submit</button>
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

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

</script>

@endsection
