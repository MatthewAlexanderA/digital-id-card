@extends('backend.layout')

@section('profile')
active
@endsection
@section('title')
profile
@endsection

@section('content')

<div class="lg:px-8">
    <div x-data="{ openTab: 1 }">
        <div class="bg-[#f7f7f7] border border-[#d2d4d7] rounded-t-md shadow-sm p-4 pb-0">
            <!-- Tabs -->
            <ul class="flex border-b" role="tablist">
                <li role="presentation" :class="{ 'border-b-2': openTab === 1, 'text-blue-500': openTab === 1 }">
                    <a href="#" @click.prevent="openTab = 1" class="py-2 px-4 inline-block hover:bg-gray-200">Profile</a>
                </li>
                <li role="presentation" :class="{ 'border-b-2': openTab === 2, 'text-blue-500': openTab === 2 }">
                    <a href="#" @click.prevent="openTab = 2" class="py-2 px-4 inline-block hover:bg-gray-200">Create</a>
                </li>
            </ul>
        </div>
        <div class="bg-[#f7f7f7] border-x border-b border-[#d2d4d7] rounded-b-md shadow-sm p-4">
            <!-- Tab Content -->
            <div x-show="openTab === 1" class="">
                <section class="content">
                    <table id="example" class="w-full">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Company</th>
                                <th>Job</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($profiles as $profile)
                                <tr>
                                    <td class="text-wrap">{{ $no }}</td>
                                    <td class="text-wrap">{{ $profile->name }}</td>
                                    <td class="text-wrap">{{ $profile->company }}</td>
                                    <td class="text-wrap">{{ $profile->job }}</td>

                                    <td class="text-wrap">
                                        <form action="{{ route('profiles.destroy',$profile->id) }}" method="POST">
                                            <a class="bg-[#ffc107] hover:bg-[#ffb007] py-2 px-3 rounded-md" href="{{ route('profile',$profile->slug) }}" target="_blank">View</a>
                                            <a class="bg-[#0d6efc] hover:bg-[#0d41fc] py-2 px-3 rounded-md text-white" href="{{ route('profiles.edit',$profile->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-[#dc3545] hover:bg-[#c73d3d] py-2 px-3 rounded-md text-white"
                                                onclick="return confirm('Delete?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @php $no++; @endphp
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Company</th>
                                <th>Job</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </section>
            </div>

            <div x-show="openTab === 2" class="">
                <section class="content">
                    @if ($errors->any())
                    <div class="mb-5 bg-[#f8d7da] rounded-md border border-[#f5c2c7] text-red-900 p-4">
                        <strong>Whoops!</strong> There were some problems with your input.
                        <ul class="list-disc ml-7 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="mb-5 bg-[#f8d7da] rounded-md border border-[#f5c2c7] text-red-900 p-4">
                            <p>{{ session('error') }}</p>
                        </div>
                    @endif
                    <form action="{{ route('profiles.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    
                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">
                                    Image (9:16)
                                </label>
                                <img class="img-preview mb-1 mt-1 col-sm-5 max-h-60">
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <input type="file" class="py-2 px-3 block w-full leading-5 rounded-md transition duration-150 ease-in-out lg:text-sm lg:leading-5" 
                                        name="image" id="image" onchange="previewImage()">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">
                                    Logo
                                </label>
                                <img class="logo-preview mb-1 mt-1 col-sm-5 max-h-60">
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
                                    placeholder="Name" value="{{ old('name') }}">
                            </div>

                            <div class="lg:mb-3">
                                <label for="url" class="block text-sm font-medium text-gray-700 mb-3">
                                    Url Link
                                </label>
                                <input type="text" name="url" id="url" class="py-2 px-3 block w-full leading-5 rounded-md transition duration-150 ease-in-out lg:text-sm lg:leading-5"
                                    placeholder="Url Link" value="{{ old('url') }}">
                            </div>
                    
                            <div class="lg:mb-3">
                                <label for="company" class="block text-sm font-medium text-gray-700 mb-3">
                                    Company Name
                                </label>
                                <input type="text" name="company" id="company" class="py-2 px-3 block w-full leading-5 rounded-md transition duration-150 ease-in-out lg:text-sm lg:leading-5"
                                    placeholder="Company Name" value="{{ old('company') }}">
                            </div>
                    
                            <div class="lg:mb-3">
                                <label for="job" class="block text-sm font-medium text-gray-700 mb-3">
                                    Job Title
                                </label>
                                <input type="text" name="job" id="job" class="py-2 px-3 block w-full leading-5 rounded-md transition duration-150 ease-in-out lg:text-sm lg:leading-5"
                                    placeholder="Job Title" value="{{ old('job') }}">
                            </div>

                            <div class="lg:mb-3">
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-3">
                                    Email
                                </label>
                                <input type="text" name="email" id="email" class="py-2 px-3 block w-full leading-5 rounded-md transition duration-150 ease-in-out lg:text-sm lg:leading-5"
                                    placeholder="Email" value="{{ old('email') }}">
                            </div>
                    
                            <div class="lg:mb-3">
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-3">
                                    Phone Number
                                </label>
                                <input type="text" name="phone" id="phone" class="py-2 px-3 block w-full leading-5 rounded-md transition duration-150 ease-in-out lg:text-sm lg:leading-5"
                                    placeholder="Phone Number" value="{{ old('phone') }}">
                            </div>
                        </div>

                        <div class="mt-3">
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-3">
                                Company Address
                            </label>
                                <textarea name="address" id="company_address" rows="3" class="py-2 px-3 block w-full leading-5 rounded-md transition duration-150 ease-in-out lg:text-sm lg:leading-5"
                                    placeholder="Company Address">{{ old('address') }}</textarea>
                        </div>
                    
                        <div class="mt-4 text-right">
                            <button type="submit" class="px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-800 transition duration-150 ease-in-out">
                                Submit
                            </button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</div>


{{-- Alpine.js --}}
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

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

<script>
    function previewLogo() {
        const image = document.querySelector('#logo');
        const imgPreview = document.querySelector('.logo-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

</script>

@endsection
