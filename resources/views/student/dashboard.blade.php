<x-app-layout>
    <style>
        .dash-page {
            min-height: 100vh;
            padding: 24px 16px;
            background: var(--c-bg);
            color: var(--c-text);
        }

        .dash-container {
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
        }

        .dash-hero {
            position: relative;
            overflow: hidden;
            margin-bottom: 24px;
            padding: 24px;
            border-radius: 26px;
            border: 1px solid var(--c-border);
            background: linear-gradient(to bottom right, var(--c-bg2), var(--c-bg));
            box-shadow: 0 16px 40px rgba(15, 23, 42, 0.06);
        }

        html.dark .dash-hero {
            box-shadow: 0 18px 45px rgba(0, 0, 0, 0.22);
        }

        .dash-hero-blob-1,
        .dash-hero-blob-2 {
            position: absolute;
            border-radius: 999px;
            pointer-events: none;
        }

        .dash-hero-blob-1 {
            top: -64px;
            right: -64px;
            width: 224px;
            height: 224px;
            background: rgba(37, 99, 235, 0.10);
        }

        .dash-hero-blob-2 {
            left: -40px;
            bottom: -40px;
            width: 160px;
            height: 160px;
            background: rgba(124, 58, 237, 0.10);
        }

        .dash-hero-content {
            position: relative;
            z-index: 2;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        .dash-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 16px;
            padding: 6px 12px;
            border-radius: 999px;
            border: 1px solid rgba(37, 99, 235, 0.25);
            background: rgba(37, 99, 235, 0.08);
            color: #2563eb;
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.16em;
        }

        html.dark .dash-badge {
            color: #93c5fd;
            background: rgba(37, 99, 235, 0.18);
            border-color: rgba(37, 99, 235, 0.24);
        }

        .dash-badge-dot {
            width: 6px;
            height: 6px;
            border-radius: 999px;
            background: #3b82f6;
        }

        .dash-title {
            margin: 0 0 8px;
            font-size: 36px;
            line-height: 1.15;
            font-weight: 700;
            color: var(--c-text);
        }

        .dash-subtitle {
            max-width: 700px;
            margin: 0;
            font-size: 15px;
            line-height: 1.9;
            color: var(--c-text2);
        }

        .dash-hero-side {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .dash-hero-meta {
            text-align: right;
        }

        .dash-hero-meta p {
            margin: 0;
        }

        .dash-hero-meta .meta-top {
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.16em;
            color: var(--c-text3);
        }

        .dash-hero-meta .meta-title {
            margin-top: 4px;
            font-size: 14px;
            font-weight: 700;
            color: var(--c-text);
        }

        .dash-hero-meta .meta-sub {
            margin-top: 4px;
            font-size: 12px;
            color: var(--c-text2);
        }

        .dash-avatar {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 80px;
            height: 80px;
            border-radius: 20px;
            background: linear-gradient(to bottom right, #2563eb, #7c3aed);
            color: white;
            font-size: 28px;
            font-weight: 800;
            box-shadow: 0 12px 30px rgba(37, 99, 235, 0.28);
        }

        .dash-avatar-status {
            position: absolute;
            right: 4px;
            bottom: 4px;
            width: 14px;
            height: 14px;
            border-radius: 999px;
            background: #22c55e;
            border: 2px solid white;
        }

        html.dark .dash-avatar-status {
            border-color: #0f172a;
        }

        .dash-stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 24px;
        }

        .dash-stat-card {
            display: flex;
            align-items: center;
            gap: 16px;
            min-height: 108px;
            padding: 20px;
            border-radius: 24px;
            border: 1px solid var(--c-border);
            background: linear-gradient(to bottom, var(--c-bg2), var(--c-bg));
            box-shadow: 0 10px 28px rgba(15, 23, 42, 0.05);
            transition: 0.2s ease;
        }

        .dash-stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 18px 38px rgba(15, 23, 42, 0.09);
        }

        .dash-stat-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 56px;
            height: 56px;
            flex-shrink: 0;
            border-radius: 18px;
            border: 1px solid var(--c-border);
        }

        .dash-stat-icon.blue {
            background: rgba(37, 99, 235, 0.08);
            color: #2563eb;
        }

        .dash-stat-icon.violet {
            background: rgba(124, 58, 237, 0.08);
            color: #7c3aed;
        }

        .dash-stat-icon.cyan {
            background: rgba(8, 145, 178, 0.08);
            color: #0891b2;
        }

        html.dark .dash-stat-icon.blue {
            background: rgba(37, 99, 235, 0.18);
            color: #93c5fd;
        }

        html.dark .dash-stat-icon.violet {
            background: rgba(124, 58, 237, 0.18);
            color: #c4b5fd;
        }

        html.dark .dash-stat-icon.cyan {
            background: rgba(8, 145, 178, 0.18);
            color: #67e8f9;
        }

        .dash-stat-label {
            margin-bottom: 6px;
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.16em;
            color: var(--c-text3);
        }

        .dash-stat-value {
            font-size: 40px;
            line-height: 1;
            font-weight: 700;
        }

        .dash-stat-value.blue { color: #2563eb; }
        .dash-stat-value.violet { color: #7c3aed; }
        .dash-stat-value.cyan { color: #0891b2; }

        html.dark .dash-stat-value.blue { color: #60a5fa; }
        html.dark .dash-stat-value.violet { color: #a78bfa; }
        html.dark .dash-stat-value.cyan { color: #22d3ee; }

        .dash-section {
            margin-bottom: 24px;
            padding: 24px;
            border-radius: 24px;
            border: 1px solid var(--c-border);
            background: linear-gradient(to bottom, var(--c-bg2), var(--c-bg));
            box-shadow: 0 14px 34px rgba(15, 23, 42, 0.05);
        }

        .dash-section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 20px;
            padding-bottom: 16px;
            border-bottom: 1px solid var(--c-border);
        }

        .dash-section-title-wrap {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .dash-section-dot {
            width: 10px;
            height: 10px;
            border-radius: 999px;
        }

        .dash-section-dot.blue { background: #2563eb; }
        .dash-section-dot.violet { background: #7c3aed; }

        .dash-section-title {
            margin: 0;
            font-size: 20px;
            font-weight: 800;
            color: var(--c-text);
        }

        .dash-section-count {
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.16em;
            color: var(--c-text3);
        }

        .workspace-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
        }

        .workspace-card {
            overflow: hidden;
            border-radius: 20px;
            border: 1px solid var(--c-border);
            background: var(--c-bg2);
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.05);
            transition: 0.2s ease;
        }

        .workspace-card:hover {
            transform: translateY(-6px);
            border-color: #3b82f6;
            box-shadow: 0 22px 42px rgba(15, 23, 42, 0.12);
        }

        .workspace-banner {
            position: relative;
            display: flex;
            align-items: end;
            min-height: 110px;
            padding: 16px 20px;
            color: white;
            font-size: 30px;
            font-weight: 700;
            letter-spacing: 0.08em;
        }

        .workspace-banner.blue { background: linear-gradient(to bottom right, #2563eb, #1d4ed8); }
        .workspace-banner.green { background: linear-gradient(to bottom right, #16a34a, #15803d); }
        .workspace-banner.rose { background: linear-gradient(to bottom right, #e11d48, #be123c); }
        .workspace-banner.amber { background: linear-gradient(to bottom right, #f59e0b, #d97706); }
        .workspace-banner.violet { background: linear-gradient(to bottom right, #7c3aed, #6d28d9); }
        .workspace-banner.cyan { background: linear-gradient(to bottom right, #0891b2, #0e7490); }

        .workspace-banner::before {
            content: "";
            position: absolute;
            top: -24px;
            right: -24px;
            width: 112px;
            height: 112px;
            border-radius: 999px;
            background: rgba(255,255,255,0.10);
        }

        .workspace-banner::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(255,255,255,0.05), rgba(0,0,0,0.10));
        }

        .workspace-banner-text {
            position: relative;
            z-index: 2;
        }

        .workspace-teacher-avatar {
            position: absolute;
            right: 16px;
            bottom: -18px;
            z-index: 4;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 44px;
            height: 44px;
            border-radius: 999px;
            background: white;
            color: #475569;
            font-size: 12px;
            font-weight: 800;
            border: 3px solid white;
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.12);
        }

        html.dark .workspace-teacher-avatar {
            background: #0f172a;
            color: #cbd5e1;
            border-color: #0f172a;
        }

        .workspace-body {
            display: flex;
            flex-direction: column;
            gap: 8px;
            padding: 28px 20px 16px;
        }

        .workspace-name {
            font-size: 16px;
            font-weight: 800;
            color: var(--c-text);
        }

        .workspace-subject {
            font-size: 14px;
            color: var(--c-text3);
        }

        .workspace-teacher {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            width: fit-content;
            margin-top: 4px;
            padding: 8px 12px;
            border-radius: 999px;
            border: 1px solid var(--c-border);
            background: var(--c-bg);
            font-size: 12px;
            font-weight: 700;
            color: var(--c-text2);
        }

        .workspace-teacher-dot {
            width: 8px;
            height: 8px;
            border-radius: 999px;
            background: #22c55e;
        }

        .workspace-footer {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 16px 20px;
            border-top: 1px solid var(--c-border);
        }

        .workspace-link,
        .workspace-leave {
            font-size: 14px;
            font-weight: 800;
            text-decoration: none;
            border: none;
            background: transparent;
            cursor: pointer;
            padding: 0;
        }

        .workspace-link {
            color: #2563eb;
        }

        .workspace-leave {
            color: #e11d48;
        }

        html.dark .workspace-link { color: #60a5fa; }
        html.dark .workspace-leave { color: #fb7185; }

        .workspace-divider {
            width: 1px;
            height: 14px;
            background: var(--c-border);
        }

        .empty-state {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 56px 16px;
            text-align: center;
        }

        .empty-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 56px;
            height: 56px;
            margin-bottom: 4px;
            border-radius: 18px;
            border: 1px solid var(--c-border);
            background: var(--c-bg);
            color: var(--c-text3);
        }

        .empty-title {
            font-size: 16px;
            font-weight: 800;
            color: var(--c-text2);
        }

        .empty-sub {
            font-size: 14px;
            color: var(--c-text3);
        }

        .lesson-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }

        .lesson-card {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 16px;
            border-radius: 18px;
            border: 1px solid var(--c-border);
            background: var(--c-bg2);
            box-shadow: 0 8px 22px rgba(15, 23, 42, 0.04);
            transition: 0.2s ease;
        }

        .lesson-card:hover {
            transform: translateY(-4px);
            border-color: #8b5cf6;
            box-shadow: 0 16px 34px rgba(15, 23, 42, 0.09);
        }

        .lesson-index {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            flex-shrink: 0;
            border-radius: 12px;
            border: 1px solid rgba(124, 58, 237, 0.22);
            background: rgba(124, 58, 237, 0.08);
            color: #7c3aed;
            font-size: 12px;
            font-weight: 800;
        }

        html.dark .lesson-index {
            color: #c4b5fd;
            background: rgba(124, 58, 237, 0.18);
        }

        .lesson-title {
            margin: 0 0 6px;
            font-size: 15px;
            font-weight: 800;
            color: var(--c-text);
        }

        .lesson-text {
            margin: 0 0 8px;
            font-size: 14px;
            line-height: 1.7;
            color: var(--c-text2);
        }

        .lesson-link {
            font-size: 14px;
            font-weight: 800;
            color: #7c3aed;
            text-decoration: none;
        }

        html.dark .lesson-link {
            color: #a78bfa;
        }

        @media (max-width: 1200px) {
            .workspace-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 1024px) {
            .dash-stats {
                grid-template-columns: 1fr;
            }

            .lesson-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .dash-page {
                padding: 24px 12px;
            }

            .dash-hero {
                padding: 22px;
            }

            .dash-title {
                font-size: 30px;
            }

            .dash-hero-meta {
                display: none;
            }

            .workspace-grid {
                grid-template-columns: 1fr;
            }

            .dash-section {
                padding: 20px;
            }
        }
    </style>

    <div class="dash-page">
        <div class="dash-container">

            {{-- HERO --}}
            <div class="dash-hero">
                <div class="dash-hero-blob-1"></div>
                <div class="dash-hero-blob-2"></div>

                <div class="dash-hero-content">
                    <div style="max-width: 760px;">
                        <div class="dash-badge">
                            <span class="dash-badge-dot"></span>
                            Student Dashboard
                        </div>

                        <h1 class="dash-title">
                            Good to see you, {{ auth()->user()->name }} 👋
                        </h1>

                        <p class="dash-subtitle">
                            Here's everything happening in your learning space today. Open your workspaces, follow your lessons, and keep moving forward.
                        </p>
                    </div>

                    <div class="dash-hero-side">
                        <div class="dash-hero-meta">
                            <p class="meta-top">Current space</p>
                            <p class="meta-title">Student panel</p>
                            <p class="meta-sub">Your learning overview</p>
                        </div>

                        <div class="dash-avatar">
                            {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                            <span class="dash-avatar-status"></span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- STATS --}}
            <div class="dash-stats">
                <div class="dash-stat-card">
                    <div class="dash-stat-icon blue">
                        <svg width="24" height="24" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.7">
                            <rect x="2" y="2" width="7" height="7" rx="2"/>
                            <rect x="11" y="2" width="7" height="7" rx="2"/>
                            <rect x="2" y="11" width="7" height="7" rx="2"/>
                            <rect x="11" y="11" width="7" height="7" rx="2"/>
                        </svg>
                    </div>

                    <div>
                        <div class="dash-stat-label">Workspaces</div>
                        <div class="dash-stat-value blue">{{ isset($workspaces) ? $workspaces->count() : 0 }}</div>
                    </div>
                </div>

                <div class="dash-stat-card">
                    <div class="dash-stat-icon violet">
                        <svg width="24" height="24" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.7">
                            <path d="M3 5h14M3 9h10M3 13h12" stroke-linecap="round"/>
                        </svg>
                    </div>

                    <div>
                        <div class="dash-stat-label">Lessons</div>
                        <div class="dash-stat-value violet">{{ isset($lessons) ? $lessons->count() : 0 }}</div>
                    </div>
                </div>

                <div class="dash-stat-card">
                    <div class="dash-stat-icon cyan">
                        <svg width="24" height="24" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.7">
                            <path d="M3 15L7 8l4 3.5L14.5 5 18 9" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>

                    <div>
                        <div class="dash-stat-label">Exercises</div>
                        <div class="dash-stat-value cyan">{{ $exercisesCount ?? 0 }}</div>
                    </div>
                </div>
            </div>

            {{-- WORKSPACES --}}
            <div class="dash-section">
                <div class="dash-section-header">
                    <div class="dash-section-title-wrap">
                        <span class="dash-section-dot blue"></span>
                        <h2 class="dash-section-title">My Workspaces</h2>
                    </div>

                    <span class="dash-section-count">
                        {{ isset($workspaces) ? $workspaces->count() : 0 }} total
                    </span>
                </div>

                @if (isset($workspaces) && $workspaces->count())
                    <div class="workspace-grid">
                        @foreach ($workspaces as $i => $workspace)
                            @php
                                $colors = ['blue', 'green', 'rose', 'amber', 'violet', 'cyan'];
                                $c = $colors[$i % 6];
                                $teacherName = $workspace->teacher->name ?? 'Unknown teacher';
                                $teacherInitials = strtoupper(substr($teacherName, 0, 2));
                            @endphp

                            <div class="workspace-card">
                                <div class="workspace-banner {{ $c }}">
                                    <div class="workspace-banner-text">
                                        {{ strtoupper(substr($workspace->name, 0, 2)) }}
                                    </div>

                                    <div class="workspace-teacher-avatar">
                                        {{ $teacherInitials }}
                                    </div>
                                </div>

                                <div class="workspace-body">
                                    <div class="workspace-name">{{ $workspace->name }}</div>
                                    <div class="workspace-subject">{{ $workspace->subject ?? 'No subject' }}</div>

                                    <div class="workspace-teacher">
                                        <span class="workspace-teacher-dot"></span>
                                        Teacher: {{ $teacherName }}
                                    </div>
                                </div>

                                <div class="workspace-footer">
                                    <a href="{{ route('student.workspaces.show', $workspace->id) }}" class="workspace-link">
                                        Open →
                                    </a>

                                    <span class="workspace-divider"></span>

                                    <form action="{{ url('/student/workspaces/' . $workspace->id . '/leave') }}" method="POST" style="margin:0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="workspace-leave">Leave</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-state">
                        <div class="empty-icon">
                            <svg width="24" height="24" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5">
                                <rect x="2" y="2" width="7" height="7" rx="1.5"/>
                                <rect x="11" y="2" width="7" height="7" rx="1.5"/>
                                <rect x="2" y="11" width="7" height="7" rx="1.5"/>
                                <rect x="11" y="11" width="7" height="7" rx="1.5"/>
                            </svg>
                        </div>
                        <div class="empty-title">No workspaces yet</div>
                        <div class="empty-sub">Join one to start collaborating</div>
                    </div>
                @endif
            </div>

            {{-- LESSONS --}}
            <div class="dash-section" style="margin-bottom:0;">
                <div class="dash-section-header">
                    <div class="dash-section-title-wrap">
                        <span class="dash-section-dot violet"></span>
                        <h2 class="dash-section-title">Latest Lessons</h2>
                    </div>

                    <span class="dash-section-count">
                        {{ isset($lessons) ? $lessons->count() : 0 }} total
                    </span>
                </div>

                @if (isset($lessons) && $lessons->count())
                    <div class="lesson-grid">
                        @foreach ($lessons as $i => $lesson)
                            <div class="lesson-card">
                                <div class="lesson-index">
                                    {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                                </div>

                                <div style="min-width:0;flex:1;">
                                    <h3 class="lesson-title">{{ $lesson->title }}</h3>
                                    <p class="lesson-text">{{ \Illuminate\Support\Str::limit($lesson->description, 95) }}</p>
                                    <a href="#" class="lesson-link">View lesson →</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-state">
                        <div class="empty-icon">
                            <svg width="24" height="24" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M4 3h12a1 1 0 011 1v12a1 1 0 01-1 1H4a1 1 0 01-1-1V4a1 1 0 011-1z"/>
                                <path d="M7 7h6M7 10.5h4" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <div class="empty-title">No lessons available yet</div>
                        <div class="empty-sub">Check back once your instructor adds content</div>
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
