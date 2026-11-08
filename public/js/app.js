document.addEventListener('DOMContentLoaded', function () {

    // Menu navbar di layar kecil
    var tombol = document.getElementById('nav-burger');
    var menu = document.getElementById('nav-links');
    if (tombol && menu) {
        tombol.addEventListener('click', function () {
            var terbuka = menu.classList.toggle('open');
            tombol.setAttribute('aria-expanded', terbuka ? 'true' : 'false');
        });
    }

    // Tampilkan / sembunyikan password di halaman login
    var mata = document.getElementById('toggle-password');
    var isian = document.getElementById('password');
    if (mata && isian) {
        mata.addEventListener('click', function () {
            var tampil = isian.type === 'password';
            isian.type = tampil ? 'text' : 'password';
            mata.setAttribute('aria-label', tampil ? 'Sembunyikan kata sandi' : 'Tampilkan kata sandi');
        });
    }
});