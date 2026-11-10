@extends('layouts.app')

@section('title', 'Beranda')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

@section('wide')

    {{-- ===== 1. HERO ===== --}}
    <section class="beranda-hero">

        {{-- Kiri: teks dan tombol --}}
        <div class="beranda-hero-kiri">
            <h1>Lebih dekat dengan <em>kucing</em> di sekitar.</h1>

            <p class="beranda-hero-kiri-text">
                Kenali bahasa tubuh, karakter, dan cara merawat kucing agar mereka tumbuh sehat dan bahagia bersamamu.
            </p>

            <div class="beranda-hero-aksi">
                <a class="tombol-mulai-kenali" href="{{ route('pengelolaan', ['username' => $username]) }}">
                    Mulai kenali
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M5 12h14M13 6l6 6-6 6"/>
                    </svg>
                </a>

                <a class="tombol-fakta-unik" href="#perawatan">Fakta unik</a>
            </div>
        </div>

        {{-- Kanan: foto dan kartu tip --}}
        <div class="beranda-hero-kanan">


            <img class="beranda-hero-kucing-kanan"
                 src="{{ asset('images/kucing-dashboard.jpg') }}"
                 alt="Anak kucing sedang mengeong">

            <div class="beranda-hero-tip">
                <span class="tip-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M12 21s-7-4.4-9.3-9A5.2 5.2 0 0 1 12 6.6 5.2 5.2 0 0 1 21.3 12C19 16.6 12 21 12 21z"/>
                    </svg>
                </span>
                <div>
                    <small>Tahukah kamu?</small>
                    <strong>{{ $tip }}</strong>
                </div>
            </div>
        </div>

    </section>


    {{-- ===== 2. KENALI BERBAGAI JENIS KUCING ===== --}}
    <section class="beranda-kedua" id="kenali">
        <div class="wrap">

            <div class="beranda-kedua-head">
                <h2>Kenali berbagai jenis kucing</h2>
                <a class="home-more" href="{{ route('pengelolaan', ['username' => $username]) }}">
                    Lihat semua ras
                </a>
            </div>

            <div class="breeds">
                @foreach ($rasUnggulan as $r)
                    <article class="breed">
                        <img src="{{ asset($r['gambar']) }}" alt="{{ $r['nama'] }}">

                        <div class="breed-body">
                            <div>
                                <h3>{{ $r['nama'] }}</h3>
                                <p>{{ $r['sifat'] }}</p>
                            </div>
                            <span class="breed-no">{{ $loop->iteration }}</span>
                        </div>
                    </article>
                @endforeach
            </div>

        </div>
    </section>


    {{-- ===== 3. FAKTA DAN PERAWATAN ===== --}}
    <section class="wrap beranda-ketiga" id="perawatan">

        {{-- Kartu hijau: fakta hari ini --}}
        <div class="fakta-main">
            <span class="fakta-pill">Fakta hari ini</span>
            <h2>{{ $fakta['judul'] }}</h2>
            <p>{{ $fakta['isi'] }}</p>
        </div>

        {{-- Empat kartu putih --}}
        <div class="fakta-grid">
            @foreach ($fitur as $f)
                <article class="fakta-card">
                    <span class="fakta-card-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            {!! $f['ikon'] !!}
                        </svg>
                    </span>
                    <h3>{{ $f['judul'] }}</h3>
                    <p>{{ $f['isi'] }}</p>
                </article>
            @endforeach
        </div>

    </section>

@endsection