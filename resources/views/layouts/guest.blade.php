<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'WithYou') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&family=sora:400,600,700,800" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

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

        .top-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 14px;
            border-radius: 12px;
            color: var(--muted);
            font-size: .92rem;
            font-weight: 600;
            border: 1px solid var(--border);
            background: var(--surface);
            transition: .2s ease;
        }

        .back-link:hover {
            color: var(--text);
            border-color: #93c5fd;
            transform: translateY(-1px);
        }

        .theme-toggle {
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

        .theme-toggle:hover {
            color: var(--text);
            border-color: #93c5fd;
        }

        .auth-shell {
            min-height: 100vh;
            padding-top: calc(var(--nav-h) + 34px);
            padding-bottom: 34px;
            position: relative;
        }

        .page-orb {
            position: fixed;
            border-radius: 999px;
            pointer-events: none;
            z-index: 0;
        }

        .page-orb.one {
            width: 240px;
            height: 240px;
            top: 40px;
            right: -40px;
            background: var(--violet-soft);
            filter: blur(8px);
        }

        .page-orb.two {
            width: 180px;
            height: 180px;
            bottom: 80px;
            left: -40px;
            background: var(--blue-soft);
            filter: blur(8px);
        }

        .auth-grid {
            position: relative;
            z-index: 2;
            min-height: calc(100vh - var(--nav-h) - 68px);
            display: grid;
            grid-template-columns: 1.05fr .95fr;
            gap: 28px;
            align-items: stretch;
        }

        .auth-side,
        .auth-card-wrap {
            border: 1px solid var(--border);
            border-radius: 30px;
            background: linear-gradient(145deg, var(--surface), var(--surface-2));
            box-shadow: var(--shadow-md);
            overflow: hidden;
        }

        .auth-side {
            position: relative;
            padding: 34px;
        }

        .side-orb {
            position: absolute;
            border-radius: 999px;
            pointer-events: none;
        }

        .side-orb.one {
            width: 220px;
            height: 220px;
            top: -60px;
            right: -40px;
            background: var(--violet-soft);
        }

        .side-orb.two {
            width: 170px;
            height: 170px;
            bottom: -50px;
            left: -30px;
            background: var(--blue-soft);
        }

        .side-content {
            position: relative;
            z-index: 2;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 24px;
        }

        .side-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            width: fit-content;
            border-radius: 999px;
            padding: 9px 15px;
            font-size: .78rem;
            font-weight: 800;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: #93c5fd;
            background: rgba(37,99,235,.14);
            border: 1px solid rgba(59,130,246,.25);
            margin-bottom: 18px;
        }

        .side-badge-dot {
            width: 8px;
            height: 8px;
            border-radius: 999px;
            background: var(--blue);
        }

        .side-title {
            font-family: 'Sora', sans-serif;
            font-size: clamp(2rem, 4vw, 3.2rem);
            line-height: 1.08;
            font-weight: 800;
            letter-spacing: -0.03em;
            margin-bottom: 16px;
            max-width: 560px;
        }

        .side-title .accent {
            background: linear-gradient(135deg, var(--blue), var(--violet));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            color: transparent;
        }

        .side-subtitle {
            max-width: 560px;
            color: var(--muted);
            line-height: 1.9;
            font-size: 1rem;
        }

        .side-points {
            display: grid;
            gap: 12px;
        }

        .side-point {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: .96rem;
            font-weight: 600;
        }

        .side-point-icon {
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

        .mini-preview {
            border: 1px solid var(--border);
            border-radius: 24px;
            overflow: hidden;
            background: var(--surface);
            box-shadow: var(--shadow-sm);
        }

        .mini-preview-top {
            padding: 14px 18px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 8px;
            background: var(--surface);
        }

        .mini-dot {
            width: 10px;
            height: 10px;
            border-radius: 999px;
            background: var(--muted-2);
            opacity: .6;
        }

        .mini-preview-body {
            padding: 18px;
            display: grid;
            gap: 12px;
            background: var(--surface-2);
        }

        .mini-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }

        .mini-stat {
            border: 1px solid var(--border);
            background: var(--surface);
            border-radius: 18px;
            padding: 14px;
        }

        .mini-stat-label {
            font-size: .72rem;
            color: var(--muted-2);
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .08em;
            margin-bottom: 8px;
        }

        .mini-stat-num {
            font-size: 1.4rem;
            font-weight: 800;
            line-height: 1;
        }

        .mini-stat-num.blue { color: #60a5fa; }
        .mini-stat-num.violet { color: #a78bfa; }
        .mini-stat-num.cyan { color: #22d3ee; }

        .mini-workspaces {
            display: grid;
            gap: 10px;
        }

        .mini-workspace {
            border: 1px solid var(--border);
            background: var(--surface);
            border-radius: 18px;
            padding: 14px;
        }

        .mini-workspace-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 8px;
        }

        .mini-workspace-name {
            font-size: .92rem;
            font-weight: 800;
        }

        .mini-workspace-badge {
            font-size: .72rem;
            font-weight: 800;
            color: #c4b5fd;
            background: var(--violet-soft);
            border-radius: 999px;
            padding: 6px 10px;
        }

        .mini-workspace-sub {
            color: var(--muted);
            font-size: .82rem;
            line-height: 1.6;
        }

        .auth-card-wrap {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 28px;
        }

        .auth-card-inner {
            width: 100%;
            max-width: 480px;
        }

        @media (max-width: 1100px) {
            .auth-grid {
                grid-template-columns: 1fr;
            }

            .side-title {
                max-width: none;
            }

            .side-subtitle {
                max-width: none;
            }
        }

        @media (max-width: 768px) {
            .container {
                width: calc(100% - 24px);
            }

            .auth-shell {
                padding-top: calc(var(--nav-h) + 22px);
                padding-bottom: 22px;
            }

            .auth-grid {
                min-height: auto;
                gap: 18px;
            }

            .auth-side,
            .auth-card-wrap {
                border-radius: 24px;
            }

            .auth-side,
            .auth-card-wrap {
                padding: 22px;
            }

            .mini-stats {
                grid-template-columns: 1fr;
            }

            .back-link span {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="page-orb one"></div>
    <div class="page-orb two"></div>

    <nav>
        <div class="container nav-inner">
            <a href="{{ url('/') }}" class="brand">
                <div class="brand-mark">W</div>
                <span>WithYou</span>
            </a>

            <div class="top-actions">
                <a href="{{ url('/') }}" class="back-link">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M12.5 4.5L7 10l5.5 5.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>Back home</span>
                </a>

                <button class="theme-toggle" onclick="toggleTheme()" aria-label="Toggle theme">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <div class="auth-shell">
        <div class="container">
            <div class="auth-grid">
                <section class="auth-side">
                    <div class="side-orb one"></div>
                    <div class="side-orb two"></div>

                    <div class="side-content">
                        <div>
                            <div class="side-badge">
                                <span class="side-badge-dot"></span>
                                Welcome back
                            </div>

                            <h1 class="side-title">
                                Continue your journey with <span class="accent">WithYou</span>
                            </h1>

                            <p class="side-subtitle">
                                Sign in to access your dashboard, open your workspaces, continue your lessons,
                                and stay connected with your learning community.
                            </p>
                        </div>

                        <div class="side-points">
                            <div class="side-point">
                                <div class="side-point-icon">
                                    <svg width="18" height="18" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.8" style="color:#60a5fa;">
                                        <rect x="2" y="2" width="7" height="7" rx="2"></rect>
                                        <rect x="11" y="2" width="7" height="7" rx="2"></rect>
                                        <rect x="2" y="11" width="7" height="7" rx="2"></rect>
                                        <rect x="11" y="11" width="7" height="7" rx="2"></rect>
                                    </svg>
                                </div>
                                Access all your workspaces instantly
                            </div>

                            <div class="side-point">
                                <div class="side-point-icon">
                                    <svg width="18" height="18" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.8" style="color:#a78bfa;">
                                        <path d="M3 5h14M3 9h10M3 13h12" stroke-linecap="round"></path>
                                    </svg>
                                </div>
                                Continue lessons and exercises in one place
                            </div>

                            <div class="side-point">
                                <div class="side-point-icon">
                                    <svg width="18" height="18" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.8" style="color:#22d3ee;">
                                        <rect x="1.5" y="5" width="11" height="8" rx="2"></rect>
                                        <path d="M12.5 8l5-3v8l-5-3" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                                Join live rooms and collaborative sessions
                            </div>
                        </div>

                        <div class="mini-preview">
                            <div class="mini-preview-top">
                                <span class="mini-dot"></span>
                                <span class="mini-dot"></span>
                                <span class="mini-dot"></span>
                            </div>

                            <div class="mini-preview-body">
                                <div class="mini-stats">
                                    <div class="mini-stat">
                                        <div class="mini-stat-label">Workspaces</div>
                                        <div class="mini-stat-num blue">08</div>
                                    </div>
                                    <div class="mini-stat">
                                        <div class="mini-stat-label">Lessons</div>
                                        <div class="mini-stat-num violet">24</div>
                                    </div>
                                    <div class="mini-stat">
                                        <div class="mini-stat-label">Exercises</div>
                                        <div class="mini-stat-num cyan">13</div>
                                    </div>
                                </div>

                                <div class="mini-workspaces">
                                    <div class="mini-workspace">
                                        <div class="mini-workspace-top">
                                            <div class="mini-workspace-name">Web Development</div>
                                            <div class="mini-workspace-badge">Active</div>
                                        </div>
                                        <div class="mini-workspace-sub">Frontend fundamentals and Laravel basics.</div>
                                    </div>

                                    <div class="mini-workspace">
                                        <div class="mini-workspace-top">
                                            <div class="mini-workspace-name">UI Design</div>
                                            <div class="mini-workspace-badge">Live</div>
                                        </div>
                                        <div class="mini-workspace-sub">Layouts, spacing, cards, and clean design systems.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="auth-card-wrap">
                    <div class="auth-card-inner">
                        {{ $slot }}
                    </div>
                </section>
            </div>
        </div>
    </div>

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

        (function () {
            const html = document.documentElement;
            const savedTheme = localStorage.getItem('theme');
            const prefersLight = window.matchMedia('(prefers-color-scheme: light)').matches;

            if (savedTheme === 'light' || (!savedTheme && prefersLight)) {
                html.classList.add('light');
            }
        })();
    </script>
</body>
</html>
