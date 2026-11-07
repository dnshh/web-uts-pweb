@props(['username'])

<header class="navbar">
    <div class="navbar__inner">
        <a class="brand" href="{{ route('dashboard', ['username' => $username]) }}">StokKu</a>

        <input type="checkbox" id="nav-toggle" class="nav-toggle" aria-label="Buka menu">
        <label for="nav-toggle" class="nav-burger">Menu</label>

        <nav class="nav-links" aria-label="Navigasi utama">
            {{-- Username diteruskan ke setiap halaman lewat request parameter --}}
            <a href="{{ route('dashboard', ['username' => $username]) }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
            <a href="{{ route('pengelolaan', ['username' => $username]) }}" class="{{ request()->routeIs('pengelolaan') ? 'active' : '' }}">Pengelolaan</a>
            <a href="{{ route('profile', ['username' => $username]) }}" class="{{ request()->routeIs('profile') ? 'active' : '' }}">Profile</a>
            <span class="nav-user">{{ $username }}</span>
            <a href="{{ route('login') }}">Keluar</a>
        </nav>
    </div>
</header>
