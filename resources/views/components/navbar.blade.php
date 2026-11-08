@props(['username'])

<header class="site-header">
    <div class="site-header__inner">
        <a class="logo" href="{{ route('dashboard', ['username' => $username]) }}">
            <span class="logo__icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="#fff" aria-hidden="true">
                    <circle cx="6" cy="10" r="2.3"/><circle cx="10" cy="5.5" r="2.3"/>
                    <circle cx="14" cy="5.5" r="2.3"/><circle cx="18" cy="10" r="2.3"/>
                    <path d="M12 12c-3 0-5.5 2.6-5.5 5 0 1.8 1.4 2.5 3 2.5 1 0 1.6-.4 2.5-.4s1.5.4 2.5.4c1.6 0 3-.7 3-2.5 0-2.4-2.5-5-5.5-5z"/>
                </svg>
            </span>
            MeowInfo
        </a>

        <button type="button" id="nav-burger" class="site-burger" aria-expanded="false" aria-controls="nav-links">Menu</button>

        <nav id="nav-links" class="site-nav" aria-label="Navigasi utama">
            <a href="{{ route('dashboard', ['username' => $username]) }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Beranda</a>
            <a href="{{ route('pengelolaan', ['username' => $username]) }}" class="{{ request()->routeIs('pengelolaan') ? 'active' : '' }}">Kenali Kucing</a>
            <a href="{{ route('dashboard', ['username' => $username]) }}#perawatan">Perawatan</a>
            <a href="{{ route('profile', ['username' => $username]) }}" class="{{ request()->routeIs('profile') ? 'active' : '' }}">Profil</a>
        </nav>

        <div class="user">
            <div class="user__text">
                <strong>{{ $username }}</strong>
                <a href="{{ route('login') }}">Keluar</a>
            </div>
            <a class="user__avatar" href="{{ route('profile', ['username' => $username]) }}" aria-label="Profil {{ $username }}">
                {{ mb_strtoupper(mb_substr($username, 0, 1)) }}
            </a>
        </div>
    </div>
</header>