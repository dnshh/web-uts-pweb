<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /* ---------- LOGIN ---------- */

    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        // Simulasi login: cukup divalidasi, tanpa database
        $data = $request->validate([
            'username' => ['required', 'min:3', 'max:30', 'regex:/^[A-Za-z0-9_.]+$/'],
            'password' => ['required', 'min:4'],
        ], [
            'username.required' => 'Username wajib diisi.',
            'username.min'      => 'Username minimal 3 karakter.',
            'username.regex'    => 'Username hanya boleh huruf, angka, titik, dan garis bawah.',
            'password.required' => 'Password wajib diisi.',
            'password.min'      => 'Password minimal 4 karakter.',
        ]);

        // Username dibawa ke Dashboard sebagai request parameter (query string)
        return redirect()->route('dashboard', ['username' => $data['username']]);
    }

    /* ---------- DASHBOARD ---------- */

    public function dashboard(Request $request)
    {
        if (! $username = $request->query('username')) {
            return $this->kembaliKeLogin();
        }

        $produk = $this->produk();

        $stats = [
            ['label' => 'Jenis produk',  'value' => count($produk), 'note' => 'terdaftar di gudang'],
            ['label' => 'Total stok',    'value' => array_sum(array_column($produk, 'stok')), 'note' => 'unit semua produk'],
            ['label' => 'Hampir habis',  'value' => count(array_filter($produk, fn ($p) => $p['stok'] <= $p['minimum'])), 'note' => 'perlu segera dibeli'],
            ['label' => 'Nilai stok',    'value' => 'Rp ' . number_format(array_sum(array_map(fn ($p) => $p['stok'] * $p['harga'], $produk)), 0, ',', '.'), 'note' => 'stok x harga satuan'],
        ];

        $aktivitas = [
            ['waktu' => '08.15', 'teks' => 'Stok Beras Premium 5 kg bertambah 20 karung'],
            ['waktu' => '09.40', 'teks' => 'Telur Ayam 1 kg terjual 12 kg'],
            ['waktu' => '11.05', 'teks' => 'Minyak Goreng 2 L mencapai batas minimum'],
            ['waktu' => '13.30', 'teks' => 'Harga Kopi Bubuk 200 g diperbarui'],
        ];

        return view('dashboard', compact('username', 'stats', 'aktivitas'));
    }

    /* ---------- PENGELOLAAN ---------- */

    public function pengelolaan(Request $request)
    {
        if (! $username = $request->query('username')) {
            return $this->kembaliKeLogin();
        }

        // Pencarian sederhana lewat request parameter ?q=
        $q = trim((string) $request->query('q', ''));
        $produk = array_filter($this->produk(), function ($p) use ($q) {
            return $q === '' || stripos($p['nama'] . ' ' . $p['kategori'], $q) !== false;
        });

        return view('pengelolaan', ['username' => $username, 'q' => $q, 'produk' => $produk]);
    }

    /* ---------- PROFILE ---------- */

    public function profile(Request $request)
    {
        if (! $username = $request->query('username')) {
            return $this->kembaliKeLogin();
        }

        $detail = [
            'Username'   => $username,
            'Email'      => strtolower($username) . '@stokku.test',
            'Peran'      => 'Admin Gudang',
            'Lokasi'     => 'Gudang Utama',
            'Bergabung'  => '1 Agustus 2026',
        ];

        $akses = ['Melihat dashboard', 'Mencari dan melihat data produk', 'Memantau stok minimum'];

        return view('profile', compact('username', 'detail', 'akses'));
    }

    /* ---------- DATA & HELPER ---------- */

    private function kembaliKeLogin()
    {
        return redirect()->route('login')
            ->withErrors(['username' => 'Silakan masuk terlebih dahulu.']);
    }

    // Data contoh (pengganti database) untuk dirender dengan @foreach
    private function produk(): array
    {
        return [
            ['kode' => 'PRD-001', 'nama' => 'Beras Premium 5 kg',  'kategori' => 'Sembako',     'stok' => 48,  'minimum' => 15, 'harga' => 72000],
            ['kode' => 'PRD-002', 'nama' => 'Minyak Goreng 2 L',   'kategori' => 'Sembako',     'stok' => 9,   'minimum' => 10, 'harga' => 38000],
            ['kode' => 'PRD-003', 'nama' => 'Gula Pasir 1 kg',     'kategori' => 'Sembako',     'stok' => 30,  'minimum' => 12, 'harga' => 17500],
            ['kode' => 'PRD-004', 'nama' => 'Telur Ayam 1 kg',     'kategori' => 'Segar',       'stok' => 22,  'minimum' => 10, 'harga' => 29000],
            ['kode' => 'PRD-005', 'nama' => 'Kopi Bubuk 200 g',    'kategori' => 'Minuman',     'stok' => 14,  'minimum' => 8,  'harga' => 21000],
            ['kode' => 'PRD-006', 'nama' => 'Teh Celup 25 pcs',    'kategori' => 'Minuman',     'stok' => 6,   'minimum' => 8,  'harga' => 9500],
            ['kode' => 'PRD-007', 'nama' => 'Mi Instan Goreng',    'kategori' => 'Makanan',     'stok' => 120, 'minimum' => 40, 'harga' => 3200],
            ['kode' => 'PRD-008', 'nama' => 'Susu UHT 1 L',        'kategori' => 'Minuman',     'stok' => 25,  'minimum' => 10, 'harga' => 18500],
            ['kode' => 'PRD-009', 'nama' => 'Sabun Mandi Batang',  'kategori' => 'Kebersihan',  'stok' => 40,  'minimum' => 15, 'harga' => 4500],
            ['kode' => 'PRD-010', 'nama' => 'Deterjen 800 g',      'kategori' => 'Kebersihan',  'stok' => 11,  'minimum' => 12, 'harga' => 16000],
        ];
    }
}
