@extends('layouts.app')

@section('title', 'Masuk')

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=DM+Serif+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush

@section('fullscreen')
<div class="auth">

    {{-- Sisi kiri: foto --}}
    <aside class="auth__hero">
        <img class="auth__photo" src="{{ asset('images/kucing-login.jpg') }}" alt="">

        <a class="auth__brand" href="{{ route('login') }}">
            <span class="auth__brand-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="#fff" aria-hidden="true">
                    <circle cx="6" cy="10" r="2.3"/><circle cx="10" cy="5.5" r="2.3"/>
                    <circle cx="14" cy="5.5" r="2.3"/><circle cx="18" cy="10" r="2.3"/>
                    <path d="M12 12c-3 0-5.5 2.6-5.5 5 0 1.8 1.4 2.5 3 2.5 1 0 1.6-.4 2.5-.4s1.5.4 2.5.4c1.6 0 3-.7 3-2.5 0-2.4-2.5-5-5.5-5z"/>
                </svg>
            </span>
            MeowInfo
        </a>

        <div class="auth__text">
            <span class="auth__bar"></span>
            <h2>Kenali mereka. Sayangi lebih baik.</h2>
            <p>Tempat sederhana untuk mengenal dunia kucing, satu dengkuran dalam satu waktu.</p>
        </div>
    </aside>

    {{-- Sisi kanan: form --}}
    <section class="auth__panel">
        <div class="auth__box">
            <h1>Selamat Datang di MeowInfo!</h1>
            <p class="auth__sub">Masuk untuk melanjutkan petualanganmu mengenal sahabat berbulu.</p>

            @include('partials.alert')

            <form method="POST" action="{{ route('login.process') }}">
                @csrf

                <label class="auth__label" for="username">Username</label>
                <div class="input">
                    <!-- <svg class="input__icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 3.6-7 8-7s8 3 8 7"/>
                    </svg> -->
                    <input type="text" id="username" name="username" value="{{ old('username') }}"
                           placeholder="Masukkan username" autocomplete="username" required autofocus>
                </div>

                <label class="auth__label" for="password">Kata sandi</label>
                <div class="input">
                    <svg class="input__icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <rect x="4" y="11" width="16" height="10" rx="2"/><path d="M8 11V8a4 4 0 0 1 8 0v3"/>
                    </svg>
                    <input type="password" id="password" name="password"
                           placeholder="Masukkan kata sandi" autocomplete="current-password" required>
                    <button type="button" id="toggle-password" class="input__toggle" aria-label="Tampilkan kata sandi">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/>
                        </svg>
                    </button>
                </div>

                <div class="auth__row">
                    <label class="auth__check"><input type="checkbox" name="remember"> Ingat saya</label>
                    <a href="#" class="auth__link">Lupa kata sandi?</a>
                </div>

                <button type="submit" class="auth__submit">
                    Masuk
                </button>
            </form>

            <p class="auth__terms">Dengan masuk, kamu menyetujui Ketentuan Layanan dan Kebijakan Privasi kami.</p>
        </div>
    </section>

</div>
@endsection