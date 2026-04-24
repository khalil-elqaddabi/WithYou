<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'WithYou') }}</title>

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
                --c-text2: #64748b;
                --c-text3: #94a3b8;

                --c-accent: #2563eb;
                --c-accent2: #7c3aed;
                --c-accent-bg: rgba(37, 99, 235, 0.10);

                --c-purple: #7c3aed;
                --c-purple-bg: rgba(124, 58, 237, 0.10);

                --c-green: #22c55e;
                --c-green-bg: rgba(34, 197, 94, 0.10);

                --c-amber: #0891b2;
                --c-amber-bg: rgba(8, 145, 178, 0.10);

                --nav-h: 72px;
            }

            html.dark {
                --c-bg: #020617;
                --c-bg2: #0f172a;
                --c-surface: #111827;
                --c-border: #1e293b;
                --c-text: #f8fafc;
                --c-text2: #cbd5e1;
                --c-text3: #64748b;

                --c-accent: #60a5fa;
                --c-accent2: #a78bfa;
                --c-accent-bg: rgba(37, 99, 235, 0.16);

                --c-purple: #a78bfa;
                --c-purple-bg: rgba(124, 58, 237, 0.16);

                --c-green: #4ade80;
                --c-green-bg: rgba(34, 197, 94, 0.14);

                --c-amber: #22d3ee;
                --c-amber-bg: rgba(8, 145, 178, 0.16);
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

            .app-background {
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
                opacity: 0.28;
            }

            html.dark .hero-bg-blob {
                opacity: 0.18;
            }

            .blob1 {
                width: 420px;
                height: 420px;
                background: #60a5fa;
                top: -120px;
                right: -80px;
            }

            .blob2 {
                width: 360px;
                height: 360px;
                background: #a78bfa;
                bottom: 40px;
                left: -80px;
            }

            .blob3 {
                width: 260px;
                height: 260px;
                background: #22d3ee;
                bottom: 120px;
                right: 180px;
            }
        </style>
    </head>
    <body>
        <div class="app-background">
            <div class="hero-bg-blob blob1"></div>
            <div class="hero-bg-blob blob2"></div>
            <div class="hero-bg-blob blob3"></div>
        </div>

        <div class="min-h-screen">
            @include('layouts.navigation')

            @isset($header)
                <header class="border-b" style="background: var(--c-bg2); border-color: var(--c-border);">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <h2 class="font-semibold text-xl leading-tight" style="color: var(--c-text);">
                            {{ $header }}
                        </h2>
                    </div>
                </header>
            @endisset

            <main>
                {{ $slot }}
            </main>
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
