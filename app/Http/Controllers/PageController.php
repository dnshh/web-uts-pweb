<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
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

        return redirect()->route('dashboard', ['username' => $data['username']]);
    }

    public function dashboard(Request $request)
    {
        if (! $username = $request->query('username')) {
            return $this->kembaliKeLogin();
    }

    $rasUnggulan = [
        ['nama' => 'Kucing Domestik', 'sifat' => 'Adaptif & penuh kasih',    'gambar' => 'images/kucing-domestik.jpg'],
        ['nama' => 'Kucing Persia',   'sifat' => 'Tenang & suka dimanja',    'gambar' => 'images/kucing-persia.jpg'],
        ['nama' => 'Kucing Maine Coon',    'sifat' => 'Lembut & ramah', 'gambar' => 'images/kucing-mainecoon.jpg'],
    ];

    $tip = 'Kucing tidur 12-16 jam sehari.';

    $fakta = [
        'judul' => 'Dengkuran tidak selalu berarti senang.',
        'isi'   => 'Kucing juga mendengkur untuk menenangkan diri saat cemas atau sedang memulihkan tubuhnya.',
    ];

    // 'ikon' berisi path SVG (data dari controller, bukan input pengguna)
    $fitur = [
        ['judul' => 'Bahasa Tubuh',     'isi' => 'Ekor, telinga, dan mata mereka selalu bercerita.',
         'ikon' => '<path d="M12 21s-7-4.4-9.3-9A5.2 5.2 0 0 1 12 6.6 5.2 5.2 0 0 1 21.3 12C19 16.6 12 21 12 21z"/>'],
        ['judul' => 'Perawatan Dasar',  'isi' => 'Panduan sederhana untuk kucing sehat dan bahagia.',
         'ikon' => '<path d="M3 11l9-8 9 8"/><path d="M5 10v10h14V10"/><path d="M10 20v-5h4v5"/>'],
        ['judul' => 'Nutrisi Tepat',    'isi' => 'Kenali kebutuhan makan sesuai usia dan aktivitas.',
         'ikon' => '<path d="M7 3v6a3 3 0 0 0 6 0V3M10 3v18M17 3c-2 2-2 6 0 8v10"/>'],
        ['judul' => 'Waktu Bermain',    'isi' => 'Stimulasi penting untuk tubuh dan pikiran mereka.',
         'ikon' => '<path d="M12 3l2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.2l-5.6 3 1.1-6.2L3 9.6l6.2-.9z"/>'],
    ];

        return view('dashboard', compact('username', 'rasUnggulan', 'tip', 'fakta', 'fitur'));
}

    public function profile(Request $request)
    {
        if (! $username = $request->query('username')) {
            return $this->kembaliKeLogin();
        }

        $detail = [
            'Username'    => $username,
            'Email'       => strtolower($username) . '@kucing.test',
            'Status'      => 'Pecinta kucing',
            'Ras favorit' => 'Kucing Domestik',
        ];

        return view('profile', compact('username', 'detail'));
    }

    private function kembaliKeLogin()
    {
        return redirect()->route('login')
            ->withErrors(['username' => 'Silakan masuk terlebih dahulu.']);
    }

    // Data contoh (pengganti database)
    private function ras(): array
    {
        return [
            ['nama' => 'Persia',           'asal' => 'Iran (Persia)',  'berat' => '3-5,5 kg', 'bulu' => 'Panjang', 'sifat' => 'Tenang dan suka bersantai.',          'gambar' => 'images/ras/persia.svg'],
            ['nama' => 'Maine Coon',       'asal' => 'Amerika Serikat', 'berat' => '4-8 kg',   'bulu' => 'Panjang', 'sifat' => 'Besar, ramah, dan mudah akrab.',      'gambar' => 'images/ras/maine-coon.svg'],
            ['nama' => 'Siam',             'asal' => 'Thailand',        'berat' => '2,5-5,5 kg', 'bulu' => 'Pendek', 'sifat' => 'Aktif dan sering mengeong.',           'gambar' => 'images/ras/siam.svg'],
            ['nama' => 'Anggora',          'asal' => 'Turki',           'berat' => '2,5-5 kg', 'bulu' => 'Panjang', 'sifat' => 'Lincah dan suka bermain.',             'gambar' => 'images/ras/anggora.svg'],
            ['nama' => 'British Shorthair', 'asal' => 'Inggris',        'berat' => '4-8 kg',   'bulu' => 'Pendek', 'sifat' => 'Kalem dan tidak terlalu manja.',        'gambar' => 'images/ras/british-shorthair.svg'],
            ['nama' => 'Kucing Domestik',  'asal' => 'Di mana saja',    'berat' => '3-5 kg',   'bulu' => 'Pendek', 'sifat' => 'Tangguh dan mudah beradaptasi.',        'gambar' => 'images/ras/domestik.svg'],
        ];
    }
}
