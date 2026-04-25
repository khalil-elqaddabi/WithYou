<x-layouts.teacher.app>
    <x-slot name="title">Teacher Dashboard</x-slot>
    <x-slot name="header">Teacher Dashboard</x-slot>
    <x-slot name="subheader">Welcome back, {{ auth()->user()->name }}</x-slot>

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
    --cyan:      #0891b2;
    --cyan-l:    #ecfeff;
    --cyan-b:    #a5f3fc;
    --emerald:   #059669;
    --emerald-l: #ecfdf5;
    --emerald-b: #a7f3d0;
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
    --cyan-l:    #0a2030;
    --cyan-b:    #0e3d4a;
    --emerald-l: #0a2018;
    --emerald-b: #0d3325;
}

.td * { box-sizing: border-box; margin: 0; padding: 0; }
.td {
    font-family: 'Inter', sans-serif;
    color: var(--text);
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

/* ── HERO ── */
.td-hero {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 20px;
    overflow: hidden;
    position: relative;
}
.td-hero::before {
    content: '';
    position: absolute;
    top: -70px; right: -70px;
    width: 220px; height: 220px;
    border-radius: 50%;
    background: var(--blue-l);
    pointer-events: none;
}
.td-hero-banner { height: 6px; background: linear-gradient(to right, #2563eb, #7c3aed, #0891b2); }
.td-hero-body {
    padding: 1.75rem 2rem;
    display: flex; align-items: center;
    justify-content: space-between; gap: 1rem; flex-wrap: wrap;
}
.td-hero-tag {
    display: inline-flex; align-items: center; gap: 6px;
    font-size: .72rem; font-weight: 700;
    text-transform: uppercase; letter-spacing: .8px;
    color: var(--blue); background: var(--blue-l);
    border: 1px solid var(--blue-b);
    padding: 3px 10px; border-radius: 99px; margin-bottom: .6rem;
}
.td-hero-title {
    font-family: 'Cal Sans', 'Inter', sans-serif;
    font-size: clamp(1.4rem, 3vw, 1.9rem);
    color: var(--text); line-height: 1.2; margin-bottom: .3rem;
    position: relative; z-index: 1;
}
.td-hero-sub { font-size: .875rem; color: var(--text2); position: relative; z-index: 1; }
.td-hero-av {
    width: 54px; height: 54px; border-radius: 16px;
    background: linear-gradient(135deg, #2563eb, #7c3aed);
    display: flex; align-items: center; justify-content: center;
    font-family: 'Cal Sans', 'Inter', sans-serif;
    font-size: 1.25rem; font-weight: 700; color: white;
    flex-shrink: 0; position: relative; z-index: 1;
}
.td-hero-av::after {
    content: '';
    position: absolute; bottom: -2px; right: -2px;
    width: 13px; height: 13px; border-radius: 50%;
    background: #10b981; border: 2px solid var(--surface);
}

/* ── STATS ── */
.td-stats {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
    gap: 1rem;
}
.td-stat {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 1.25rem 1.35rem;
    display: flex; flex-direction: column; gap: 10px;
    transition: transform .2s, box-shadow .2s;
    position: relative; overflow: hidden;
}
.td-stat:hover { transform: translateY(-3px); box-shadow: 0 8px 24px rgba(0,0,0,.07); }
html.dark .td-stat:hover { box-shadow: 0 8px 24px rgba(0,0,0,.3); }
.td-stat-icon {
    width: 40px; height: 40px; border-radius: 11px;
    display: flex; align-items: center; justify-content: center;
}
.td-stat-icon svg { width: 18px; height: 18px; }
.td-stat-label {
    font-size: .72rem; font-weight: 600;
    text-transform: uppercase; letter-spacing: .6px; color: var(--text3);
}
.td-stat-val {
    font-family: 'Cal Sans', 'Inter', sans-serif;
    font-size: 2rem; line-height: 1;
}
.td-stat-bar { position: absolute; bottom: 0; left: 0; right: 0; height: 3px; }

/* ── QUICK ACTIONS ── */
.td-actions {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 18px;
    padding: 1.35rem 1.5rem;
    display: flex; align-items: center;
    justify-content: space-between; gap: 1rem; flex-wrap: wrap;
}
.td-actions-label {
    font-size: .9375rem; font-weight: 700; color: var(--text);
    display: flex; align-items: center; gap: 8px;
}
.td-pill { width: 8px; height: 8px; border-radius: 50%; }
.td-actions-btns { display: flex; gap: .75rem; flex-wrap: wrap; }

.td-btn {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 9px 18px; border-radius: 11px;
    font-size: .875rem; font-weight: 700;
    text-decoration: none; border: none; cursor: pointer;
    font-family: 'Inter', sans-serif;
    transition: opacity .2s, transform .2s;
}
.td-btn:hover { opacity: .88; transform: translateY(-1px); }

.td-btn-blue {
    background: var(--blue); color: white;
    box-shadow: 0 4px 14px rgba(37,99,235,.25);
}
.td-btn-ghost {
    background: var(--surface2); color: var(--text);
    border: 1.5px solid var(--border);
}
.td-btn-ghost:hover { border-color: var(--blue); color: var(--blue); }

/* ── SECTION HEAD ── */
.td-section-head {
    display: flex; align-items: center; justify-content: space-between;
    margin-bottom: 1rem;
}
.td-section-title {
    font-size: .9375rem; font-weight: 700; color: var(--text);
    display: flex; align-items: center; gap: 8px;
}
.td-view-all {
    font-size: .8rem; font-weight: 600; color: var(--blue);
    text-decoration: none; transition: opacity .2s;
}
.td-view-all:hover { opacity: .7; }

/* ── PANELS GRID ── */
.td-panels {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.25rem;
}
@media(max-width:860px){ .td-panels { grid-template-columns: 1fr; } }

/* ── PANEL ── */
.td-panel {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 20px; overflow: hidden;
}
.td-panel-head {
    padding: 1.25rem 1.5rem;
    border-bottom: 1px solid var(--border);
    display: flex; align-items: center; justify-content: space-between;
}
.td-panel-title {
    font-size: .9375rem; font-weight: 700; color: var(--text);
    display: flex; align-items: center; gap: 8px;
}

/* ── WORKSPACE ROW ── */
.td-ws-row {
    display: flex; align-items: center; gap: 12px;
    padding: .9rem 1.5rem;
    border-bottom: 1px solid var(--border);
    transition: background .15s;
}
.td-ws-row:last-child { border-bottom: none; }
.td-ws-row:hover { background: var(--surface2); }
.td-ws-icon {
    width: 38px; height: 38px; border-radius: 10px;
    background: var(--blue-l); border: 1px solid var(--blue-b);
    display: flex; align-items: center; justify-content: center;
    font-size: .72rem; font-weight: 800; color: var(--blue);
    font-family: 'Cal Sans', 'Inter', sans-serif; flex-shrink: 0;
}
.td-ws-name { font-size: .875rem; font-weight: 600; color: var(--text); }
.td-ws-sub  { font-size: .775rem; color: var(--text3); }

/* ── LESSON ROW ── */
.td-ls-row {
    display: flex; align-items: flex-start; gap: 12px;
    padding: .9rem 1.5rem;
    border-bottom: 1px solid var(--border);
    transition: background .15s;
}
.td-ls-row:last-child { border-bottom: none; }
.td-ls-row:hover { background: var(--surface2); }
.td-ls-num {
    width: 30px; height: 30px; border-radius: 8px; flex-shrink: 0;
    background: var(--violet-l); border: 1px solid var(--violet-b);
    display: flex; align-items: center; justify-content: center;
    font-size: .65rem; font-weight: 800; color: var(--violet);
    margin-top: 2px;
}
.td-ls-title { font-size: .875rem; font-weight: 600; color: var(--text); margin-bottom: 3px; }
.td-ls-desc  { font-size: .775rem; color: var(--text3); line-height: 1.5; }

/* ── EMPTY ── */
.td-empty {
    padding: 2.5rem; text-align: center;
    font-size: .875rem; color: var(--text3);
    display: flex; flex-direction: column; align-items: center; gap: 8px;
}
.td-empty-ico {
    width: 46px; height: 46px; border-radius: 12px;
    background: var(--surface2); border: 1px solid var(--border);
    display: flex; align-items: center; justify-content: center; margin-bottom: 4px;
}
.td-empty-ico svg { width: 20px; height: 20px; color: var(--text3); }
</style>

<div class="td">

    {{-- HERO --}}
    <div class="td-hero">
        <div class="td-hero-banner"></div>
        <div class="td-hero-body">
            <div>
                <div class="td-hero-tag">
                    <svg width="7" height="7" viewBox="0 0 7 7" fill="currentColor"><circle cx="3.5" cy="3.5" r="3.5"/></svg>
                    Teacher Panel
                </div>
                <div class="td-hero-title">Welcome back, {{ auth()->user()->name }} 👋</div>
                <div class="td-hero-sub">Here's what's happening in your classrooms today.</div>
            </div>
            <div class="td-hero-av">
                {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
            </div>
        </div>
    </div>

    {{-- STATS --}}
    <div class="td-stats">
        <div class="td-stat">
            <div class="td-stat-icon" style="background:var(--blue-l);border:1px solid var(--blue-b)">
                <svg viewBox="0 0 18 18" fill="none" stroke="var(--blue)" stroke-width="1.7"><rect x="1" y="1" width="7" height="7" rx="2"/><rect x="10" y="1" width="7" height="7" rx="2"/><rect x="1" y="10" width="7" height="7" rx="2"/><rect x="10" y="10" width="7" height="7" rx="2"/></svg>
            </div>
            <div class="td-stat-label">Workspaces</div>
            <div class="td-stat-val" style="color:var(--blue)">{{ $totalWorkspaces }}</div>
            <div class="td-stat-bar" style="background:var(--blue)"></div>
        </div>
        <div class="td-stat">
            <div class="td-stat-icon" style="background:var(--violet-l);border:1px solid var(--violet-b)">
                <svg viewBox="0 0 18 18" fill="none" stroke="var(--violet)" stroke-width="1.7"><path d="M3 4h12M3 8h9M3 12h11" stroke-linecap="round"/></svg>
            </div>
            <div class="td-stat-label">Courses</div>
            <div class="td-stat-val" style="color:var(--violet)">{{ $totalCourses }}</div>
            <div class="td-stat-bar" style="background:var(--violet)"></div>
        </div>
        <div class="td-stat">
            <div class="td-stat-icon" style="background:var(--cyan-l);border:1px solid var(--cyan-b)">
                <svg viewBox="0 0 18 18" fill="none" stroke="var(--cyan)" stroke-width="1.7"><path d="M2 4h14M2 8h10M2 12h12" stroke-linecap="round"/></svg>
            </div>
            <div class="td-stat-label">Lessons</div>
            <div class="td-stat-val" style="color:var(--cyan)">{{ $totalLessons }}</div>
            <div class="td-stat-bar" style="background:var(--cyan)"></div>
        </div>
        <div class="td-stat">
            <div class="td-stat-icon" style="background:var(--emerald-l);border:1px solid var(--emerald-b)">
                <svg viewBox="0 0 18 18" fill="none" stroke="var(--emerald)" stroke-width="1.7"><circle cx="9" cy="5.5" r="3"/><path d="M2 16c0-3 3-5 7-5s7 2 7 5" stroke-linecap="round"/></svg>
            </div>
            <div class="td-stat-label">Students</div>
            <div class="td-stat-val" style="color:var(--emerald)">{{ $totalStudents }}</div>
            <div class="td-stat-bar" style="background:var(--emerald)"></div>
        </div>
    </div>

    {{-- QUICK ACTIONS --}}
    <div class="td-actions">
        <div class="td-actions-label">
            <div class="td-pill" style="background:var(--blue)"></div>
            Quick Actions
        </div>
        <div class="td-actions-btns">
            <a href="{{ route('teacher.workspaces.create') }}" class="td-btn td-btn-blue">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="7" y1="1" x2="7" y2="13"/><line x1="1" y1="7" x2="13" y2="7"/></svg>
                Create Workspace
            </a>
            <a href="{{ route('teacher.workspaces.index') }}" class="td-btn td-btn-ghost">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="1" y="1" width="5" height="5" rx="1.5"/><rect x="8" y="1" width="5" height="5" rx="1.5"/><rect x="1" y="8" width="5" height="5" rx="1.5"/><rect x="8" y="8" width="5" height="5" rx="1.5"/></svg>
                View Workspaces
            </a>
        </div>
    </div>

    {{-- RECENT PANELS --}}
    <div class="td-panels">

        {{-- Recent Workspaces --}}
        <div class="td-panel">
            <div class="td-panel-head">
                <div class="td-panel-title">
                    <div class="td-pill" style="background:var(--blue)"></div>
                    Recent Workspaces
                </div>
                <a href="{{ route('teacher.workspaces.index') }}" class="td-view-all">View all →</a>
            </div>
            @forelse($recentWorkspaces as $workspace)
                <div class="td-ws-row">
                    <div class="td-ws-icon">{{ strtoupper(substr($workspace->name, 0, 2)) }}</div>
                    <div style="flex:1;min-width:0">
                        <div class="td-ws-name">{{ $workspace->name }}</div>
                        <div class="td-ws-sub">{{ $workspace->subject ?: 'No subject' }}</div>
                    </div>
                </div>
            @empty
                <div class="td-empty">
                    <div class="td-empty-ico">
                        <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="2" width="7" height="7" rx="1.5"/><rect x="11" y="2" width="7" height="7" rx="1.5"/><rect x="2" y="11" width="7" height="7" rx="1.5"/><rect x="11" y="11" width="7" height="7" rx="1.5"/></svg>
                    </div>
                    No workspaces yet.
                </div>
            @endforelse
        </div>

        {{-- Recent Lessons --}}
        <div class="td-panel">
            <div class="td-panel-head">
                <div class="td-panel-title">
                    <div class="td-pill" style="background:var(--violet)"></div>
                    Recent Lessons
                </div>
            </div>
            @forelse($recentLessons as $i => $lesson)
                <div class="td-ls-row">
                    <div class="td-ls-num">{{ str_pad($i+1, 2, '0', STR_PAD_LEFT) }}</div>
                    <div style="flex:1;min-width:0">
                        <div class="td-ls-title">{{ $lesson->title }}</div>
                        <div class="td-ls-desc">{{ \Illuminate\Support\Str::limit($lesson->description, 65) }}</div>
                    </div>
                </div>
            @empty
                <div class="td-empty">
                    <div class="td-empty-ico">
                        <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4 3h12a1 1 0 011 1v12a1 1 0 01-1 1H4a1 1 0 01-1-1V4a1 1 0 011-1z"/><path d="M7 7h6M7 10.5h4" stroke-linecap="round"/></svg>
                    </div>
                    No lessons yet.
                </div>
            @endforelse
        </div>

    </div>
</div>

</x-layouts.teacher.app>
