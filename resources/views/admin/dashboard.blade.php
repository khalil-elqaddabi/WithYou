<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-800 leading-tight">Admin Dashboard</h2>
    </x-slot>

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&family=cal-sans:400" rel="stylesheet"/>

<style>
:root {
    --bg:        #f0f2f5;
    --surface:   #ffffff;
    --surface2:  #f8f9fb;
    --border:    #e8eaed;
    --border2:   #d1d5db;
    --text:      #0f1117;
    --text2:     #6b7280;
    --text3:     #9ca3af;
    --blue:      #2563eb;
    --blue-l:    #eff4ff;
    --blue-b:    #bfdbfe;
    --violet:    #7c3aed;
    --violet-l:  #f5f3ff;
    --violet-b:  #ddd6fe;
    --emerald:   #059669;
    --emerald-l: #ecfdf5;
    --emerald-b: #a7f3d0;
    --amber:     #d97706;
    --amber-l:   #fffbeb;
    --amber-b:   #fde68a;
    --rose:      #e11d48;
    --rose-l:    #fff1f2;
    --rose-b:    #fecdd3;
    --cyan:      #0891b2;
    --cyan-l:    #ecfeff;
    --cyan-b:    #a5f3fc;
}
html.dark {
    --bg:        #0b0d11;
    --surface:   #13161c;
    --surface2:  #1a1d24;
    --border:    #22262f;
    --border2:   #2e333d;
    --text:      #f1f3f7;
    --text2:     #8b92a0;
    --text3:     #4b5260;
    --blue-l:    #0f1e3d;
    --blue-b:    #1e3a6e;
    --violet-l:  #1a1530;
    --violet-b:  #2e2460;
    --emerald-l: #0a2018;
    --emerald-b: #0d3325;
    --amber-l:   #1c1200;
    --amber-b:   #3d2800;
    --rose-l:    #200d12;
    --rose-b:    #4c1020;
    --cyan-l:    #0a2030;
    --cyan-b:    #0e3d4a;
}

.ad * { box-sizing: border-box; margin: 0; padding: 0; }
.ad {
    min-height: 100vh;
    background: var(--bg);
    padding: 2.5rem clamp(1rem, 4vw, 2.5rem);
    font-family: 'Inter', sans-serif;
    color: var(--text);
}

/* ── HERO ── */
.ad-hero {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 20px;
    overflow: hidden;
    margin-bottom: 1.5rem;
    position: relative;
}
.ad-hero::before {
    content: '';
    position: absolute;
    top: -80px; right: -80px;
    width: 240px; height: 240px;
    border-radius: 50%;
    background: var(--blue-l);
    pointer-events: none;
}
.ad-hero-banner { height: 6px; background: linear-gradient(to right, #2563eb, #7c3aed, #059669); }
.ad-hero-body {
    padding: 1.75rem 2rem;
    display: flex; align-items: center;
    justify-content: space-between; gap: 1rem; flex-wrap: wrap;
}
.ad-hero-tag {
    display: inline-flex; align-items: center; gap: 6px;
    font-size: .72rem; font-weight: 700;
    text-transform: uppercase; letter-spacing: .8px;
    color: var(--blue); background: var(--blue-l);
    border: 1px solid var(--blue-b);
    padding: 3px 10px; border-radius: 99px; margin-bottom: .6rem;
}
.ad-hero-title {
    font-family: 'Cal Sans', 'Inter', sans-serif;
    font-size: clamp(1.4rem, 3vw, 1.9rem);
    color: var(--text); line-height: 2; margin-bottom: .3rem;
    position: relative; z-index: 1;
}
.ad-hero-sub { font-size: .875rem; color: var(--text2); position: relative; z-index: 1; }
.ad-hero-av {
    width: 54px; height: 54px; border-radius: 15px;
    background: linear-gradient(135deg, #2563eb, #7c3aed);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0; position: relative; z-index: 1;
}
.ad-hero-av svg { width: 26px; height: 26px; color: white; }

/* ── NAV CARDS ── */
.ad-nav-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 1rem;
    margin-bottom: 1.5rem;
}
.ad-nav-card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 1.25rem 1.35rem;
    text-decoration: none;
    display: flex; align-items: center; gap: 14px;
    transition: transform .2s, box-shadow .2s, border-color .2s;
    position: relative; overflow: hidden;
}
.ad-nav-card::after {
    content: '→';
    position: absolute; right: 1.1rem; top: 50%;
    transform: translateY(-50%);
    font-size: .9rem; color: var(--text3);
    transition: right .2s, color .2s;
}
.ad-nav-card:hover { transform: translateY(-3px); box-shadow: 0 10px 28px rgba(0,0,0,.08); }
.ad-nav-card:hover::after { right: .8rem; color: var(--text2); }
html.dark .ad-nav-card:hover { box-shadow: 0 10px 28px rgba(0,0,0,.35); }
.ad-nav-icon {
    width: 44px; height: 44px; border-radius: 13px;
    display: flex; align-items: center; justify-content: center; flex-shrink: 0;
}
.ad-nav-icon svg { width: 20px; height: 20px; }
.ad-nav-label {
    font-size: .9375rem; font-weight: 700; color: var(--text); margin-bottom: 3px;
}
.ad-nav-sub { font-size: .775rem; color: var(--text3); }
.ad-nav-strip {
    position: absolute; left: 0; top: 0; bottom: 0;
    width: 4px; border-radius: 4px 0 0 4px;
}

/* ── STATS ── */
.ad-stats {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
    gap: 1rem;
    margin-bottom: 1.5rem;
}
.ad-stat {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 1.25rem 1.35rem;
    display: flex; flex-direction: column; gap: 10px;
    transition: transform .2s, box-shadow .2s;
    position: relative; overflow: hidden;
}
.ad-stat:hover { transform: translateY(-3px); box-shadow: 0 8px 24px rgba(0,0,0,.07); }
html.dark .ad-stat:hover { box-shadow: 0 8px 24px rgba(0,0,0,.3); }
.ad-stat-icon {
    width: 40px; height: 40px; border-radius: 11px;
    display: flex; align-items: center; justify-content: center;
}
.ad-stat-icon svg { width: 18px; height: 18px; }
.ad-stat-label {
    font-size: .72rem; font-weight: 600;
    text-transform: uppercase; letter-spacing: .6px; color: var(--text3);
}
.ad-stat-val {
    font-family: 'Cal Sans', 'Inter', sans-serif;
    font-size: 2rem; line-height: 1;
}
.ad-stat-bar {
    position: absolute; bottom: 0; left: 0; right: 0; height: 3px;
}

/* ── SECTION LABEL ── */
.ad-section-head {
    display: flex; align-items: center; justify-content: space-between;
    margin-bottom: 1rem;
}
.ad-section-title {
    font-size: 1rem; font-weight: 700; color: var(--text);
    display: flex; align-items: center; gap: 8px;
}
.ad-pill { width: 8px; height: 8px; border-radius: 50%; }

/* ── BOTTOM GRID ── */
.ad-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem; }
@media(max-width:860px){ .ad-grid { grid-template-columns: 1fr; } }

/* ── PANEL ── */
.ad-panel {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 20px; overflow: hidden;
}
.ad-panel-head {
    padding: 1.25rem 1.5rem;
    border-bottom: 1px solid var(--border);
    display: flex; align-items: center; justify-content: space-between;
}
.ad-panel-title {
    font-size: .9375rem; font-weight: 700; color: var(--text);
    display: flex; align-items: center; gap: 8px;
}
.ad-panel-count { font-size: .75rem; font-weight: 600; color: var(--text3); }

/* ── USER ROW ── */
.ad-user-row {
    display: flex; align-items: center; gap: 12px;
    padding: .9rem 1.5rem;
    border-bottom: 1px solid var(--border);
    transition: background .15s;
}
.ad-user-row:last-child { border-bottom: none; }
.ad-user-row:hover { background: var(--surface2); }
.ad-user-av {
    width: 36px; height: 36px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: .72rem; font-weight: 800; color: white;
    flex-shrink: 0; font-family: 'Cal Sans', 'Inter', sans-serif;
}
.ad-user-name { font-size: .875rem; font-weight: 600; color: var(--text); }
.ad-user-email { font-size: .775rem; color: var(--text3); }
.ad-role-badge {
    margin-left: auto; flex-shrink: 0;
    padding: 3px 10px; border-radius: 99px;
    font-size: .7rem; font-weight: 700; text-transform: capitalize;
}
.role-teacher { background: var(--violet-l); color: var(--violet); border: 1px solid var(--violet-b); }
.role-student { background: var(--emerald-l); color: var(--emerald); border: 1px solid var(--emerald-b); }
.role-admin   { background: var(--blue-l); color: var(--blue); border: 1px solid var(--blue-b); }
.role-default { background: var(--surface2); color: var(--text2); border: 1px solid var(--border); }

/* ── WS ROW ── */
.ad-ws-row {
    display: flex; align-items: center; gap: 12px;
    padding: .9rem 1.5rem;
    border-bottom: 1px solid var(--border);
    transition: background .15s;
}
.ad-ws-row:last-child { border-bottom: none; }
.ad-ws-row:hover { background: var(--surface2); }
.ad-ws-icon {
    width: 36px; height: 36px; border-radius: 10px;
    background: var(--blue-l); border: 1px solid var(--blue-b);
    display: flex; align-items: center; justify-content: center;
    font-size: .7rem; font-weight: 800; color: var(--blue);
    font-family: 'Cal Sans', 'Inter', sans-serif; flex-shrink: 0;
}
.ad-ws-name { font-size: .875rem; font-weight: 600; color: var(--text); }
.ad-ws-teacher { font-size: .775rem; color: var(--text3); display: flex; align-items: center; gap: 4px; }

.ad-stats-pro {
    grid-template-columns: repeat(auto-fit, minmax(170px, 1fr));
}

.pro-stat {
    min-height: 145px;
    padding: 1.25rem;
    border-radius: 18px;
    position: relative;
    overflow: hidden;
}

.pro-stat::before {
    content: "";
    position: absolute;
    inset: -1px;
    opacity: .22;
    background: radial-gradient(circle at top right, currentColor, transparent 45%);
}

.pro-stat-top {
    position: relative;
    z-index: 2;
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: var(--text3);
    font-size: .72rem;
    font-weight: 800;
    letter-spacing: .8px;
    text-transform: uppercase;
}

.pro-stat-top small {
    width: 26px;
    height: 26px;
    border-radius: 9px;
    display: grid;
    place-items: center;
    background: var(--surface2);
    border: 1px solid var(--border);
    font-size: .85rem;
}

.pro-stat-value {
    position: relative;
    z-index: 2;
    margin-top: 1.2rem;
    font-size: 2.7rem;
    font-weight: 900;
    line-height: 1;
}

.pro-violet { color: var(--violet); }
.pro-emerald { color: var(--emerald); }
.pro-blue { color: var(--blue); }
.pro-amber { color: var(--amber); }
.pro-cyan { color: var(--cyan); }
.pro-rose { color: var(--rose); }

.ad-nav-grid {
    grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); /* كان 200px */
}

.ad-nav-card {
    padding: 1.6rem 1.6rem; 
    border-radius: 18px;
}

.ad-nav-icon {
    width: 52px;
    height: 52px;
    border-radius: 14px;
}

.ad-nav-icon svg {
    width: 24px;
    height: 24px;
}

.ad-nav-label {
    font-size: 1.05rem;
}

.ad-nav-sub {
    font-size: .85rem;
}

.ad-nav-card::after {
    font-size: 1.1rem;
}
.ad-nav-icon {
    box-shadow: 0 4px 12px rgba(0,0,0,.15);
}

/* ── EMPTY ── */
.ad-empty { padding: 2.5rem; text-align: center; font-size: .875rem; color: var(--text3); }

/* avatar colour cycle */
.avc-0 { background: #2563eb; } .avc-1 { background: #7c3aed; }
.avc-2 { background: #059669; } .avc-3 { background: #d97706; }
.avc-4 { background: #e11d48; } .avc-5 { background: #0891b2; }
</style>

<div class="ad">

    {{-- HERO --}}
    <div class="ad-hero">
        <div class="ad-hero-banner"></div>
        <div class="ad-hero-body">
            <div>
                <div class="ad-hero-tag">
                    <svg width="7" height="7" viewBox="0 0 7 7" fill="currentColor"><circle cx="3.5" cy="3.5" r="3.5"/></svg>
                    Admin Panel
                </div>
                <div class="ad-hero-title">Admin Dashboard</div>
                <div class="ad-hero-sub">Complete overview of the WithYou platform.</div>
            </div>
            <div class="ad-hero-av">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round">
                    <path d="M12 12a5 5 0 100-10 5 5 0 000 10z"/>
                    <path d="M3 20c0-4 4-7 9-7s9 3 9 7"/>
                </svg>
            </div>
        </div>
    </div>

    {{-- NAV CARDS --}}
    <div class="ad-nav-grid">

    @php
        $navs = [
            [
                'route' => route('admin.teachers.index'),
                'label' => 'Teachers',
                'sub' => 'Manage all teachers',
                'color' => 'var(--violet)',
                'bg' => 'var(--violet-l)',
                'border' => 'var(--violet-b)',
                'icon' => '<circle cx="10" cy="7" r="3.5"/><path d="M2.5 18c0-3.5 3.4-6 7.5-6s7.5 2.5 7.5 6"/>'
            ],
            [
                'route' => route('admin.students.index'),
                'label' => 'Students',
                'sub' => 'Manage all students',
                'color' => 'var(--emerald)',
                'bg' => 'var(--emerald-l)',
                'border' => 'var(--emerald-b)',
                'icon' => '<circle cx="10" cy="7" r="3.5"/><path d="M2.5 18c0-3.5 3.4-6 7.5-6s7.5 2.5 7.5 6"/>'
            ],
            [
                'route' => route('admin.workspaces.index'),
                'label' => 'Workspaces',
                'sub' => 'View all workspaces',
                'color' => 'var(--amber)',
                'bg' => 'var(--amber-l)',
                'border' => 'var(--amber-b)',
                'icon' => '<rect x="2" y="2" width="7" height="7" rx="2"/><rect x="11" y="2" width="7" height="7" rx="2"/><rect x="2" y="11" width="7" height="7" rx="2"/><rect x="11" y="11" width="7" height="7" rx="2"/>'
            ],
        ];
    @endphp

    @foreach($navs as $nav)
        <a href="{{ $nav['route'] }}" class="ad-nav-card pro-nav">

            <div class="ad-nav-strip" style="background:{{ $nav['color'] }}"></div>

            <div class="ad-nav-icon"
                 style="background:{{ $nav['bg'] }};border:1px solid {{ $nav['border'] }}">

                <svg viewBox="0 0 20 20"
                     fill="none"
                     stroke="{{ $nav['color'] }}"
                     stroke-width="1.7"
                     stroke-linecap="round"
                     stroke-linejoin="round">
                    {!! $nav['icon'] !!}
                </svg>
            </div>

            <div>
                <div class="ad-nav-label">{{ $nav['label'] }}</div>
                <div class="ad-nav-sub">{{ $nav['sub'] }}</div>
            </div>

        </a>
    @endforeach

</div>

    {{-- STATS --}}
    <div class="ad-section-head">
        <div class="ad-section-title">
            <div class="ad-pill" style="background:var(--blue)"></div>
            Platform Overview
        </div>
    </div>

        <div class="ad-stats ad-stats-pro">

    @php
        $stats = [
            ['label' => 'Teachers', 'value' => $teachersCount, 'class' => 'pro-violet'],
            ['label' => 'Students', 'value' => $studentsCount, 'class' => 'pro-emerald'],
            ['label' => 'Workspaces', 'value' => $workspacesCount, 'class' => 'pro-blue'],
            ['label' => 'Courses', 'value' => $coursesCount, 'class' => 'pro-amber'],
            ['label' => 'Lessons', 'value' => $lessonsCount, 'class' => 'pro-cyan'],
            ['label' => 'Exercises', 'value' => $exercisesCount, 'class' => 'pro-rose'],
        ];
    @endphp

    @foreach($stats as $stat)
        <div class="ad-stat pro-stat {{ $stat['class'] }}">
            <div class="pro-stat-top">
                <span>{{ $stat['label'] }}</span>
                <small>↗</small>
            </div>

            <div class="pro-stat-value">
                {{ $stat['value'] }}
            </div>
        </div>
    @endforeach

</div>


    {{-- LATEST --}}
    <div class="ad-section-head">
        <div class="ad-section-title">
            <div class="ad-pill" style="background:var(--violet)"></div>
            Latest Activity
        </div>
    </div>
    <div class="ad-grid">

        {{-- Latest Users --}}
        <div class="ad-panel">
            <div class="ad-panel-head">
                <div class="ad-panel-title">
                    <div class="ad-pill" style="background:var(--violet)"></div>
                    Latest Users
                </div>
                <span class="ad-panel-count">{{ $latestUsers->count() }} recent</span>
            </div>
            @forelse($latestUsers as $i => $user)
                <div class="ad-user-row">
                    <div class="ad-user-av avc-{{ $i % 6 }}">
                        {{ strtoupper(substr($user->name, 0, 2)) }}
                    </div>
                    <div style="flex:1;min-width:0">
                        <div class="ad-user-name">{{ $user->name }}</div>
                        <div class="ad-user-email">{{ $user->email }}</div>
                    </div>
                    <span class="ad-role-badge role-{{ $user->role ?? 'default' }}">
                        {{ $user->role ?? 'user' }}
                    </span>
                </div>
            @empty
                <div class="ad-empty">No users found.</div>
            @endforelse
        </div>

        {{-- Latest Workspaces --}}
        <div class="ad-panel">
            <div class="ad-panel-head">
                <div class="ad-panel-title">
                    <div class="ad-pill" style="background:var(--blue)"></div>
                    Latest Workspaces
                </div>
                <span class="ad-panel-count">{{ $latestWorkspaces->count() }} recent</span>
            </div>
            @forelse($latestWorkspaces as $i => $workspace)
                <div class="ad-ws-row">
                    <div class="ad-ws-icon">
                        {{ strtoupper(substr($workspace->name, 0, 2)) }}
                    </div>
                    <div style="flex:1;min-width:0">
                        <div class="ad-ws-name">{{ $workspace->name }}</div>
                        <div class="ad-ws-teacher">
                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none" stroke="currentColor" stroke-width="1.6"><circle cx="5.5" cy="4" r="2"/><path d="M1 10c0-2.5 2-4 4.5-4s4.5 1.5 4.5 4" stroke-linecap="round"/></svg>
                            {{ $workspace->teacher->name ?? 'No teacher' }}
                        </div>
                    </div>
                </div>
            @empty
                <div class="ad-empty">No workspaces found.</div>
            @endforelse
        </div>

    </div>
</div>

</x-app-layout>
