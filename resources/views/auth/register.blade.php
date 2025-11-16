@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
        <div class="container">
            <h2>Register</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                        name="nama" value="{{ old('nama') }}" required autofocus>
                    @error('nama')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required>
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password-confirm" class="form-label">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>

                {{-- Captcha --}}
<div class="mb-3">
    <img id="captchaImage" src="{{ captcha_src() }}" alt="captcha" class="mb-3">

    <div class="form-floating form-floating-outline mb-3">
        <input type="text"
               class="form-control"
               id="captcha"
               name="captcha"
               placeholder="Ketik captcha">
        <label for="captcha">Captcha</label>
    </div>

    <button type="button" class="btn btn-sm btn-secondary" id="refresh-captcha">
        Refresh
    </button>

    @error('captcha')
        <div style="color:red">{{ $message }}</div>
    @enderror
</div>


                <button type="submit" class="btn btn-primary">
                    Register
                </button>
            </form>
        </div>
    </div>
@endsection
