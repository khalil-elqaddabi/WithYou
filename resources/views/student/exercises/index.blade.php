<x-app-layout>
<style>
:root {
    --bg:       #f0f2f5;
    --surface:  #ffffff;
    --surface2: #f8f9fb;
    --border:   #e8eaed;
    --border2:  #d1d5db;
    --text:     #0f1117;
    --text2:    #6b7280;
    --text3:    #9ca3af;
    --blue:     #2563eb;
    --blue-l:   #eff4ff;
    --blue-b:   #bfdbfe;
    --violet:   #7c3aed;
    --violet-l: #f5f3ff;
    --violet-b: #ddd6fe;
    --emerald:  #059669;
    --emerald-l:#ecfdf5;
    --emerald-b:#a7f3d0;
    --amber:    #d97706;
    --amber-l:  #fffbeb;
    --amber-b:  #fde68a;
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
}

.ex * { box-sizing: border-box; margin: 0; padding: 0; }
.ex {
    min-height: 100vh;
    background: var(--bg);
    padding: 2.5rem clamp(1rem,4vw,2.5rem);
    font-family: 'Inter', sans-serif;
    color: var(--text);
}

/* BREADCRUMB */
.ex-bread {
    display: flex; align-items: center; gap: 8px;
    font-size: .8rem; color: var(--text3);
    margin-bottom: 1.5rem; flex-wrap: wrap;
}
.ex-bread a { color: var(--blue); text-decoration: none; font-weight: 600; transition: opacity .2s; }
.ex-bread a:hover { opacity: .7; }
.ex-bread-sep { color: var(--border2); }

/* HERO */
.ex-hero {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 20px; overflow: hidden;
    margin-bottom: 1.5rem;
}
.ex-hero-banner { height: 6px; background: linear-gradient(to right, #059669, #2563eb); }
.ex-hero-body {
    padding: 1.75rem 2rem;
    display: flex; align-items: flex-start;
    justify-content: space-between; gap: 1.5rem; flex-wrap: wrap;
}
.ex-hero-tag {
    display: inline-flex; align-items: center; gap: 6px;
    font-size: .7rem; font-weight: 700; text-transform: uppercase; letter-spacing: .8px;
    color: var(--emerald); background: var(--emerald-l);
    border: 1px solid var(--emerald-b);
    padding: 3px 10px; border-radius: 99px; margin-bottom: .6rem;
}
.ex-hero-title {
    font-family: 'Cal Sans', 'Inter', sans-serif;
    font-size: clamp(1.4rem,3vw,1.9rem);
    color: var(--text); line-height: 1.2; margin-bottom: .5rem;
}
.ex-hero-meta {
    display: flex; flex-direction: column; gap: 4px;
}
.ex-hero-meta-row {
    display: flex; align-items: center; gap: 6px;
    font-size: .825rem; color: var(--text2);
}
.ex-hero-meta-row svg { color: var(--text3); flex-shrink: 0; }
.ex-stat {
    background: var(--surface2); border: 1px solid var(--border);
    border-radius: 12px; padding: .75rem 1.25rem; text-align: center; flex-shrink: 0;
}
.ex-stat-val {
    font-family: 'Cal Sans', 'Inter', sans-serif;
    font-size: 1.6rem; color: var(--emerald); line-height: 1;
}
.ex-stat-label { font-size: .7rem; font-weight: 600; color: var(--text3); text-transform: uppercase; letter-spacing: .5px; margin-top: 4px; }

/* SECTION HEAD */
.ex-section-head {
    display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;
}
.ex-section-title {
    font-size: 1rem; font-weight: 700; color: var(--text);
    display: flex; align-items: center; gap: 8px;
}
.ex-pill { width: 8px; height: 8px; border-radius: 50%; }

/* EXERCISE CARDS */
.ex-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 1rem;
}
.ex-card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 16px; overflow: hidden;
    display: flex; flex-direction: column;
    transition: transform .2s, box-shadow .2s, border-color .2s;
}
.ex-card:hover {
    transform: translateY(-4px);
    border-color: var(--emerald-b);
    box-shadow: 0 12px 32px rgba(5,150,105,.1);
}
html.dark .ex-card:hover { box-shadow: 0 12px 32px rgba(0,0,0,.35); }
.ex-card-top { height: 4px; background: linear-gradient(to right, #059669, #2563eb); }
.ex-card-head {
    padding: .9rem 1.1rem .5rem;
    display: flex; align-items: center; gap: 10px;
}
.ex-card-num {
    width: 30px; height: 30px; border-radius: 8px;
    background: var(--emerald-l); border: 1px solid var(--emerald-b);
    display: flex; align-items: center; justify-content: center;
    font-size: .7rem; font-weight: 800; color: var(--emerald);
    flex-shrink: 0;
}
.ex-card-label {
    font-size: .72rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: .6px; color: var(--text3);
}
.ex-card-body { padding: 0 1.1rem 1.25rem; flex: 1; }
.ex-card-question {
    font-size: .9375rem; font-weight: 600;
    color: var(--text); line-height: 1.55;
}

/* EMPTY */
.ex-empty {
    display: flex; flex-direction: column; align-items: center;
    justify-content: center; padding: 3rem 1rem; gap: 8px; text-align: center;
    background: var(--surface); border: 1px solid var(--border); border-radius: 16px;
}
.ex-empty-ico {
    width: 52px; height: 52px; border-radius: 14px;
    background: var(--surface2); border: 1px solid var(--border);
    display: flex; align-items: center; justify-content: center; margin-bottom: 4px;
}
.ex-empty-ico svg { width: 22px; height: 22px; color: var(--text3); }
.ex-empty-t { font-size: .9rem; font-weight: 600; color: var(--text2); }
.ex-empty-s { font-size: .8rem; color: var(--text3); }

/* BACK BUTTON */
.btn-back {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 9px 18px;
    border-radius: 11px;
    font-size: .8rem;
    font-weight: 700;
    color: var(--text2);
    background: var(--surface);
    border: 1.5px solid var(--border);
    text-decoration: none;
    margin-bottom: 1.25rem;
    transition: all .2s;
    font-family: 'Inter', sans-serif;
    cursor: pointer;
}
.btn-back:hover {
    border-color: var(--blue);
    color: var(--blue);
    transform: translateX(-3px);
    background: var(--blue-l);
}
.btn-back svg { flex-shrink: 0; transition: transform .2s; }
.btn-back:hover svg { transform: translateX(-2px); }

</style>

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&family=cal-sans:400" rel="stylesheet"/>

<div class="ex">

    {{-- BREADCRUMB --}}
    <nav class="ex-bread">
        <a href="{{ route('student.workspaces.show', $workspace->id) }}">{{ $workspace->name }}</a>
        <span class="ex-bread-sep">›</span>
        <a href="{{ route('student.courses.show', [$workspace->id, $course->id]) }}">{{ $course->title }}</a>
        <span class="ex-bread-sep">›</span>
        <a href="{{ route('student.lessons.show', [$workspace->id, $course->id, $lesson->id]) }}">{{ $lesson->title }}</a>
        <span class="ex-bread-sep">›</span>
        <span style="color:var(--text2)">Exercises</span>
    </nav>

    {{-- HERO --}}
    <div class="ex-hero">
        <div class="ex-hero-banner"></div>
        <div class="ex-hero-body">
            <div>
                <div class="ex-hero-tag">
                    <svg width="7" height="7" viewBox="0 0 7 7" fill="currentColor"><circle cx="3.5" cy="3.5" r="3.5"/></svg>
                    Exercises
                </div>
                <div class="ex-hero-title">{{ $lesson->title }}</div>
                <div class="ex-hero-meta">
                    <div class="ex-hero-meta-row">
                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="1" y="1" width="4" height="4" rx="1"/><rect x="8" y="1" width="4" height="4" rx="1"/><rect x="1" y="8" width="4" height="4" rx="1"/><rect x="8" y="8" width="4" height="4" rx="1"/></svg>
                        {{ $workspace->name }}
                    </div>
                    <div class="ex-hero-meta-row">
                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M2 3h9M2 6.5h7M2 10h8" stroke-linecap="round"/></svg>
                        {{ $course->title }}
                    </div>
                </div>
            </div>
            <div class="ex-stat">
                <div class="ex-stat-val">{{ $lesson->exercises->count() }}</div>
                <div class="ex-stat-label">Exercises</div>
            </div>
        </div>
    </div>

    {{-- BACK BUTTON --}}
    <a href="{{ route('student.lessons.show', [$workspace->id, $course->id, $lesson->id]) }}" class="btn-back">
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13L5 8l5-5"/></svg>
        Back to Lesson
    </a>

    {{-- LIST --}}
    <div class="ex-section-head">
        <div class="ex-section-title">
            <div class="ex-pill" style="background:var(--emerald)"></div>
            Exercise List
        </div>
        <span style="font-size:.75rem;font-weight:600;color:var(--text3)">{{ $lesson->exercises->count() }} total</span>
    </div>

    @if ($lesson->exercises->count())
        <div class="ex-grid">
            @foreach ($lesson->exercises as $exercise)
                <div class="ex-card">
                    <div class="ex-card-top"></div>
                    <div class="ex-card-head">
                        <div class="ex-card-num">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</div>
                        <div class="ex-card-label">Question {{ $loop->iteration }}</div>
                    </div>
                    <div class="ex-card-body">
                        <div class="ex-card-question">{{ $exercise->question }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="ex-empty">
            <div class="ex-empty-ico">
                <svg viewBox="0 0 22 22" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M11 3a8 8 0 100 16A8 8 0 0011 3z"/><path d="M11 8v4M11 14h.01" stroke-linecap="round"/></svg>
            </div>
            <div class="ex-empty-t">No exercises yet</div>
            <div class="ex-empty-s">Your instructor hasn't added any exercises to this lesson yet.</div>
        </div>
    @endif

</div>
</x-app-layout>
