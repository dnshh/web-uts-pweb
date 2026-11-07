@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1>Halo, {{ $username }}</h1>
    <p class="muted">Ringkasan stok gudang hari ini.</p>

    <div class="grid">
        @foreach ($stats as $stat)
            <x-stat-card :label="$stat['label']" :value="$stat['value']" :note="$stat['note']" />
        @endforeach
    </div>

    <section class="card">
        <h2>Aktivitas terbaru</h2>
        <ul class="timeline">
            @foreach ($aktivitas as $item)
                <li>
                    <time>{{ $item['waktu'] }}</time>
                    <span>{{ $item['teks'] }}</span>
                </li>
            @endforeach
        </ul>
    </section>
@endsection
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1>Halo, {{ $username }}</h1>
    <p class="muted">Ringkasan stok gudang hari ini.</p>

    <div class="grid">
        @foreach ($stats as $stat)
            <x-stat-card :label="$stat['label']" :value="$stat['value']" :note="$stat['note']" />
        @endforeach
    </div>

    <section class="card">
        <h2>Aktivitas terbaru</h2>
        <ul class="timeline">
            @foreach ($aktivitas as $item)
                <li>
                    <time>{{ $item['waktu'] }}</time>
                    <span>{{ $item['teks'] }}</span>
                </li>
            @endforeach
        </ul>
    </section>
@endsection
