@extends('backend.layout')

@section('dashboard')
active
@endsection
@section('title')
Dashboard
@endsection

@section('content')
<h5 class="mb-2 mt-4">Data Information</h5>

<div class="row">

    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box" style="background-color: white;">
            <div class="inner">
                <h3>{{ $profile }}</h3>

                <p>Total Profile</p>
            </div>
            <div class="icon">
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="small-box-footer"> </div>
        </div>
    </div>

</div>

@endsection
