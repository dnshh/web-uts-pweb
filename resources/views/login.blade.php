@extends('layouts.app')

@section('title', 'Masuk')

@section('content')
    <section class="login">
        <div class="login__intro">
            <h1>Pantau stok toko dari satu layar.</h1>
            <p>Simulasi login untuk mempelajari alur request dan response di Laravel. Yang terjadi saat Anda menekan tombol Masuk:</p>
            <ol class="flow">
                <li>Browser mengirim form ke <code>POST /login</code></li>
                <li>Route meneruskannya ke <code>PageController@authenticate</code></li>
                <li>Controller memvalidasi, lalu redirect ke <code>/dashboard?username=...</code></li>
                <li>View Blade menampilkan username tersebut</li>
            </ol>
        </div>

        <div class="login__form">
            <h2>Masuk ke StokKu</h2>
            <p class="muted">Password bebas, minimal 4 karakter.</p>

            <form method="POST" action="{{ route('login.process') }}">
                @csrf
                <div class="field">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" value="{{ old('username') }}" autocomplete="username" required autofocus>
                </div>
                <div class="field">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" autocomplete="current-password" required>
                </div>
                <button type="submit" class="btn">Masuk</button>
            </form>
        </div>
    </section>
@endsection
