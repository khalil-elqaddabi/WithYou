<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'WithYou') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&family=sora:400,600,700" rel="stylesheet" />

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        :root {
            --c-bg: #faf8f5;
            --c-bg2: #ffffff;
            --c-surface: #ffffff;
            --c-border: #ede8df;
            --c-text: #1c1917;
            --c-text2: #78716c;
            --c-text3: #a8a29e;
            --c-accent: #f97316;
            --c-accent2: #fb923c;
            --c-accent-bg: #fff7ed;
            --c-purple: #7c3aed;
            --c-purple-bg: #f5f3ff;
            --c-green: #16a34a;
            --c-green-bg: #f0fdf4;
            --c-amber: #d97706;
            --c-amber-bg: #fffbeb;
            --nav-h: 68px;
        }
        html.dark {
            --c-bg: #131008;
            --c-bg2: #1c1810;
            --c-surface: #221e14;
            --c-border: #2d2820;
            --c-text: #faf8f5;
            --c-text2: #a8a29e;
            --c-text3: #57534e;
            --c-accent: #fb923c;
            --c-accent2: #f97316;
            --c-accent-bg: #1c1008;
            --c-purple: #a78bfa;
            --c-purple-bg: #1e1a2e;
            --c-green: #4ade80;
            --c-green-bg: #0d1f12;
            --c-amber: #fbbf24;
            --c-amber-bg: #1c1608;
        }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { font-family: 'Plus Jakarta Sans', sans-serif; }
        body {
            background: var(--c-bg);
            color: var(--c-text);
            transition: background 0.3s, color 0.3s;
            overflow-x: hidden;
        }

        /* ── NAV ── */
        nav {
            position: fixed; top: 0; left: 0; right: 0; z-index: 100;
            height: var(--nav-h);
            background: var(--c-bg);
            border-bottom: 1px solid var(--c-border);
            display: flex; align-items: center;
            padding: 0 clamp(1rem, 5vw, 4rem);
            transition: background 0.3s, border-color 0.3s;
        }
        .nav-logo {
            display: flex; align-items: center; gap: 10px;
            text-decoration: none;
            font-family: 'Sora', sans-serif;
            font-weight: 700; font-size: 1.2rem;
            color: var(--c-text);
        }
        .nav-logo-icon {
            width: 36px; height: 36px; border-radius: 10px;
            background: var(--c-accent);
            display: flex; align-items: center; justify-content: center;
            font-size: 16px; color: white; font-weight: 800;
        }
        .nav-links { margin-left: auto; display: flex; align-items: center; gap: 8px; }
        .btn-ghost {
            padding: 8px 18px; border-radius: 10px;
            font-size: 0.875rem; font-weight: 500;
            color: var(--c-text2);
            text-decoration: none;
            border: 1.5px solid transparent;
            transition: all 0.2s;
            cursor: pointer; background: transparent;
        }
        .btn-ghost:hover { color: var(--c-text); border-color: var(--c-border); background: var(--c-surface); }
        .btn-primary {
            padding: 8px 20px; border-radius: 10px;
            font-size: 0.875rem; font-weight: 600;
            background: var(--c-accent); color: white;
            text-decoration: none; border: none; cursor: pointer;
            transition: all 0.2s;
        }
        .btn-primary:hover { background: var(--c-accent2); transform: translateY(-1px); }
        .btn-secondary {
            padding: 8px 20px; border-radius: 10px;
            font-size: 0.875rem; font-weight: 600;
            background: transparent; color: var(--c-accent);
            border: 1.5px solid var(--c-accent);
            text-decoration: none; cursor: pointer;
            transition: all 0.2s;
        }
        .btn-secondary:hover { background: var(--c-accent-bg); }

        /* theme toggle */
        .theme-toggle {
            width: 38px; height: 38px; border-radius: 10px;
            border: 1.5px solid var(--c-border);
            background: var(--c-surface);
            display: flex; align-items: center; justify-content: center;
            cursor: pointer; transition: all 0.2s;
            color: var(--c-text2);
        }
        .theme-toggle:hover { border-color: var(--c-accent); color: var(--c-accent); }
        .icon-sun, .icon-moon { width: 16px; height: 16px; }
        html.dark .icon-sun { display: block; }
        html.dark .icon-moon { display: none; }
        html:not(.dark) .icon-sun { display: none; }
        html:not(.dark) .icon-moon { display: block; }

        /* mobile menu */
        .menu-toggle {
            display: none; width: 38px; height: 38px; border-radius: 10px;
            border: 1.5px solid var(--c-border); background: var(--c-surface);
            align-items: center; justify-content: center;
            cursor: pointer; color: var(--c-text2);
        }
        .mobile-menu {
            display: none; position: fixed;
            top: var(--nav-h); left: 0; right: 0;
            background: var(--c-bg); border-bottom: 1px solid var(--c-border);
            padding: 1rem clamp(1rem,5vw,4rem) 1.5rem;
            flex-direction: column; gap: 8px; z-index: 99;
        }
        .mobile-menu.open { display: flex; }
        .mobile-menu a, .mobile-menu button {
            width: 100%; text-align: center; padding: 10px;
        }

        /* ── HERO ── */
        .hero {
            min-height: 100vh;
            padding-top: var(--nav-h);
            display: flex; flex-direction: column;
            align-items: center; justify-content: center;
            padding-left: clamp(1rem,5vw,4rem);
            padding-right: clamp(1rem,5vw,4rem);
            position: relative; overflow: hidden;
            text-align: center;
        }
        .hero-bg-blob {
            position: absolute; border-radius: 50%;
            filter: blur(80px); opacity: 0.35; pointer-events: none;
        }
        html.dark .hero-bg-blob { opacity: 0.2; }
        .blob1 { width: 500px; height: 500px; background: #fdba74; top: -100px; right: -100px; }
        .blob2 { width: 400px; height: 400px; background: #c4b5fd; bottom: 50px; left: -100px; }
        .blob3 { width: 300px; height: 300px; background: #86efac; bottom: 100px; right: 200px; }
        .hero-badge {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 6px 14px; border-radius: 99px;
            background: var(--c-accent-bg);
            border: 1px solid #fed7aa;
            font-size: 0.8rem; font-weight: 600; color: var(--c-accent);
            margin-bottom: 1.5rem;
            animation: fadeUp 0.6s ease both;
        }
        html.dark .hero-badge { border-color: #7c2d12; }
        .hero-badge-dot { width: 6px; height: 6px; border-radius: 50%; background: var(--c-accent); }
        .hero-title {
            font-family: 'Sora', sans-serif;
            font-size: clamp(2.2rem, 5.5vw, 4rem);
            font-weight: 700; line-height: 1.15;
            color: var(--c-text);
            max-width: 720px;
            margin: 0 auto 1.25rem;
            animation: fadeUp 0.6s 0.1s ease both;
        }
        .hero-title .accent { color: var(--c-accent); }
        .hero-subtitle {
            font-size: clamp(1rem, 2vw, 1.15rem);
            color: var(--c-text2); max-width: 520px;
            margin: 0 auto 2.5rem; line-height: 1.7;
            animation: fadeUp 0.6s 0.2s ease both;
        }
        .hero-actions {
            display: flex; gap: 12px; justify-content: center; flex-wrap: wrap;
            animation: fadeUp 0.6s 0.3s ease both;
        }
        .btn-hero-primary {
            padding: 14px 32px; border-radius: 12px;
            font-size: 1rem; font-weight: 700;
            background: var(--c-accent); color: white;
            text-decoration: none; border: none; cursor: pointer;
            transition: all 0.2s; box-shadow: 0 4px 20px #f9731640;
        }
        .btn-hero-primary:hover { transform: translateY(-2px); box-shadow: 0 8px 28px #f9731660; }
        .btn-hero-secondary {
            padding: 14px 32px; border-radius: 12px;
            font-size: 1rem; font-weight: 600;
            background: var(--c-surface); color: var(--c-text);
            text-decoration: none; border: 1.5px solid var(--c-border);
            cursor: pointer; transition: all 0.2s;
        }
        .btn-hero-secondary:hover { border-color: var(--c-accent); color: var(--c-accent); transform: translateY(-2px); }
        .hero-image {
            margin-top: 4rem; width: 100%; max-width: 900px;
            border-radius: 20px; overflow: hidden;
            border: 1px solid var(--c-border);
            box-shadow: 0 24px 80px rgba(0,0,0,0.12);
            animation: fadeUp 0.8s 0.4s ease both;
            position: relative;
        }
        html.dark .hero-image { box-shadow: 0 24px 80px rgba(0,0,0,0.5); }
        .hero-image-inner {
            background: var(--c-surface);
            height: 420px;
            display: flex; align-items: center; justify-content: center;
            position: relative; overflow: hidden;
        }
        .hero-mockup {
            width: 100%; height: 100%;
            display: grid; grid-template-columns: 220px 1fr;
        }
        .mockup-sidebar {
            background: var(--c-bg);
            border-right: 1px solid var(--c-border);
            padding: 20px 14px;
            display: flex; flex-direction: column; gap: 6px;
        }
        .mockup-logo-row {
            display: flex; align-items: center; gap: 8px;
            padding: 8px; margin-bottom: 12px;
        }
        .mockup-logo-sq {
            width: 24px; height: 24px; border-radius: 6px;
            background: var(--c-accent);
        }
        .mockup-logo-txt {
            font-weight: 700; font-size: 12px; color: var(--c-text);
        }
        .mockup-nav-item {
            padding: 7px 10px; border-radius: 8px;
            font-size: 11px; color: var(--c-text2);
            display: flex; align-items: center; gap: 8px;
        }
        .mockup-nav-item.active {
            background: var(--c-accent-bg); color: var(--c-accent); font-weight: 600;
        }
        .mockup-nav-dot { width: 5px; height: 5px; border-radius: 50%; background: currentColor; }
        .mockup-content { padding: 20px; display: flex; flex-direction: column; gap: 14px; background: var(--c-bg2); }
        .mockup-title { font-size: 13px; font-weight: 700; color: var(--c-text); }
        .mockup-cards { display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; }
        .mockup-card {
            background: var(--c-surface); border: 1px solid var(--c-border);
            border-radius: 10px; padding: 12px;
        }
        .mockup-card-strip { height: 3px; border-radius: 2px; margin-bottom: 8px; }
        .mockup-card-name { font-size: 10px; font-weight: 600; color: var(--c-text); margin-bottom: 3px; }
        .mockup-card-meta { font-size: 9px; color: var(--c-text3); margin-bottom: 6px; }
        .mockup-bar { height: 2px; background: var(--c-border); border-radius: 1px; }
        .mockup-bar-fill { height: 100%; border-radius: 1px; }
        .mockup-bottom { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
        .mockup-panel {
            background: var(--c-surface); border: 1px solid var(--c-border);
            border-radius: 10px; padding: 12px;
        }
        .mockup-panel-title { font-size: 9px; font-weight: 700; color: var(--c-text3); text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px; }
        .mockup-row { display: flex; align-items: center; gap: 6px; padding: 4px 0; border-bottom: 1px solid var(--c-border); }
        .mockup-row:last-child { border-bottom: none; }
        .mockup-av { width: 18px; height: 18px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 7px; color: white; font-weight: 700; flex-shrink: 0; }
        .mockup-row-text { font-size: 9px; color: var(--c-text2); flex: 1; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .mockup-live { width: 5px; height: 5px; border-radius: 50%; background: #22c55e; flex-shrink: 0; }

        /* ── STATS ── */
        .stats {
            padding: 4rem clamp(1rem,5vw,4rem);
            background: var(--c-surface);
            border-top: 1px solid var(--c-border);
            border-bottom: 1px solid var(--c-border);
        }
        .stats-label { text-align: center; font-size: 0.8rem; font-weight: 700; color: var(--c-text3); text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 2.5rem; }
        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); gap: 2rem; max-width: 900px; margin: 0 auto; text-align: center; }
        .stat-num { font-family: 'Sora', sans-serif; font-size: clamp(1.8rem, 3vw, 2.5rem); font-weight: 700; color: var(--c-accent); margin-bottom: 6px; }
        .stat-desc { font-size: 0.875rem; color: var(--c-text2); font-weight: 500; }

        /* ── HOW IT WORKS ── */
        section { padding: 5rem clamp(1rem,5vw,4rem); }
        .section-tag {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 5px 14px; border-radius: 99px;
            font-size: 0.78rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.8px;
            margin-bottom: 1rem;
        }
        .tag-orange { background: var(--c-accent-bg); color: var(--c-accent); border: 1px solid #fed7aa; }
        .tag-purple { background: var(--c-purple-bg); color: var(--c-purple); border: 1px solid #ddd6fe; }
        html.dark .tag-orange { border-color: #7c2d12; }
        html.dark .tag-purple { border-color: #3730a3; }
        .section-title {
            font-family: 'Sora', sans-serif;
            font-size: clamp(1.6rem, 3vw, 2.2rem);
            font-weight: 700; line-height: 1.25;
            color: var(--c-text); margin-bottom: 1rem;
        }
        .section-sub { font-size: 1rem; color: var(--c-text2); max-width: 520px; line-height: 1.7; }
        .hiw-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1.5rem; margin-top: 3rem; }
        .hiw-card {
            background: var(--c-surface);
            border: 1px solid var(--c-border);
            border-radius: 16px; padding: 1.75rem;
            transition: all 0.25s; position: relative;
        }
        .hiw-card:hover { transform: translateY(-4px); border-color: var(--c-accent); box-shadow: 0 12px 40px rgba(249,115,22,0.12); }
        .hiw-num {
            width: 40px; height: 40px; border-radius: 12px;
            background: var(--c-accent-bg);
            display: flex; align-items: center; justify-content: center;
            font-family: 'Sora', sans-serif; font-size: 1rem; font-weight: 800;
            color: var(--c-accent); margin-bottom: 1.25rem;
            border: 1.5px solid #fed7aa;
        }
        html.dark .hiw-num { border-color: #7c2d12; }
        .hiw-title { font-size: 1rem; font-weight: 700; color: var(--c-text); margin-bottom: 8px; }
        .hiw-desc { font-size: 0.875rem; color: var(--c-text2); line-height: 1.6; }

        /* ── FEATURES ── */
        .features-inner { display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center; }
        @media (max-width: 768px) { .features-inner { grid-template-columns: 1fr; } }
        .features-visual {
            background: var(--c-surface);
            border: 1px solid var(--c-border);
            border-radius: 20px; overflow: hidden;
            aspect-ratio: 1 / 0.85;
            position: relative;
        }
        .features-visual-inner { padding: 1.5rem; height: 100%; display: flex; flex-direction: column; gap: 12px; }
        .feat-row { display: flex; align-items: center; gap: 12px; padding: 12px 14px; background: var(--c-bg); border-radius: 12px; border: 1px solid var(--c-border); }
        .feat-icon { width: 36px; height: 36px; border-radius: 10px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .feat-name { font-size: 0.875rem; font-weight: 600; color: var(--c-text); }
        .feat-sub { font-size: 0.75rem; color: var(--c-text3); }
        .feat-badge { margin-left: auto; padding: 3px 10px; border-radius: 99px; font-size: 0.7rem; font-weight: 700; }
        .badge-green { background: var(--c-green-bg); color: var(--c-green); }
        .badge-orange { background: var(--c-accent-bg); color: var(--c-accent); }
        .badge-purple { background: var(--c-purple-bg); color: var(--c-purple); }
        .features-list { display: flex; flex-direction: column; gap: 1.25rem; margin-top: 2rem; }
        .feature-item { display: flex; gap: 14px; align-items: flex-start; }
        .feature-check {
            width: 32px; height: 32px; border-radius: 10px;
            background: var(--c-green-bg); border: 1px solid #bbf7d0;
            display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 2px;
        }
        html.dark .feature-check { border-color: #14532d; }
        .feature-check svg { width: 14px; height: 14px; color: var(--c-green); }
        .feature-text { font-size: 0.9375rem; color: var(--c-text); font-weight: 500; }
        .feature-sub { font-size: 0.8125rem; color: var(--c-text2); margin-top: 2px; }

        /* ── SUPPORT / CTA ── */
        .support { background: var(--c-surface); border-top: 1px solid var(--c-border); border-bottom: 1px solid var(--c-border); }
        .support-inner { display: grid; grid-template-columns: 1fr 1.2fr; gap: 4rem; align-items: center; max-width: 1100px; margin: 0 auto; }
        @media (max-width: 900px) { .support-inner { grid-template-columns: 1fr; } }
        .support-visual { display: flex; flex-direction: column; gap: 14px; }
        .support-card {
            background: var(--c-bg); border: 1px solid var(--c-border);
            border-radius: 16px; padding: 1.25rem 1.5rem;
            display: flex; align-items: center; gap: 14px;
            transition: all 0.2s;
        }
        .support-card:hover { border-color: var(--c-accent); transform: translateX(6px); }
        .support-icon { width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .support-card-title { font-size: 0.9375rem; font-weight: 700; color: var(--c-text); margin-bottom: 2px; }
        .support-card-sub { font-size: 0.8125rem; color: var(--c-text2); }
        .form-grid { display: flex; flex-direction: column; gap: 12px; }
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
        @media (max-width: 500px) { .form-row { grid-template-columns: 1fr; } }
        .form-field label { display: block; font-size: 0.8rem; font-weight: 600; color: var(--c-text2); margin-bottom: 5px; }
        .form-field input, .form-field textarea, .form-field select {
            width: 100%; padding: 10px 14px;
            background: var(--c-bg); border: 1.5px solid var(--c-border);
            border-radius: 10px; font-size: 0.875rem; color: var(--c-text);
            font-family: 'Plus Jakarta Sans', sans-serif;
            transition: border-color 0.2s;
            outline: none;
        }
        .form-field input:focus, .form-field textarea:focus {
            border-color: var(--c-accent);
        }
        .form-field textarea { min-height: 100px; resize: vertical; }
        .btn-submit {
            width: 100%; padding: 13px; border-radius: 12px;
            font-size: 1rem; font-weight: 700;
            background: var(--c-accent); color: white;
            border: none; cursor: pointer;
            transition: all 0.2s; box-shadow: 0 4px 20px #f9731640;
        }
        .btn-submit:hover { background: var(--c-accent2); transform: translateY(-1px); }

        /* ── FOOTER ── */
        footer {
            padding: 3rem clamp(1rem,5vw,4rem) 2rem;
            display: flex; flex-wrap: wrap; gap: 1.5rem;
            align-items: center; justify-content: space-between;
            border-top: 1px solid var(--c-border);
        }
        .footer-logo { display: flex; align-items: center; gap: 10px; text-decoration: none; }
        .footer-logo-icon { width: 32px; height: 32px; border-radius: 9px; background: var(--c-accent); display: flex; align-items: center; justify-content: center; font-size: 14px; color: white; font-weight: 800; }
        .footer-logo-txt { font-family: 'Sora', sans-serif; font-weight: 700; font-size: 1rem; color: var(--c-text); }
        .footer-copy { font-size: 0.8125rem; color: var(--c-text3); }
        .footer-links { display: flex; gap: 20px; }
        .footer-links a { font-size: 0.8125rem; color: var(--c-text2); text-decoration: none; transition: color 0.2s; }
        .footer-links a:hover { color: var(--c-accent); }

        /* ── ANIMATIONS ── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .reveal { opacity: 0; transform: translateY(28px); transition: opacity 0.6s ease, transform 0.6s ease; }
        .reveal.visible { opacity: 1; transform: none; }

        /* ── RESPONSIVE ── */
        @media (max-width: 640px) {
            .nav-links .btn-ghost { display: none; }
            .menu-toggle { display: flex; }
            .desktop-auth { display: none; }
            .hero-image-inner { height: 260px; }
            .mockup-sidebar { display: none; }
            .mockup-cards { grid-template-columns: 1fr 1fr; }
        }
    </style>
</head>
<body>

{{-- ── NAV ── --}}
<nav>
    <a href="/" class="nav-logo">
        <div class="nav-logo-icon">Y</div>
        WithYou
    </a>
    <div class="nav-links desktop-auth">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="btn-ghost">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn-ghost">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn-primary">Get started</a>
                @endif
            @endauth
        @endif
    </div>
    <button class="theme-toggle" onclick="toggleTheme()" style="margin-left: auto;" aria-label="Toggle theme">
        <svg class="icon-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/>
            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/>
            <line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/>
            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/>
        </svg>
        <svg class="icon-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
        </svg>
    </button>
    <button class="menu-toggle" onclick="toggleMenu()" aria-label="Menu" style="margin-left: 8px;">
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
            <line x1="2" y1="5" x2="16" y2="5"/><line x1="2" y1="9" x2="16" y2="9"/><line x1="2" y1="13" x2="16" y2="13"/>
        </svg>
    </button>
</nav>

{{-- Mobile menu --}}
<div class="mobile-menu" id="mobileMenu">
    @if (Route::has('login'))
        @auth
            <a href="{{ url('/dashboard') }}" class="btn-ghost">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="btn-ghost">Log in</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn-primary">Get started free</a>
            @endif
        @endauth
    @endif
</div>

{{-- ── HERO ── --}}
<section class="hero" id="home">
    <div class="hero-bg-blob blob1"></div>
    <div class="hero-bg-blob blob2"></div>
    <div class="hero-bg-blob blob3"></div>

    <div class="hero-badge">
        <div class="hero-badge-dot"></div>
        The #1 platform for motivated learners
    </div>
    <h1 class="hero-title">
        Take your student experience<br>to the <span class="accent">next level</span>
    </h1>
    <p class="hero-subtitle">
        Courses, exercises, workspaces, live rooms and video calls — everything you need to learn, grow, and succeed, all in one place.
    </p>
    <div class="hero-actions">
        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="btn-hero-primary">Start for free →</a>
        @endif
        <a href="#how-it-works" class="btn-hero-secondary">How it works</a>
    </div>

    {{-- App preview mockup --}}
    <div class="hero-image">
        <div class="hero-image-inner">
            <div class="hero-mockup">
                <div class="mockup-sidebar">
                    <div class="mockup-logo-row">
                        <div class="mockup-logo-sq"></div>
                        <span class="mockup-logo-txt">WithYou</span>
                    </div>
                    <div class="mockup-nav-item active"><div class="mockup-nav-dot"></div> Courses</div>
                    <div class="mockup-nav-item"><div class="mockup-nav-dot"></div> Exercises</div>
                    <div class="mockup-nav-item"><div class="mockup-nav-dot"></div> Rooms</div>
                    <div class="mockup-nav-item"><div class="mockup-nav-dot"></div> Chat</div>
                    <div class="mockup-nav-item"><div class="mockup-nav-dot"></div> Video Call</div>
                </div>
                <div class="mockup-content">
                    <div class="mockup-title">My courses</div>
                    <div class="mockup-cards">
                        <div class="mockup-card">
                            <div class="mockup-card-strip" style="background:#f97316"></div>
                            <div class="mockup-card-name">Design Thinking</div>
                            <div class="mockup-card-meta">14 lessons</div>
                            <div class="mockup-bar"><div class="mockup-bar-fill" style="width:68%;background:#f97316"></div></div>
                        </div>
                        <div class="mockup-card">
                            <div class="mockup-card-strip" style="background:#7c3aed"></div>
                            <div class="mockup-card-name">Public Speaking</div>
                            <div class="mockup-card-meta">22 lessons</div>
                            <div class="mockup-bar"><div class="mockup-bar-fill" style="width:40%;background:#7c3aed"></div></div>
                        </div>
                        <div class="mockup-card">
                            <div class="mockup-card-strip" style="background:#16a34a"></div>
                            <div class="mockup-card-name">Data Analysis</div>
                            <div class="mockup-card-meta">10 lessons</div>
                            <div class="mockup-bar"><div class="mockup-bar-fill" style="width:90%;background:#16a34a"></div></div>
                        </div>
                    </div>
                    <div class="mockup-bottom">
                        <div class="mockup-panel">
                            <div class="mockup-panel-title">Active Rooms</div>
                            <div class="mockup-row"><div class="mockup-av" style="background:#f97316">YA</div><div class="mockup-row-text">Project standup</div><div class="mockup-live"></div></div>
                            <div class="mockup-row"><div class="mockup-av" style="background:#7c3aed">SR</div><div class="mockup-row-text">Fil rouge team</div><div class="mockup-live"></div></div>
                        </div>
                        <div class="mockup-panel">
                            <div class="mockup-panel-title">Messages</div>
                            <div class="mockup-row"><div class="mockup-av" style="background:#16a34a">KM</div><div class="mockup-row-text">great session today ✓</div></div>
                            <div class="mockup-row"><div class="mockup-av" style="background:#d97706">MB</div><div class="mockup-row-text">joining standup</div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ── STATS ── --}}
<div class="stats reveal">
    <div class="stats-label">Trusted by learners worldwide</div>
    <div class="stats-grid">
        <div class="stat">
            <div class="stat-num">15K+</div>
            <div class="stat-desc">Active students</div>
        </div>
        <div class="stat">
            <div class="stat-num">75%</div>
            <div class="stat-desc">Job placement rate</div>
        </div>
        <div class="stat">
            <div class="stat-num">35+</div>
            <div class="stat-desc">Expert courses</div>
        </div>
        <div class="stat">
            <div class="stat-num">25+</div>
            <div class="stat-desc">Live rooms daily</div>
        </div>
        <div class="stat">
            <div class="stat-num">15+</div>
            <div class="stat-desc">Partner companies</div>
        </div>
    </div>
</div>

{{-- ── HOW IT WORKS ── --}}
<section id="how-it-works" style="background: var(--c-bg); text-align: center;">
    <div class="section-tag tag-orange reveal" style="margin: 0 auto 1rem;">How it works</div>
    <h2 class="section-title reveal" style="max-width: 500px; margin: 0 auto 1rem;">Four steps to level up your skills</h2>
    <p class="section-sub reveal" style="margin: 0 auto;">From signup to getting hired — our structured path makes every step clear and achievable.</p>
    <div class="hiw-grid reveal">
        <div class="hiw-card">
            <div class="hiw-num">01</div>
            <div class="hiw-title">Sign Up</div>
            <div class="hiw-desc">Create your free account in seconds. No credit card needed, no friction — just pure learning from day one.</div>
        </div>
        <div class="hiw-card">
            <div class="hiw-num">02</div>
            <div class="hiw-title">Get access</div>
            <div class="hiw-desc">Browse curated courses, join workspaces, and pick the learning path that matches your goals and current level.</div>
        </div>
        <div class="hiw-card">
            <div class="hiw-num">03</div>
            <div class="hiw-title">Practice exercises</div>
            <div class="hiw-desc">Apply what you learn with real exercises and quizzes. Get instant feedback and track your progress step by step.</div>
        </div>
        <div class="hiw-card">
            <div class="hiw-num">04</div>
            <div class="hiw-title">Get results</div>
            <div class="hiw-desc">Land your first job or freelance gig. Our partner network connects top learners to real opportunities.</div>
        </div>
    </div>
</section>

{{-- ── FEATURES ── --}}
<section style="background: var(--c-surface); border-top: 1px solid var(--c-border);">
    <div class="features-inner" style="max-width: 1100px; margin: 0 auto;">
        <div>
            <div class="section-tag tag-purple reveal">Everything you need</div>
            <h2 class="section-title reveal">All your learning tools, in one place</h2>
            <p class="section-sub reveal">No more switching between apps. WithYou brings courses, exercises, collaboration rooms, and video calls under one roof.</p>
            <div class="features-list reveal">
                <div class="feature-item">
                    <div class="feature-check">
                        <svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="2 7 5.5 10.5 12 4"/></svg>
                    </div>
                    <div>
                        <div class="feature-text">Structured courses & lessons</div>
                        <div class="feature-sub">Built by industry experts, updated regularly</div>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-check">
                        <svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="2 7 5.5 10.5 12 4"/></svg>
                    </div>
                    <div>
                        <div class="feature-text">Live collaboration rooms</div>
                        <div class="feature-sub">Collaborate, discuss, and grow with peers in real time</div>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-check">
                        <svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="2 7 5.5 10.5 12 4"/></svg>
                    </div>
                    <div>
                        <div class="feature-text">Video calls & group sessions</div>
                        <div class="feature-sub">Meet mentors and teammates face-to-face</div>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-check">
                        <svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="2 7 5.5 10.5 12 4"/></svg>
                    </div>
                    <div>
                        <div class="feature-text">Exercises & instant feedback</div>
                        <div class="feature-sub">Practice on real challenges, see results immediately</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="features-visual reveal">
            <div class="features-visual-inner">
                <div class="feat-row">
                    <div class="feat-icon" style="background:#fff7ed">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"><rect x="2" y="2" width="14" height="14" rx="3" stroke="#f97316" stroke-width="1.8"/><path d="M6 9h6M9 6v6" stroke="#f97316" stroke-width="1.8" stroke-linecap="round"/></svg>
                    </div>
                    <div>
                        <div class="feat-name">Workspaces</div>
                        <div class="feat-sub">12 active projects</div>
                    </div>
                    <div class="feat-badge badge-orange">Active</div>
                </div>
                <div class="feat-row">
                    <div class="feat-icon" style="background:#f5f3ff">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M2 3h14a1 1 0 011 1v8a1 1 0 01-1 1H5l-3 4V4a1 1 0 011-1z" stroke="#7c3aed" stroke-width="1.8"/></svg>
                    </div>
                    <div>
                        <div class="feat-name">Chat</div>
                        <div class="feat-sub">9 new messages</div>
                    </div>
                    <div class="feat-badge badge-purple">9 new</div>
                </div>
                <div class="feat-row">
                    <div class="feat-icon" style="background:#f0fdf4">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"><rect x="1" y="5" width="11" height="8" rx="2" stroke="#16a34a" stroke-width="1.8"/><path d="M12 8l5-3v8l-5-3" stroke="#16a34a" stroke-width="1.8" stroke-linejoin="round"/></svg>
                    </div>
                    <div>
                        <div class="feat-name">Video calls</div>
                        <div class="feat-sub">3 rooms live now</div>
                    </div>
                    <div class="feat-badge badge-green">Live</div>
                </div>
                <div class="feat-row">
                    <div class="feat-icon" style="background:#fffbeb">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M2 14 L6 7 L10 10 L13.5 4" stroke="#d97706" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </div>
                    <div>
                        <div class="feat-name">Progress</div>
                        <div class="feat-sub">68% avg completion</div>
                    </div>
                    <div class="feat-badge" style="background:#fffbeb;color:#d97706">68%</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ── SUPPORT / CONTACT ── --}}
<section class="support" id="support">
    <div class="support-inner">
        <div>
            <div class="section-tag tag-orange reveal">Need support?</div>
            <h2 class="section-title reveal">We're here to help you succeed</h2>
            <p class="section-sub reveal" style="margin-bottom: 2rem;">Our team is available to answer your questions, solve technical problems, and guide your learning journey.</p>
            <div class="support-visual reveal">
                <div class="support-card">
                    <div class="support-icon" style="background:#fff7ed">
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none"><path d="M2 3h18a1 1 0 011 1v10a1 1 0 01-1 1H6l-4 5V4a1 1 0 011-1z" stroke="#f97316" stroke-width="1.8"/></svg>
                    </div>
                    <div>
                        <div class="support-card-title">Live Chat</div>
                        <div class="support-card-sub">Chat with our team in real time</div>
                    </div>
                </div>
                <div class="support-card">
                    <div class="support-icon" style="background:#f5f3ff">
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none"><circle cx="11" cy="11" r="9" stroke="#7c3aed" stroke-width="1.8"/><path d="M11 8v4l3 3" stroke="#7c3aed" stroke-width="1.8" stroke-linecap="round"/></svg>
                    </div>
                    <div>
                        <div class="support-card-title">Fast response</div>
                        <div class="support-card-sub">Average reply time under 2 hours</div>
                    </div>
                </div>
                <div class="support-card">
                    <div class="support-icon" style="background:#f0fdf4">
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" stroke="#16a34a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </div>
                    <div>
                        <div class="support-card-title">Knowledge base</div>
                        <div class="support-card-sub">Hundreds of guides and tutorials</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="reveal">
            <div style="background: var(--c-bg); border: 1px solid var(--c-border); border-radius: 20px; padding: 2rem;">
                <h3 style="font-family:'Sora',sans-serif; font-size: 1.15rem; font-weight: 700; margin-bottom: 1.5rem; color: var(--c-text);">Send us a message</h3>
                <div class="form-grid">
                    <div class="form-row">
                        <div class="form-field">
                            <label>First name</label>
                            <input type="text" placeholder="Youness">
                        </div>
                        <div class="form-field">
                            <label>Last name</label>
                            <input type="text" placeholder="Ait">
                        </div>
                    </div>
                    <div class="form-field">
                        <label>Email address</label>
                        <input type="email" placeholder="youness@example.com">
                    </div>
                    <div class="form-field">
                        <label>Subject</label>
                        <input type="text" placeholder="What do you need help with?">
                    </div>
                    <div class="form-field">
                        <label>Message</label>
                        <textarea placeholder="Tell us more about your issue or question..."></textarea>
                    </div>
                    <button class="btn-submit">Send message →</button>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ── FOOTER ── --}}
<footer>
    <a href="/" class="footer-logo">
        <div class="footer-logo-icon">Y</div>
        <span class="footer-logo-txt">WithYou</span>
    </a>
    <div class="footer-links">
        <a href="#how-it-works">How it works</a>
        <a href="#support">Support</a>
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        @endif
    </div>
    <div class="footer-copy">© {{ date('Y') }} WithYou. Built with ❤️ for every learner.</div>
</footer>

<script>
    function toggleTheme() {
        const html = document.documentElement;
        const isDark = html.classList.toggle('dark');
        localStorage.setItem('theme', isDark ? 'dark' : 'light');
    }
    function toggleMenu() {
        document.getElementById('mobileMenu').classList.toggle('open');
    }
    (function() {
        const saved = localStorage.getItem('theme');
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        if (saved === 'dark' || (!saved && prefersDark)) {
            document.documentElement.classList.add('dark');
        }
    })();
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
    }, { threshold: 0.1 });
    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
</script>

</body>
</html>
