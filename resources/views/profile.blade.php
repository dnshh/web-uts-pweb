@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <h1>Profile</h1>
    <p class="muted">Data akun yang sedang masuk.</p>

    <section class="card profile">
        <img src="{{ asset('images/logo.svg') }}" alt="Avatar" width="96" height="96">
        <dl class="facts">
            @foreach ($detail as $label => $isi)
                <dt>{{ $label }}</dt>
                <dd>{{ $isi }}</dd>
            @endforeach
        </dl>
    </section>
@endsection
