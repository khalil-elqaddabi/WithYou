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
                --nav-h: 72px;
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
                opacity: 0.14;
            }

            .blob1 {
                width: 420px;
                height: 420px;
                background: #fdba74;
                top: -120px;
                right: -80px;
            }

            .blob2 {
                width: 360px;
                height: 360px;
                background: #c4b5fd;
                bottom: 40px;
                left: -80px;
            }

            .blob3 {
                width: 260px;
                height: 260px;
                background: #86efac;
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
