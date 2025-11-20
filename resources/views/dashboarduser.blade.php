@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="col-md-12 col-lg-6 col-xl-4">
    <div class="card mb-2">
        <img class="card-img-top" src="{{ asset('img/Delta Force Screenshot 2025.10.31 - 15.04.29.27.png') }}" alt="Delta Force Screenshot">
        <div class="card-img-overlay d-flex flex-column justify-content-center">
            <h5 class="card-title text-white mt-5 pt-2">Card Title</h5>
            <p class="card-text pb-2 pt-1 text-white">
                Lorem ipsum dolor sit amet, <br>
                consectetur adipisicing elit <br>
                sed do eiusmod tempor.
            </p>
            <a href="#" class="text-white">Last update 15 hours ago</a>
        </div>
    </div>
</div>
@endsection