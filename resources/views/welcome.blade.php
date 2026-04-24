<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'WithYou') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&family=sora:400,600,700,800" rel="stylesheet" />

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        :root {
            --nav-h: 72px;

            --bg: #020617;
            --bg-soft: #0f172a;
            --surface: #0f172a;
            --surface-2: #111827;
            --border: #1e293b;

            --text: #f8fafc;
            --muted: #cbd5e1;
            --muted-2: #64748b;

            --blue: #2563eb;
            --blue-soft: rgba(37, 99, 235, 0.12);

            --violet: #7c3aed;
            --violet-soft: rgba(124, 58, 237, 0.12);

            --cyan: #0891b2;
            --cyan-soft: rgba(8, 145, 178, 0.12);

            --success: #22c55e;

            --shadow-sm: 0 12px 30px rgba(0, 0, 0, 0.16);
            --shadow-md: 0 18px 45px rgba(0, 0, 0, 0.22);
            --shadow-lg: 0 24px 50px rgba(0, 0, 0, 0.28);
        }

        html.light {
            --bg: #f8fafc;
            --bg-soft: #f1f5f9;
            --surface: #ffffff;
            --surface-2: #f8fafc;
            --border: #e2e8f0;

            --text: #0f172a;
            --muted: #64748b;
            --muted-2: #94a3b8;

            --blue-soft: rgba(37, 99, 235, 0.10);
            --violet-soft: rgba(124, 58, 237, 0.10);
            --cyan-soft: rgba(8, 145, 178, 0.10);

            --shadow-sm: 0 10px 28px rgba(15, 23, 42, 0.05);
            --shadow-md: 0 16px 40px rgba(15, 23, 42, 0.06);
            --shadow-lg: 0 22px 45px rgba(15, 23, 42, 0.10);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background: var(--bg);
            color: var(--text);
            overflow-x: hidden;
            transition: background .25s ease, color .25s ease;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .container {
            width: calc(100% - 40px);
            max-width: 1600px;
            margin-inline: auto;
        }

        /* NAV */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: var(--nav-h);
            z-index: 100;
            backdrop-filter: blur(14px);
            background: rgba(2, 6, 23, 0.80);
            border-bottom: 1px solid var(--border);
        }

        html.light nav {
            background: rgba(248, 250, 252, 0.86);
        }

        .nav-inner {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-family: 'Sora', sans-serif;
            font-size: 1.08rem;
            font-weight: 700;
        }

        .brand-mark {
            width: 42px;
            height: 42px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--blue), var(--violet));
            color: white;
            font-weight: 800;
            box-shadow: 0 12px 30px rgba(37, 99, 235, 0.28);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-link {
            padding: 10px 14px;
            border-radius: 12px;
            color: var(--muted);
            font-size: .92rem;
            font-weight: 600;
            transition: .2s ease;
        }

        .nav-link:hover {
            background: var(--surface);
            color: var(--text);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            border-radius: 14px;
            padding: 12px 18px;
            font-size: .95rem;
            font-weight: 700;
            border: 1px solid transparent;
            transition: .2s ease;
            cursor: pointer;
        }

        .btn-secondary {
            background: var(--surface);
            color: var(--text);
            border-color: var(--border);
        }

        .btn-secondary:hover {
            transform: translateY(-1px);
            border-color: #93c5fd;
        }

        .btn-primary {
            color: white;
            background: linear-gradient(135deg, var(--blue), var(--violet));
            box-shadow: 0 12px 30px rgba(37, 99, 235, 0.22);
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 18px 35px rgba(37, 99, 235, 0.30);
        }

        .theme-toggle,
        .menu-toggle {
            width: 42px;
            height: 42px;
            border-radius: 14px;
            border: 1px solid var(--border);
            background: var(--surface);
            color: var(--muted);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: .2s ease;
        }

        .theme-toggle:hover,
        .menu-toggle:hover {
            color: var(--text);
            border-color: #93c5fd;
        }

        .menu-toggle,
        .mobile-theme-toggle {
            display: none;
        }

        .mobile-menu {
            display: none;
            position: fixed;
            top: var(--nav-h);
            left: 0;
            right: 0;
            z-index: 95;
            border-bottom: 1px solid var(--border);
            background: var(--bg);
        }

        .mobile-menu.open {
            display: block;
        }

        .mobile-menu-inner {
            padding: 16px 0 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .mobile-menu .btn,
        .mobile-menu .nav-link {
            width: 100%;
        }

        /* HERO */
        .hero {
            padding-top: calc(var(--nav-h) + 34px);
            padding-bottom: 36px;
        }

        .hero-shell {
            position: relative;
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 30px;
            padding: 34px;
            background: linear-gradient(145deg, var(--surface), var(--surface-2));
            box-shadow: var(--shadow-md);
        }

        .hero-orb {
            position: absolute;
            border-radius: 999px;
            pointer-events: none;
        }

        .hero-orb.one {
            width: 240px;
            height: 240px;
            top: -60px;
            right: -40px;
            background: var(--violet-soft);
            filter: blur(4px);
        }

        .hero-orb.two {
            width: 180px;
            height: 180px;
            bottom: -50px;
            left: -40px;
            background: var(--blue-soft);
            filter: blur(4px);
        }

        .hero-grid {
            position: relative;
            z-index: 2;
            display: grid;
            grid-template-columns: 1.05fr .95fr;
            gap: 28px;
            align-items: center;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 18px;
            border-radius: 999px;
            padding: 9px 15px;
            font-size: .78rem;
            font-weight: 800;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: #93c5fd;
            background: rgba(37,99,235,.14);
            border: 1px solid rgba(59,130,246,.25);
        }

        .hero-badge-dot {
            width: 8px;
            height: 8px;
            border-radius: 999px;
            background: var(--blue);
        }

        .hero-title {
            font-family: 'Sora', sans-serif;
            font-size: clamp(2.4rem, 5vw, 4.4rem);
            line-height: 1.08;
            font-weight: 800;
            letter-spacing: -0.03em;
            margin-bottom: 18px;
            max-width: 680px;
        }

        .hero-title .accent {
            background: linear-gradient(135deg, var(--blue), var(--violet));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            color: transparent;
        }

        .hero-subtitle {
            max-width: 680px;
            font-size: 1rem;
            line-height: 1.9;
            color: var(--muted);
            margin-bottom: 26px;
        }

        .hero-points {
            display: grid;
            gap: 12px;
            margin-bottom: 28px;
        }

        .hero-point {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: .96rem;
            font-weight: 600;
        }

        .hero-point-icon {
            width: 38px;
            height: 38px;
            border-radius: 13px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--border);
            background: var(--surface);
            box-shadow: var(--shadow-sm);
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        /* PREVIEW */
        .preview-wrap {
            position: relative;
        }

        .floating-card {
            position: absolute;
            z-index: 5;
            border: 1px solid var(--border);
            background: rgba(15, 23, 42, 0.88);
            backdrop-filter: blur(10px);
            border-radius: 18px;
            padding: 12px 14px;
            box-shadow: var(--shadow-sm);
        }

        html.light .floating-card {
            background: rgba(255,255,255,.92);
        }

        .floating-top {
            top: -14px;
            right: 18px;
            min-width: 170px;
        }

        .floating-bottom {
            bottom: 18px;
            left: -10px;
            min-width: 190px;
        }

        .floating-title {
            font-size: .78rem;
            font-weight: 800;
            margin-bottom: 4px;
        }

        .floating-sub {
            font-size: .76rem;
            color: var(--muted);
            line-height: 1.5;
        }

        .app-preview {
            overflow: hidden;
            border-radius: 26px;
            border: 1px solid var(--border);
            background: linear-gradient(180deg, var(--surface), var(--surface-2));
            box-shadow: var(--shadow-lg);
        }

        .preview-topbar {
            padding: 14px 18px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 8px;
            background: var(--surface);
        }

        .preview-dot {
            width: 10px;
            height: 10px;
            border-radius: 999px;
            background: var(--muted-2);
            opacity: .6;
        }

        .preview-body {
            display: grid;
            grid-template-columns: 200px 1fr;
            min-height: 430px;
        }

        .preview-sidebar {
            border-right: 1px solid var(--border);
            background: var(--bg-soft);
            padding: 18px 14px;
        }

        .preview-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 18px;
            padding: 8px;
        }

        .preview-brand-mark {
            width: 30px;
            height: 30px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--blue), var(--violet));
        }

        .preview-brand-text {
            font-weight: 800;
            font-size: .88rem;
        }

        .preview-nav {
            display: grid;
            gap: 8px;
        }

        .preview-nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 12px;
            font-size: .82rem;
            font-weight: 700;
            color: var(--muted);
        }

        .preview-nav-item.active {
            color: #93c5fd;
            background: rgba(37,99,235,.12);
            border: 1px solid rgba(59,130,246,.18);
        }

        .preview-nav-icon {
            width: 8px;
            height: 8px;
            border-radius: 999px;
            background: currentColor;
        }

        .preview-content {
            padding: 18px;
            display: grid;
            gap: 14px;
            background: var(--surface-2);
        }

        .preview-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }

        .preview-title {
            font-size: 1rem;
            font-weight: 800;
        }

        .preview-chip {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border-radius: 999px;
            padding: 8px 12px;
            background: var(--violet-soft);
            color: #c4b5fd;
            font-size: .74rem;
            font-weight: 800;
        }

        .stats-mini {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }

        .mini-card {
            border: 1px solid var(--border);
            background: var(--surface);
            border-radius: 18px;
            padding: 14px;
            box-shadow: var(--shadow-sm);
        }

        .mini-label {
            font-size: .72rem;
            color: var(--muted-2);
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .08em;
            margin-bottom: 8px;
        }

        .mini-num {
            font-size: 1.7rem;
            font-weight: 800;
            line-height: 1;
        }

        .mini-num.blue { color: #60a5fa; }
        .mini-num.violet { color: #a78bfa; }
        .mini-num.cyan { color: #22d3ee; }

        .workspace-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .workspace-card {
            overflow: hidden;
            border-radius: 20px;
            border: 1px solid var(--border);
            background: var(--surface);
            box-shadow: var(--shadow-sm);
        }

        .workspace-banner {
            min-height: 74px;
            padding: 14px;
            display: flex;
            align-items: end;
            color: white;
            font-size: 1.1rem;
            font-weight: 800;
            position: relative;
        }

        .workspace-banner.blue {
            background: linear-gradient(135deg, #2563eb, #4f46e5);
        }

        .workspace-banner.violet {
            background: linear-gradient(135deg, #7c3aed, #c026d3);
        }

        .workspace-banner::after {
            content: "";
            position: absolute;
            width: 70px;
            height: 70px;
            border-radius: 999px;
            background: rgba(255,255,255,.10);
            top: -18px;
            right: -18px;
        }

        .workspace-body {
            padding: 14px;
        }

        .workspace-name {
            font-size: .92rem;
            font-weight: 800;
            margin-bottom: 6px;
        }

        .workspace-meta {
            font-size: .8rem;
            color: var(--muted);
            margin-bottom: 10px;
            line-height: 1.6;
        }

        .workspace-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border-radius: 999px;
            padding: 7px 10px;
            background: var(--bg-soft);
            border: 1px solid var(--border);
            font-size: .72rem;
            font-weight: 700;
            color: var(--muted);
        }

        .workspace-tag span {
            width: 8px;
            height: 8px;
            border-radius: 999px;
            background: var(--success);
        }

        /* COMMON SECTIONS */
        .section {
            padding: 0 0 34px;
        }

        .section-card {
            border: 1px solid var(--border);
            border-radius: 28px;
            background: linear-gradient(180deg, var(--surface), var(--surface-2));
            box-shadow: var(--shadow-md);
            padding: 28px;
        }

        .section-head {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 24px;
        }

        .section-kicker {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 12px;
            font-size: .78rem;
            font-weight: 800;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: #818cf8;
        }

        .section-kicker .dot {
            width: 8px;
            height: 8px;
            border-radius: 999px;
            background: var(--blue);
        }

        .section-title {
            font-family: 'Sora', sans-serif;
            font-size: clamp(1.5rem, 3vw, 2.2rem);
            line-height: 1.2;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .section-subtitle {
            max-width: 650px;
            color: var(--muted);
            font-size: .98rem;
            line-height: 1.8;
        }

        .feature-grid,
        .steps-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
        }

        .feature-card,
        .step-card {
            border: 1px solid var(--border);
            background: var(--surface);
            border-radius: 22px;
            padding: 20px;
            box-shadow: var(--shadow-sm);
            transition: .2s ease;
        }

        .feature-card:hover,
        .step-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
            border-color: #334155;
        }

        .feature-icon {
            width: 54px;
            height: 54px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
            border: 1px solid var(--border);
        }

        .feature-icon.blue { background: var(--blue-soft); color: #60a5fa; }
        .feature-icon.violet { background: var(--violet-soft); color: #a78bfa; }
        .feature-icon.cyan { background: var(--cyan-soft); color: #22d3ee; }

        .feature-title,
        .step-title {
            font-size: 1rem;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .feature-desc,
        .step-desc {
            color: var(--muted);
            font-size: .92rem;
            line-height: 1.75;
        }

        .step-num {
            width: 46px;
            height: 46px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
            font-family: 'Sora', sans-serif;
            font-size: 1rem;
            font-weight: 800;
            background: rgba(37,99,235,.12);
            border: 1px solid rgba(59,130,246,.18);
            color: #93c5fd;
        }

        /* CTA */
        .cta {
            padding: 0 0 44px;
        }

        .cta-box {
            position: relative;
            overflow: hidden;
            border-radius: 30px;
            border: 1px solid var(--border);
            background: linear-gradient(135deg, rgba(37,99,235,.08), rgba(124,58,237,.08), rgba(8,145,178,.08));
            box-shadow: var(--shadow-md);
            padding: 30px;
        }

        .cta-box::before {
            content: "";
            position: absolute;
            width: 220px;
            height: 220px;
            border-radius: 999px;
            background: rgba(124,58,237,.10);
            right: -50px;
            top: -50px;
        }

        .cta-inner {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }

        .cta-title {
            font-family: 'Sora', sans-serif;
            font-size: clamp(1.5rem, 3vw, 2.2rem);
            font-weight: 800;
            margin-bottom: 8px;
        }

        .cta-sub {
            color: var(--muted);
            line-height: 1.8;
            max-width: 700px;
        }

        /* FOOTER */
        footer {
            padding: 0 0 34px;
        }

        .footer-card {
            border: 1px solid var(--border);
            border-radius: 24px;
            background: linear-gradient(180deg, var(--surface), var(--surface-2));
            box-shadow: var(--shadow-sm);
            padding: 20px 22px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
        }

        .footer-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .footer-copy {
            color: var(--muted);
            font-size: .9rem;
        }

        .footer-links {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
        }

        .footer-links a {
            color: var(--muted);
            font-weight: 600;
            font-size: .9rem;
        }

        .footer-links a:hover {
            color: var(--text);
        }

        /* REVEAL */
        .reveal {
            opacity: 0;
            transform: translateY(24px);
            transition: opacity .6s ease, transform .6s ease;
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* RESPONSIVE */
        @media (max-width: 1100px) {
            .hero-grid {
                grid-template-columns: 1fr;
            }

            .feature-grid,
            .steps-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 900px) {
            .preview-body {
                grid-template-columns: 1fr;
            }

            .preview-sidebar {
                display: none;
            }

            .workspace-grid,
            .stats-mini {
                grid-template-columns: 1fr;
            }

            .floating-top,
            .floating-bottom {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .menu-toggle,
            .mobile-theme-toggle {
                display: inline-flex;
            }

            .hero-shell,
            .section-card,
            .cta-box {
                padding: 22px;
            }

            .feature-grid,
            .steps-grid {
                grid-template-columns: 1fr;
            }

            .hero {
                padding-top: calc(var(--nav-h) + 22px);
            }

            .container {
                width: calc(100% - 24px);
            }
        }
    </style>
</head>
<body>
    <nav>
        <div class="container nav-inner">
            <a href="/" class="brand">
                <div class="brand-mark">W</div>
                <span>WithYou</span>
            </a>

            <div class="nav-links">
                <a href="#features" class="nav-link">Features</a>
                <a href="#how-it-works" class="nav-link">How it works</a>

                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-secondary">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-secondary">Sign in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary">Get started</a>
                        @endif
                    @endauth
                @endif

                <button class="theme-toggle desktop-theme-toggle" onclick="toggleTheme()" aria-label="Toggle theme">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                    </svg>
                </button>
            </div>

            <div style="display:flex; align-items:center; gap:8px;">
                <button class="theme-toggle mobile-theme-toggle" onclick="toggleTheme()" aria-label="Toggle theme mobile">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                    </svg>
                </button>

                <button class="menu-toggle" onclick="toggleMenu()" aria-label="Menu">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                        <line x1="2" y1="5" x2="16" y2="5" />
                        <line x1="2" y1="9" x2="16" y2="9" />
                        <line x1="2" y1="13" x2="16" y2="13" />
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <div class="mobile-menu" id="mobileMenu">
        <div class="container mobile-menu-inner">
            <a href="#features" class="nav-link">Features</a>
            <a href="#how-it-works" class="nav-link">How it works</a>

            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-secondary">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-secondary">Sign in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-primary">Get started</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>

    <main>
        <section class="hero">
            <div class="container">
                <div class="hero-shell reveal">
                    <div class="hero-orb one"></div>
                    <div class="hero-orb two"></div>

                    <div class="hero-grid">
                        <div>
                            <div class="hero-badge">
                                <span class="hero-badge-dot"></span>
                                Learning platform for students & teachers
                            </div>

                            <h1 class="hero-title">
                                Learn, collaborate, and grow with
                                <span class="accent">WithYou</span>
                            </h1>

                            <p class="hero-subtitle">
                                One clean workspace for courses, lessons, exercises, chat rooms, and live collaboration.
                                Built for focused learning with the same modern feel as your dashboard.
                            </p>

                            <div class="hero-points">
                                <div class="hero-point">
                                    <div class="hero-point-icon">
                                        <svg width="18" height="18" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.8" style="color:#60a5fa;">
                                            <rect x="2" y="2" width="7" height="7" rx="2"></rect>
                                            <rect x="11" y="2" width="7" height="7" rx="2"></rect>
                                            <rect x="2" y="11" width="7" height="7" rx="2"></rect>
                                            <rect x="11" y="11" width="7" height="7" rx="2"></rect>
                                        </svg>
                                    </div>
                                    Organized workspaces for every course
                                </div>

                                <div class="hero-point">
                                    <div class="hero-point-icon">
                                        <svg width="18" height="18" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.8" style="color:#a78bfa;">
                                            <path d="M3 5h14M3 9h10M3 13h12" stroke-linecap="round"></path>
                                        </svg>
                                    </div>
                                    Lessons and exercises in one place
                                </div>

                                <div class="hero-point">
                                    <div class="hero-point-icon">
                                        <svg width="18" height="18" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.8" style="color:#22d3ee;">
                                            <rect x="1.5" y="5" width="11" height="8" rx="2"></rect>
                                            <path d="M12.5 8l5-3v8l-5-3" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                    Real-time rooms and video collaboration
                                </div>
                            </div>

                            <div class="hero-actions">
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-primary">Get started</a>
                                @endif
                                <a href="#features" class="btn btn-secondary">Explore features</a>
                            </div>
                        </div>

                        <div class="preview-wrap">
                            <div class="floating-card floating-top">
                                <div class="floating-title">Student workspace</div>
                                <div class="floating-sub">Courses, lessons, chat and progress overview in one clean panel.</div>
                            </div>

                            <div class="floating-card floating-bottom">
                                <div class="floating-title">Live collaboration</div>
                                <div class="floating-sub">Join rooms, continue discussions, and stay connected with your class.</div>
                            </div>

                            <div class="app-preview">
                                <div class="preview-topbar">
                                    <span class="preview-dot"></span>
                                    <span class="preview-dot"></span>
                                    <span class="preview-dot"></span>
                                </div>

                                <div class="preview-body">
                                    <div class="preview-sidebar">
                                        <div class="preview-brand">
                                            <div class="preview-brand-mark"></div>
                                            <div class="preview-brand-text">WithYou</div>
                                        </div>

                                        <div class="preview-nav">
                                            <div class="preview-nav-item active">
                                                <span class="preview-nav-icon"></span>
                                                Dashboard
                                            </div>
                                            <div class="preview-nav-item">
                                                <span class="preview-nav-icon"></span>
                                                Workspaces
                                            </div>
                                            <div class="preview-nav-item">
                                                <span class="preview-nav-icon"></span>
                                                Lessons
                                            </div>
                                            <div class="preview-nav-item">
                                                <span class="preview-nav-icon"></span>
                                                Exercises
                                            </div>
                                            <div class="preview-nav-item">
                                                <span class="preview-nav-icon"></span>
                                                Rooms
                                            </div>
                                        </div>
                                    </div>

                                    <div class="preview-content">
                                        <div class="preview-head">
                                            <div class="preview-title">Learning overview</div>
                                            <div class="preview-chip">Student panel</div>
                                        </div>

                                        <div class="stats-mini">
                                            <div class="mini-card">
                                                <div class="mini-label">Workspaces</div>
                                                <div class="mini-num blue">08</div>
                                            </div>
                                            <div class="mini-card">
                                                <div class="mini-label">Lessons</div>
                                                <div class="mini-num violet">24</div>
                                            </div>
                                            <div class="mini-card">
                                                <div class="mini-label">Exercises</div>
                                                <div class="mini-num cyan">13</div>
                                            </div>
                                        </div>

                                        <div class="workspace-grid">
                                            <div class="workspace-card">
                                                <div class="workspace-banner blue">WD</div>
                                                <div class="workspace-body">
                                                    <div class="workspace-name">Web Development</div>
                                                    <div class="workspace-meta">Frontend fundamentals and Laravel basics</div>
                                                    <div class="workspace-tag"><span></span> Teacher: Amal</div>
                                                </div>
                                            </div>

                                            <div class="workspace-card">
                                                <div class="workspace-banner violet">UI</div>
                                                <div class="workspace-body">
                                                    <div class="workspace-name">UI Design</div>
                                                    <div class="workspace-meta">Layouts, spacing, cards, and clean design systems</div>
                                                    <div class="workspace-tag"><span></span> Teacher: Salma</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section" id="features">
            <div class="container">
                <div class="section-card reveal">
                    <div class="section-head">
                        <div>
                            <div class="section-kicker">
                                <span class="dot"></span>
                                Core features
                            </div>
                            <h2 class="section-title">Everything you need for a better learning flow</h2>
                            <p class="section-subtitle">
                                Clean structure, clear navigation, and a dashboard-inspired UI for students and teachers.
                            </p>
                        </div>
                    </div>

                    <div class="feature-grid">
                        <div class="feature-card">
                            <div class="feature-icon blue">
                                <svg width="24" height="24" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <rect x="2" y="2" width="7" height="7" rx="2"></rect>
                                    <rect x="11" y="2" width="7" height="7" rx="2"></rect>
                                    <rect x="2" y="11" width="7" height="7" rx="2"></rect>
                                    <rect x="11" y="11" width="7" height="7" rx="2"></rect>
                                </svg>
                            </div>
                            <div class="feature-title">Workspaces</div>
                            <div class="feature-desc">Group students and teachers inside focused spaces built around real courses and collaboration.</div>
                        </div>

                        <div class="feature-card">
                            <div class="feature-icon violet">
                                <svg width="24" height="24" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M3 5h14M3 9h10M3 13h12" stroke-linecap="round"></path>
                                </svg>
                            </div>
                            <div class="feature-title">Lessons</div>
                            <div class="feature-desc">Keep learning material structured and easy to follow, whether it is text, links, videos, or files.</div>
                        </div>

                        <div class="feature-card">
                            <div class="feature-icon cyan">
                                <svg width="24" height="24" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M3 15L7 8l4 3.5L14.5 5 18 9" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                            <div class="feature-title">Exercises</div>
                            <div class="feature-desc">Practice directly after every lesson and keep the learning momentum inside the same platform.</div>
                        </div>

                        <div class="feature-card">
                            <div class="feature-icon blue">
                                <svg width="24" height="24" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <rect x="1.5" y="5" width="11" height="8" rx="2"></rect>
                                    <path d="M12.5 8l5-3v8l-5-3" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                            <div class="feature-title">Live rooms</div>
                            <div class="feature-desc">Open discussions, exchange ideas, and jump into video sessions without leaving the workspace.</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section" id="how-it-works">
            <div class="container">
                <div class="section-card reveal">
                    <div class="section-head">
                        <div>
                            <div class="section-kicker">
                                <span class="dot"></span>
                                How it works
                            </div>
                            <h2 class="section-title">A simple flow for students and teachers</h2>
                            <p class="section-subtitle">
                                From joining the platform to collaborating inside workspaces, everything stays clear and consistent.
                            </p>
                        </div>
                    </div>

                    <div class="steps-grid">
                        <div class="step-card">
                            <div class="step-num">01</div>
                            <div class="step-title">Create your account</div>
                            <div class="step-desc">Sign up in seconds and access the platform with a clean, distraction-free experience.</div>
                        </div>

                        <div class="step-card">
                            <div class="step-num">02</div>
                            <div class="step-title">Join a workspace</div>
                            <div class="step-desc">Enter your learning space and see your courses, lessons, and collaboration rooms immediately.</div>
                        </div>

                        <div class="step-card">
                            <div class="step-num">03</div>
                            <div class="step-title">Follow your lessons</div>
                            <div class="step-desc">Move through structured content and keep everything organized from one dashboard.</div>
                        </div>

                        <div class="step-card">
                            <div class="step-num">04</div>
                            <div class="step-title">Practice and collaborate</div>
                            <div class="step-desc">Complete exercises, talk with your team, and stay active through live discussion rooms.</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="cta">
            <div class="container">
                <div class="cta-box reveal">
                    <div class="cta-inner">
                        <div>
                            <h2 class="cta-title">Ready to start with WithYou?</h2>
                            <p class="cta-sub">
                                A welcome page with the same clean vibe as your dashboard: modern, academic, and focused on learning.
                            </p>
                        </div>

                        <div style="display:flex; gap:12px; flex-wrap:wrap;">
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-primary">Create account</a>
                            @endif

                            @if (Route::has('login'))
                                <a href="{{ route('login') }}" class="btn btn-secondary">Sign in</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer>
            <div class="container">
                <div class="footer-card">
                    <div class="footer-left">
                        <div class="brand-mark" style="width:38px;height:38px;border-radius:12px;">W</div>
                        <div>
                            <div style="font-family:'Sora',sans-serif;font-weight:800;">WithYou</div>
                            <div class="footer-copy">Built for focused learning and better collaboration.</div>
                        </div>
                    </div>

                    <div class="footer-links">
                        <a href="#features">Features</a>
                        <a href="#how-it-works">How it works</a>
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}">Login</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">Register</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </footer>
    </main>

    <script>
        function toggleTheme() {
            const html = document.documentElement;
            if (html.classList.contains('light')) {
                html.classList.remove('light');
                localStorage.setItem('theme', 'dark');
            } else {
                html.classList.add('light');
                localStorage.setItem('theme', 'light');
            }
        }

        function toggleMenu() {
            document.getElementById('mobileMenu').classList.toggle('open');
        }

        (function () {
            const html = document.documentElement;
            const savedTheme = localStorage.getItem('theme');
            const prefersLight = window.matchMedia('(prefers-color-scheme: light)').matches;

            if (savedTheme === 'light' || (!savedTheme && prefersLight)) {
                html.classList.add('light');
            }

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, { threshold: 0.12 });

            document.querySelectorAll('.reveal').forEach((el) => observer.observe(el));
        })();
    </script>
</body>
</html>
