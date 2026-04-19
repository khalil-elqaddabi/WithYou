<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'WithYou') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&family=sora:400,600,700"
        rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

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

        * {
            box-sizing: border-box;
        }

        html {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            margin: 0;
            background: var(--c-bg);
            color: var(--c-text);
            transition: background 0.3s ease, color 0.3s ease;
            overflow-x: hidden;
        }

        .auth-nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 50;
            height: var(--nav-h);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 clamp(1rem, 5vw, 4rem);
            background: color-mix(in srgb, var(--c-bg) 88%, transparent);
            border-bottom: 1px solid var(--c-border);
            backdrop-filter: blur(12px);
        }

        .nav-logo {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: var(--c-text);
            font-family: 'Sora', sans-serif;
            font-weight: 700;
            font-size: 1.1rem;
        }

        .nav-logo-icon {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--c-accent);
            color: white;
            font-weight: 800;
            font-size: 15px;
        }

        .theme-toggle {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            border: 1.5px solid var(--c-border);
            background: var(--c-surface);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--c-text2);
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .theme-toggle:hover {
            border-color: var(--c-accent);
            color: var(--c-accent);
            transform: translateY(-1px);
        }

        .icon-sun,
        .icon-moon {
            width: 17px;
            height: 17px;
        }

        html.dark .icon-sun {
            display: block;
        }

        html.dark .icon-moon {
            display: none;
        }

        html:not(.dark) .icon-sun {
            display: none;
        }

        html:not(.dark) .icon-moon {
            display: block;
        }

        .auth-shell {
            min-height: 100vh;
            padding-top: var(--nav-h);
            position: relative;
        }

        .auth-background {
            position: fixed;
            inset: 0;
            overflow: hidden;
            pointer-events: none;
            z-index: -1;
        }

        .hero-bg-blob {
            position: absolute;
            border-radius: 9999px;
            filter: blur(90px);
            opacity: 0.35;
        }

        html.dark .hero-bg-blob {
            opacity: 0.18;
        }

        .blob1 {
            width: 500px;
            height: 500px;
            background: #fdba74;
            top: -100px;
            right: -100px;
        }

        .blob2 {
            width: 400px;
            height: 400px;
            background: #c4b5fd;
            bottom: 50px;
            left: -100px;
        }

        .blob3 {
            width: 300px;
            height: 300px;
            background: #86efac;
            bottom: 100px;
            right: 200px;
        }

        .auth-content {
            min-height: calc(100vh - var(--nav-h));
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }

        .auth-container {
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
        }

        .group:hover {
            transform: translateY(-6px);
            border-color: var(--c-accent) !important;
            box-shadow: 0 20px 40px rgba(249, 115, 22, 0.15);
        }

        .group:hover h3 {
            color: var(--c-accent);
        }

        @media (max-width: 640px) {
            .auth-content {
                padding: 1.25rem 1rem 2rem;
            }
        }
    </style>
</head>

<body>
    <div class="auth-background">
        <div class="hero-bg-blob blob1"></div>
        <div class="hero-bg-blob blob2"></div>
        <div class="hero-bg-blob blob3"></div>
    </div>

    <nav class="auth-nav">
        <a href="{{ url('/') }}" class="nav-logo">
            <div class="nav-logo-icon">Y</div>
            <span>WithYou</span>
        </a>

        <button class="theme-toggle" onclick="toggleTheme()" aria-label="Toggle theme">
            <svg class="icon-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="5" />
                <line x1="12" y1="1" x2="12" y2="3" />
                <line x1="12" y1="21" x2="12" y2="23" />
                <line x1="4.22" y1="4.22" x2="5.64" y2="5.64" />
                <line x1="18.36" y1="18.36" x2="19.78" y2="19.78" />
                <line x1="1" y1="12" x2="3" y2="12" />
                <line x1="21" y1="12" x2="23" y2="12" />
                <line x1="4.22" y1="19.78" x2="5.64" y2="18.36" />
                <line x1="18.36" y1="5.64" x2="19.78" y2="4.22" />
            </svg>

            <svg class="icon-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z" />
            </svg>
        </button>
    </nav>

    <div class="auth-shell">
        <main class="auth-content">
            <div class="auth-container">
                {{ $slot }}
            </div>
        </main>
    </div>

    <script>
        function toggleTheme() {
            const html = document.documentElement;
            const isDark = html.classList.toggle('dark');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
        }

        (function() {
            const saved = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

            if (saved === 'dark' || (!saved && prefersDark)) {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>
</body>

</html>
