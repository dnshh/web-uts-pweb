<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Beranda') - StokKu</title>
    <style>
        :root {
            --bg: #F2F5F3; --card: #FFFFFF; --ink: #13262B; --muted: #5B6E72; --line: #D5DFDC;
            --brand: #0E6B63; --brand-dark: #0A4D47; --accent: #E8A317; --warn-bg: #FFF3D6;
        }
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; display: flex; flex-direction: column; background: var(--bg); color: var(--ink);
               font-family: "Segoe UI", system-ui, -apple-system, Roboto, sans-serif; line-height: 1.55; }
        a { color: var(--brand); }
        h1, h2 { line-height: 1.2; margin: 0 0 .5rem; }
        h1 { font-size: clamp(1.6rem, 4vw, 2.2rem); }
        h2 { font-size: 1.15rem; }
        .container { width: min(1080px, 100% - 2rem); margin: 0 auto; padding: 1.75rem 0 2.5rem; flex: 1; }
        .muted { color: var(--muted); }
        :focus-visible { outline: 3px solid var(--accent); outline-offset: 2px; }

        /* Navbar */
        .navbar { background: var(--brand-dark); color: #fff; position: sticky; top: 0; z-index: 10; }
        .navbar__inner { width: min(1080px, 100% - 2rem); margin: 0 auto; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; padding: .75rem 0; }
        .brand { font-weight: 700; font-size: 1.25rem; color: #fff; text-decoration: none; letter-spacing: .01em; }
        .nav-toggle { position: absolute; opacity: 0; pointer-events: none; }
        .nav-burger { display: none; padding: .4rem .8rem; border: 1px solid rgba(255,255,255,.5); border-radius: 6px; cursor: pointer; }
        .nav-toggle:focus-visible + .nav-burger { outline: 3px solid var(--accent); }
        .nav-links { display: flex; align-items: center; gap: .25rem; }
        .nav-links a { color: #E3F0EE; text-decoration: none; padding: .45rem .8rem; border-radius: 6px; }
        .nav-links a:hover { background: rgba(255,255,255,.12); }
        .nav-links a.active { background: var(--accent); color: #1c1500; font-weight: 600; }
        .nav-user { margin-left: .75rem; padding-left: .9rem; border-left: 1px solid rgba(255,255,255,.3); font-size: .95rem; }

        /* Footer */
        .footer { border-top: 1px solid var(--line); padding: 1.1rem 0; color: var(--muted); font-size: .9rem; }
        .footer__inner { width: min(1080px, 100% - 2rem); margin: 0 auto; display: flex; flex-wrap: wrap; justify-content: space-between; gap: .5rem; }

        /* Komponen umum */
        .card { background: var(--card); border: 1px solid var(--line); border-radius: 10px; padding: 1.25rem; }
        .grid { display: grid; gap: 1rem; grid-template-columns: repeat(auto-fit, minmax(210px, 1fr)); margin: 1.5rem 0; }
        .stat strong { display: block; font-size: 1.7rem; margin: .15rem 0; }
        .stat span { font-size: .9rem; color: var(--muted); }
        .btn { display: inline-block; border: 0; border-radius: 8px; padding: .65rem 1.2rem; background: var(--brand); color: #fff; font: inherit; font-weight: 600; cursor: pointer; text-decoration: none; }
        .btn:hover { background: var(--brand-dark); }
        .field { margin-bottom: 1rem; }
        .field label { display: block; font-weight: 600; margin-bottom: .3rem; }
        .field input { width: 100%; padding: .65rem .8rem; border: 1px solid #9DB0AC; border-radius: 8px; font: inherit; }
        .alert { background: #FBE7E4; border: 1px solid #E5A9A1; color: #7C2016; border-radius: 8px; padding: .75rem 1rem; margin-bottom: 1.25rem; }
        .alert ul { margin: 0; padding-left: 1.1rem; }
        .timeline { list-style: none; margin: 0; padding: 0; }
        .timeline li { display: flex; gap: 1rem; padding: .7rem 0; border-bottom: 1px solid var(--line); }
        .timeline li:last-child { border-bottom: 0; }
        .timeline time { font-variant-numeric: tabular-nums; color: var(--muted); min-width: 3.2rem; }

        /* Login */
        .login { display: grid; grid-template-columns: 1.1fr 1fr; border-radius: 14px; overflow: hidden; border: 1px solid var(--line); background: var(--card); margin-top: 1rem; }
        .login__intro { background: var(--brand); color: #fff; padding: 2.25rem; }
        .login__intro p { color: #D3E8E5; }
        .flow { padding-left: 1.2rem; margin: 1.5rem 0 0; }
        .flow li { margin-bottom: .55rem; }
        .flow code { background: rgba(0,0,0,.22); padding: .1rem .4rem; border-radius: 4px; font-size: .88em; }
        .login__form { padding: 2.25rem; align-self: center; }

        /* Profil */
        .profile { display: grid; grid-template-columns: 240px 1fr; gap: 1rem; margin-top: 1.5rem; align-items: start; }
        .avatar { width: 84px; height: 84px; border-radius: 50%; background: var(--accent); color: #1c1500; display: grid; place-items: center; font-size: 2.2rem; font-weight: 700; margin-bottom: .75rem; }
        dl { margin: 0; display: grid; grid-template-columns: 8rem 1fr; gap: .6rem 1rem; }
        dt { color: var(--muted); } dd { margin: 0; font-weight: 600; word-break: break-word; }

        /* Pengelolaan */
        .toolbar { display: flex; flex-wrap: wrap; gap: .6rem; margin: 1.25rem 0; }
        .toolbar input[type=search] { flex: 1 1 220px; padding: .6rem .8rem; border: 1px solid #9DB0AC; border-radius: 8px; font: inherit; }
        .table-wrap { background: var(--card); border: 1px solid var(--line); border-radius: 10px; overflow: hidden; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: .75rem 1rem; text-align: left; border-bottom: 1px solid var(--line); }
        th { background: #E8EFEC; font-size: .9rem; }
        tr:last-child td { border-bottom: 0; }
        td.num, th.num { text-align: right; font-variant-numeric: tabular-nums; }
        .badge { display: inline-block; padding: .15rem .6rem; border-radius: 99px; font-size: .82rem; font-weight: 600; }
        .badge--ok { background: #DDF0E8; color: #11593F; }
        .badge--low { background: var(--warn-bg); color: #7A5200; }
        .empty { padding: 2rem 1rem; text-align: center; color: var(--muted); }

        @media (max-width: 760px) {
            .nav-burger { display: inline-block; }
            .nav-links { display: none; width: 100%; flex-direction: column; align-items: stretch; padding-top: .6rem; }
            .nav-toggle:checked ~ .nav-links { display: flex; }
            .nav-user { margin: .4rem 0 0; padding: .4rem .8rem 0; border-left: 0; border-top: 1px solid rgba(255,255,255,.3); }
            .login, .profile { grid-template-columns: 1fr; }
            .login__intro, .login__form { padding: 1.5rem; }
            dl { grid-template-columns: 1fr; gap: .1rem; } dd { margin-bottom: .6rem; }
            table, tbody, tr, td { display: block; }
            thead { display: none; }
            tr { padding: .6rem 1rem; border-bottom: 1px solid var(--line); }
            td { display: flex; justify-content: space-between; gap: 1rem; border: 0; padding: .25rem 0; text-align: right; }
            td::before { content: attr(data-label); color: var(--muted); text-align: left; }
        }
    </style>
</head>
<body>
    {{-- Navbar hanya tampil jika sudah ada username (setelah login) --}}
    @isset($username)
        <x-navbar :username="$username" />
    @endisset

    <main class="container">
        @include('partials.alert')
        @yield('content')
    </main>

    <x-footer />
</body>
</html>
