@extends('layouts.app')

@section('title', 'Kenali Kucing')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pengelolaan.css') }}">
@endpush

@section('wide')
<section class="manage">
    <h1>Daftar ras kucing</h1>
    <p class="manage__desc">Cari ras kucing yang ingin Anda kenal lebih jauh.</p>

    {{-- Pencarian: dikirim lewat request parameter ?q= --}}
    <form class="m-search" method="GET" action="{{ route('pengelolaan') }}">
        <input type="hidden" name="username" value="{{ $username }}">
        <div class="m-search__field">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="M20 20l-3.5-3.5"/></svg>
            <input type="search" name="q" value="{{ $q }}" placeholder="Cari nama, asal, atau sifat" aria-label="Cari ras kucing">
        </div>
        <button type="submit">Cari</button>
    </form>

    <p class="m-count">
        Menampilkan {{ count($ras) }} ras
        @if ($q !== '')
            untuk "{{ $q }}"
            <a href="{{ route('pengelolaan', ['username' => $username]) }}">Hapus pencarian</a>
        @endif
    </p>

    <div class="m-grid">
        @forelse ($ras as $r)
            <article class="m-card">
                <div class="m-card__img">
                    <img src="{{ asset($r['gambar']) }}" alt="Ilustrasi kucing {{ $r['nama'] }}">
                </div>

                <h2>{{ $r['nama'] }}</h2>

                @if ($r['bulu'] === 'Panjang')
                    <span class="m-badge">Bulu panjang, sikat rutin</span>
                @else
                    <span class="m-badge m-badge--plain">Bulu pendek</span>
                @endif

                <dl class="m-facts">
                    <dt>Asal</dt><dd>{{ $r['asal'] }}</dd>
                    <dt>Berat</dt><dd>{{ $r['berat'] }}</dd>
                </dl>

                <p class="m-card__text">{{ $r['sifat'] }}</p>
            </article>
        @empty
            <p class="m-empty">Tidak ada ras yang cocok dengan kata kunci tersebut. Coba kata kunci lain.</p>
        @endforelse
    </div>
</section>
@endsection