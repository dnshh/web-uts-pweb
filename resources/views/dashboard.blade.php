@extends('layouts.app')

@section('title', 'Beranda')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

@section('wide')

{{-- HERO --}}
<section class="wrap home-hero">
    <div class="home-hero__text">
        <h1>Lebih dekat dengan <em>kucing</em> di sekitar.</h1>
        <p class="home-hero__desc">Kenali bahasa tubuh, karakter, dan cara merawat kucing agar mereka tumbuh sehat dan bahagia bersamamu.</p>
        <div class="home-hero__actions">
            <a class="cta" href="{{ route('pengelolaan', ['username' => $username]) }}"> Mulai kenali
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </a>
            <a class="cta cta--ghost" href="#perawatan">Fakta unik</a>
        </div>
    </div>

    <div class="home-hero__media">
        <img class="home-hero__photo" src="{{ asset('images/kucing-dashboard.jpg') }}" alt="Anak kucing mengeong">
        <div class="home-hero__tip">
            <span class="tip-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 21s-7-4.4-9.3-9A5.2 5.2 0 0 1 12 6.6 5.2 5.2 0 0 1 21.3 12C19 16.6 12 21 12 21z"/></svg>
            </span>
            <div><small>Tahukah kamu?</small><strong>{{ $tip }}</strong></div>
        </div>
    </div>
</section>

{{-- KENALI SAHABATMU --}}
<section class="home-sand" id="kenali">
    <div class="wrap">
        <div class="home-head">
            <div>
                <h2>Kenali berbagai jenis kucing</h2>
            </div>
            <a class="home-more" href="{{ route('pengelolaan', ['username' => $username]) }}"> Lihat semua ras</a>
        </div>

        <div class="breeds">
            @foreach ($rasUnggulan as $r)
                <article class="breed">
                    <img src="{{ asset($r['gambar']) }}" alt="{{ $r['nama'] }}">
                    <div class="breed__body">
                        <div>
                            <h3>{{ $r['nama'] }}</h3>
                            <p>{{ $r['sifat'] }}</p>
                        </div>
                        <span class="breed__no">{{ $loop->iteration }}</span>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

{{-- FAKTA & PERAWATAN --}}
<section class="wrap home-facts" id="perawatan">
    <div class="fact-main">
        <span class="fact-pill">Fakta hari ini</span>
        <h2>{{ $fakta['judul'] }}</h2>
        <p>{{ $fakta['isi'] }}</p>
    </div>

    <div class="fact-grid">
        @foreach ($fitur as $f)
            <article class="fact-card">
                <span class="fact-card__icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">{!! $f['ikon'] !!}</svg>
                </span>
                <h3>{{ $f['judul'] }}</h3>
                <p>{{ $f['isi'] }}</p>
            </article>
        @endforeach
    </div>
</section>

@endsection