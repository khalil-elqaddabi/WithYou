<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Teacher Panel' }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&family=sora:400,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
       :root {
    --c-bg: #f8fafc;
    --c-bg2: #ffffff;
    --c-surface: #ffffff;
    --c-border: #e2e8f0;

    --c-text: #0f172a;
    --c-text2: #475569;
    --c-text3: #94a3b8;

    /* 🔵 Primary (blue) */
    --c-accent: #2563eb;
    --c-accent2: #1d4ed8;
    --c-accent-bg: #eff6ff;

    /* 🟣 Secondary */
    --c-purple: #7c3aed;
    --c-purple-bg: #f5f3ff;

    /* 🟢 Success */
    --c-green: #16a34a;
    --c-green-bg: #f0fdf4;

    --nav-h: 72px;
    --sidebar-w: 270px;
}

        html.dark {
    --c-bg: #020617;
    --c-bg2: #0f172a;
    --c-surface: #111827;
    --c-border: #1e293b;

    --c-text: #f8fafc;
    --c-text2: #cbd5f5;
    --c-text3: #64748b;

    --c-accent: #3b82f6;
    --c-accent2: #2563eb;
    --c-accent-bg: #0b1220;

    --c-purple: #a78bfa;
    --c-purple-bg: #1e1a2e;

    --c-green: #4ade80;
    --c-green-bg: #0d1f12;
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
            overflow-x: hidden;
            transition: background .3s ease, color .3s ease;
        }

        .app-bg {
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
            opacity: .24;
        }

        html.dark .hero-bg-blob {
            opacity: .12;
        }

        .blob1 {
            width: 420px;
            height: 420px;
            background: #fdba74;
            top: -120px;
            right: -80px;
        }

        .blob2 {
            width: 320px;
            height: 320px;
            background: #c4b5fd;
            bottom: 80px;
            left: -80px;
        }

        .blob3 {
            width: 260px;
            height: 260px;
            background: #86efac;
            bottom: 120px;
            right: 220px;
        }

        .teacher-shell {
            min-height: 100vh;
            display: flex;
        }

        .teacher-sidebar {
            width: var(--sidebar-w);
            background: color-mix(in srgb, var(--c-surface) 92%, transparent);
            border-right: 1px solid var(--c-border);
            backdrop-filter: blur(12px);
            position: sticky;
            top: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            z-index: 20;
        }

        .brand {
            padding: 1.5rem;
            border-bottom: 1px solid var(--c-border);
        }

        .brand-link {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: var(--c-text);
        }

        .brand-logo {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--c-accent);
            color: white;
            font-weight: 800;
            font-size: 1rem;
            box-shadow: 0 8px 24px rgba(249,115,22,.18);
        }

        .brand-title {
            font-family: 'Sora', sans-serif;
            font-size: 1.05rem;
            font-weight: 700;
            line-height: 1.1;
            color: var(--c-text);
        }

        .brand-sub {
            font-size: .82rem;
            color: var(--c-text2);
            margin-top: 4px;
        }

        .sidebar-nav {
            flex: 1;
            padding: 1.25rem;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            border-radius: 14px;
            text-decoration: none;
            color: var(--c-text2);
            border: 1px solid transparent;
            transition: all .2s ease;
            font-size: .95rem;
            font-weight: 600;
        }

        .nav-item:hover {
            background: var(--c-surface);
            border-color: var(--c-border);
            color: var(--c-text);
            transform: translateX(2px);
        }

        .nav-item.active {
            background: var(--c-accent-bg);
            border-color: #fed7aa;
            color: var(--c-accent);
        }

        html.dark .nav-item.active {
            border-color: #7c2d12;
        }

        .nav-icon {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
        }

        .sidebar-footer {
            padding: 1.25rem;
            border-top: 1px solid var(--c-border);
        }

        .teacher-user {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
            border-radius: 16px;
            background: var(--c-surface);
            border: 1px solid var(--c-border);
            margin-bottom: 12px;
        }

        .teacher-avatar {
            width: 42px;
            height: 42px;
            border-radius: 9999px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--c-accent);
            color: white;
            font-weight: 800;
            flex-shrink: 0;
        }

        .teacher-name {
            font-size: .92rem;
            font-weight: 700;
            color: var(--c-text);
            line-height: 1.2;
        }

        .teacher-email {
            font-size: .78rem;
            color: var(--c-text2);
            margin-top: 2px;
            word-break: break-word;
        }

        .sidebar-actions {
            display: grid;
            gap: 8px;
        }

        .btn-soft, .btn-primary {
            display: block;
            width: 100%;
            text-align: center;
            text-decoration: none;
            padding: 11px 14px;
            border-radius: 12px;
            font-size: .9rem;
            font-weight: 700;
            transition: all .2s ease;
        }

        .btn-soft {
            background: var(--c-surface);
            color: var(--c-text2);
            border: 1px solid var(--c-border);
        }

        .btn-soft:hover {
            color: var(--c-text);
            border-color: var(--c-accent);
        }

        .btn-primary {
            background: var(--c-accent);
            color: white;
            border: none;
            cursor: pointer;
        }

        .btn-primary:hover {
            background: var(--c-accent2);
            transform: translateY(-1px);
        }

        .teacher-main {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
        }

        .teacher-topbar {
            position: sticky;
            top: 0;
            z-index: 15;
            height: var(--nav-h);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1.5rem;
            border-bottom: 1px solid var(--c-border);
            background: color-mix(in srgb, var(--c-bg) 88%, transparent);
            backdrop-filter: blur(12px);
        }

        .topbar-left h1 {
            margin: 0;
            font-family: 'Sora', sans-serif;
            font-size: 1.45rem;
            font-weight: 700;
            color: var(--c-text);
        }

        .topbar-left p {
            margin: 4px 0 0;
            font-size: .9rem;
            color: var(--c-text2);
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .theme-toggle {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            border: 1.5px solid var(--c-border);
            background: var(--c-surface);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: var(--c-text2);
            transition: all .2s ease;
        }

        .theme-toggle:hover {
            border-color: var(--c-accent);
            color: var(--c-accent);
        }

        .icon-sun, .icon-moon {
            width: 17px;
            height: 17px;
        }

        html.dark .icon-sun { display: block; }
        html.dark .icon-moon { display: none; }
        html:not(.dark) .icon-sun { display: none; }
        html:not(.dark) .icon-moon { display: block; }

        .teacher-content {
            padding: 1.5rem;
        }

        .teacher-content-inner {
            max-width: 1280px;
        }

        .mobile-bar {
            display: none;
        }

        @media (max-width: 768px) {
            .teacher-sidebar {
                display: none;
            }

            .mobile-bar {
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .teacher-topbar {
                padding: 0 1rem;
            }

            .topbar-left h1 {
                font-size: 1.15rem;
            }

            .topbar-left p {
                font-size: .8rem;
            }

            .teacher-content {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="app-bg">
        <div class="hero-bg-blob blob1"></div>
        <div class="hero-bg-blob blob2"></div>
        <div class="hero-bg-blob blob3"></div>
    </div>

    <div class="teacher-shell">
        {{-- SIDEBAR --}}
        <aside class="teacher-sidebar">
            <div class="brand">
                <a href="{{ route('teacher.dashboard') }}" class="brand-link">
                    <div class="brand-logo">Y</div>
                    <div>
                        <div class="brand-title">WithYou</div>
                        <div class="brand-sub">Teacher Panel</div>
                    </div>
                </a>
            </div>

            <nav class="sidebar-nav">
                <a href="{{ route('teacher.dashboard') }}"
                   class="nav-item {{ request()->routeIs('teacher.dashboard') ? 'active' : '' }}">
                    <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 9.5L12 3l9 6.5V20a1 1 0 0 1-1 1h-5v-7H9v7H4a1 1 0 0 1-1-1V9.5Z" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Dashboard
                </a>

                <a href="{{ route('teacher.workspaces.index') }}"
                   class="nav-item {{ request()->routeIs('teacher.workspaces.index') ? 'active' : '' }}">
                    <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="4" width="18" height="14" rx="2"/>
                        <path d="M8 20h8" stroke-linecap="round"/>
                    </svg>
                    Workspaces
                </a>

                <a href="{{ route('teacher.workspaces.create') }}"
                   class="nav-item {{ request()->routeIs('teacher.workspaces.create') ? 'active' : '' }}">
                    <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 5v14M5 12h14" stroke-linecap="round"/>
                    </svg>
                    Create Workspace
                </a>
            </nav>

            <div class="sidebar-footer">
                <div class="teacher-user">
                    <div class="teacher-avatar">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <div>
                        <div class="teacher-name">{{ auth()->user()->name }}</div>
                        <div class="teacher-email">{{ auth()->user()->email }}</div>
                    </div>
                </div>

                <div class="sidebar-actions">
                    <a href="{{ route('profile.edit') }}" class="btn-soft">Profile</a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </aside>

        {{-- MAIN --}}
        <div class="teacher-main">
            <header class="teacher-topbar">
                <div class="topbar-left">
                    <div class="mobile-bar">
                        <div class="brand-logo" style="width:36px;height:36px;border-radius:10px;">Y</div>
                        <div>
                            <div class="brand-title" style="font-size: .95rem;">WithYou</div>
                            <div class="brand-sub">Teacher</div>
                        </div>
                    </div>

                    <h1>{{ $header ?? 'Teacher Space' }}</h1>

                    @isset($subheader)
                        <p>{{ $subheader }}</p>
                    @endisset
                </div>

                <div class="topbar-right">
                    <button class="theme-toggle" onclick="toggleTheme()" aria-label="Toggle theme">
                        <svg class="icon-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="5"/>
                            <line x1="12" y1="1" x2="12" y2="3"/>
                            <line x1="12" y1="21" x2="12" y2="23"/>
                            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/>
                            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/>
                            <line x1="1" y1="12" x2="3" y2="12"/>
                            <line x1="21" y1="12" x2="23" y2="12"/>
                            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/>
                            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/>
                        </svg>
                        <svg class="icon-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
                        </svg>
                    </button>
                </div>
            </header>

            <main class="teacher-content">
                <div class="teacher-content-inner">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    <script>
        function toggleTheme() {
            const html = document.documentElement;
            const isDark = html.classList.toggle('dark');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
        }

        (function () {
            const saved = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

            if (saved === 'dark' || (!saved && prefersDark)) {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>
</body>
</html>
