@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="m-4">Dashboard</h1>
    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Statistik 1</h5>
                    <p class="card-text">Nilai atau info singkat.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Statistik 2</h5>
                    <p class="card-text">Nilai atau info singkat.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Statistik 3</h5>
                    <p class="card-text">Nilai atau info singkat.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">Statistik 4</h5>
                    <p class="card-text">Nilai atau info singkat.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-header">
            Data Terkini
        </div>
        <div class="card-body">
            @auth
                <p>Selamat datang, {{ auth()->user()->nama }}!</p>
                <p>Role: {{ auth()->user()->role }}</p>
            @endauth
            <p class="card-text">Konten dashboard detail di sini.</p>
        </div>
    </div>
</div>
@endsection