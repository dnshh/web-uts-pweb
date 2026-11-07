@extends('layouts.app')

@section('title', 'Pengelolaan')

@section('content')
    <h1>Pengelolaan produk</h1>
    <p class="muted">Data berikut dikirim dari controller dalam bentuk array.</p>

    <form method="GET" action="{{ route('pengelolaan') }}" class="toolbar">
        <input type="hidden" name="username" value="{{ $username }}">
        <input type="search" name="q" value="{{ $q }}" placeholder="Cari nama atau kategori" aria-label="Cari produk">
        <button type="submit" class="btn">Cari</button>
    </form>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama produk</th>
                    <th>Kategori</th>
                    <th class="num">Stok</th>
                    <th class="num">Harga</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($produk as $p)
                    <tr>
                        <td data-label="Kode">{{ $p['kode'] }}</td>
                        <td data-label="Nama produk">{{ $p['nama'] }}</td>
                        <td data-label="Kategori">{{ $p['kategori'] }}</td>
                        <td data-label="Stok" class="num">{{ $p['stok'] }}</td>
                        <td data-label="Harga" class="num">Rp {{ number_format($p['harga'], 0, ',', '.') }}</td>
                        <td data-label="Status">
                            @if ($p['stok'] <= $p['minimum'])
                                <span class="badge badge--low">Hampir habis</span>
                            @else
                                <span class="badge badge--ok">Aman</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="empty">Tidak ada produk untuk kata kunci "{{ $q }}". Coba kata kunci lain.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
@extends('layouts.app')

@section('title', 'Pengelolaan')

@section('content')
    <h1>Pengelolaan produk</h1>
    <p class="muted">Data berikut dikirim dari controller dalam bentuk array.</p>

    <form method="GET" action="{{ route('pengelolaan') }}" class="toolbar">
        <input type="hidden" name="username" value="{{ $username }}">
        <input type="search" name="q" value="{{ $q }}" placeholder="Cari nama atau kategori" aria-label="Cari produk">
        <button type="submit" class="btn">Cari</button>
    </form>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama produk</th>
                    <th>Kategori</th>
                    <th class="num">Stok</th>
                    <th class="num">Harga</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($produk as $p)
                    <tr>
                        <td data-label="Kode">{{ $p['kode'] }}</td>
                        <td data-label="Nama produk">{{ $p['nama'] }}</td>
                        <td data-label="Kategori">{{ $p['kategori'] }}</td>
                        <td data-label="Stok" class="num">{{ $p['stok'] }}</td>
                        <td data-label="Harga" class="num">Rp {{ number_format($p['harga'], 0, ',', '.') }}</td>
                        <td data-label="Status">
                            @if ($p['stok'] <= $p['minimum'])
                                <span class="badge badge--low">Hampir habis</span>
                            @else
                                <span class="badge badge--ok">Aman</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="empty">Tidak ada produk untuk kata kunci "{{ $q }}". Coba kata kunci lain.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
