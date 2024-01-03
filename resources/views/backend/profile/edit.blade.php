@extends('backend.layout')

@section('profile')
active
@endsection
@section('title')
Profile
@endsection

@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="pull-right">
                            <a class="btn btn-danger" href="{{ route('profile.index') }}"> Back</a>
                        </div>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">


                        <form action="{{ route('profile.update',$profile->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @method('PUT')

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Image</strong>
                                        <input type="hidden" name="oldImage" value="{{ $profile->image }}">
                                        @if ($profile->image)
                                        <img src="{{ asset('storage/' . $profile->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                        @else
                                        <img class="img-preview img-fluid mb-3">
                                        @endif
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" @error('image') is-invalid @enderror name="image" id="image" onchange="previewImage()">
                                            @error('image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Logo</strong>
                                        <input type="hidden" name="oldLogo" value="{{ $profile->logo }}">
                                        @if ($profile->logo)
                                        <img src="{{ asset('storage/' . $profile->logo) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                        @else
                                        <img class="logo-preview img-fluid mb-3">
                                        @endif
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" @error('logo') is-invalid @enderror name="logo" id="logo" onchange="previewLogo()">
                                            @error('logo')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name</strong>
                                        <input type="text" name="name" class="form-control" @error('name') is-invalid @enderror placeholder="Name" value="{{$profile->name}}">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Company Name</strong>
                                        <input type="text" name="company" class="form-control" @error('company') is-invalid @enderror placeholder="Company Name" value="{{$profile->company}}">
                                        @error('company')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Job Title</strong>
                                        <input type="text" name="job" class="form-control" @error('job') is-invalid @enderror placeholder="Job Title" value="{{$profile->job}}">
                                        @error('job')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Email</strong>
                                        <input type="text" name="email" class="form-control" @error('email') is-invalid @enderror placeholder="Email" value="{{$profile->email}}">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Phone Number</strong>
                                        <input type="text" name="phone" class="form-control" @error('phone') is-invalid @enderror placeholder="Phone Number" value="{{$profile->phone}}">
                                        @error('phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Company Address</strong>
                                        <input type="text" name="address" class="form-control" @error('address') is-invalid @enderror placeholder="Company Address" value="{{$profile->address}}">
                                        @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Url Link</strong>
                                        <input type="text" name="url" class="form-control" @error('url') is-invalid @enderror placeholder="Url Link" value="{{$profile->url}}">
                                        @error('url')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

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
    function previewImage() {
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