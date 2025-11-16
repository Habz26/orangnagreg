@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
    <div class="container" style="max-width: 500px;">
        <h2>Login</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input id="email" 
                       type="email" 
                       class="form-control @error('email') is-invalid @enderror"
                       name="email" 
                       value="{{ old('email') }}" 
                       required 
                       autofocus>
                @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input id="password" 
                           type="password" 
                           class="form-control @error('password') is-invalid @enderror"
                           name="password" 
                           required>
                    <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
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


            {{-- Remember me --}}
            <div class="mb-3 form-check">
                <input type="checkbox" 
                       class="form-check-input" 
                       id="remember" 
                       name="remember">
                <label class="form-check-label" for="remember">Remember Me</label>
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>

    </div>
</div>
@endsection
