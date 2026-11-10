@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <h1>Profile</h1>
    <p class="muted">Data akun yang sedang masuk.</p>

    <section class="card profile">
        <dl class="facts">
            @foreach ($detail as $label => $isi)
                <dt>{{ $label }}</dt>
                <dd>{{ $isi }}</dd>
            @endforeach
        </dl>
    </section>
@endsection
