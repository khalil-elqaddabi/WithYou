<x-app-layout>
<style>
/* reuse dashboard tokens if loaded, else define */
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
    --rose:     #e11d48;
    --r: 14px;
}
html.dark {
    --bg:       #0b0d11;
    --surface:  #13161c;
    --surface2: #1a1d24;
    --border:   #22262f;
    --border2:  #2e333d;
    --text:     #f1f3f7;
    --text2:    #8b92a0;
    --text3:    #4b5260;
    --blue-l:   #0f1e3d;
    --blue-b:   #1e3a6e;
    --violet-l: #1a1530;
    --violet-b: #2e2460;
}
.cs * { box-sizing: border-box; }
.cs {
    min-height: 100vh;
    background: var(--bg);
    padding: 2.5rem clamp(1rem,4vw,2.5rem);
    font-family: 'Inter', sans-serif;
    color: var(--text);
}

/* BREADCRUMB */
.cs-bread {
    display: flex; align-items: center; gap: 8px;
    font-size: .8rem; color: var(--text3);
    margin-bottom: 1.5rem; flex-wrap: wrap;
}
.cs-bread a {
    color: var(--blue); text-decoration: none; font-weight: 600;
    transition: opacity .2s;
}
.cs-bread a:hover { opacity: .7; }
.cs-bread-sep { color: var(--border2); }

/* HERO CARD */
.cs-hero {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 20px;
    overflow: hidden;
    margin-bottom: 1.5rem;
}
.cs-hero-banner {
    height: 10px;
    background: linear-gradient(to right, #2563eb, #7c3aed);
}
.cs-hero-body {
    padding: 1.75rem 2rem;
    display: flex; align-items: flex-start;
    justify-content: space-between; gap: 1.5rem; flex-wrap: wrap;
}
.cs-hero-tag {
    display: inline-flex; align-items: center; gap: 6px;
    font-size: .72rem; font-weight: 700;
    text-transform: uppercase; letter-spacing: .8px;
    color: var(--blue); background: var(--blue-l);
    border: 1px solid var(--blue-b);
    padding: 3px 10px; border-radius: 99px; margin-bottom: .6rem;
}
.cs-hero-title {
    font-family: 'Cal Sans', 'Inter', sans-serif;
    font-size: clamp(1.4rem, 3vw, 1.9rem);
    font-weight: 700; color: var(--text); line-height: 1.2;
    margin-bottom: .4rem;
}
.cs-hero-ws {
    font-size: .85rem; color: var(--text2);
    display: flex; align-items: center; gap: 6px;
}
.cs-hero-ws svg { color: var(--text3); }
.cs-stat-row {
    display: flex; gap: .75rem; flex-wrap: wrap; flex-shrink: 0;
}
.cs-stat {
    background: var(--surface2); border: 1px solid var(--border);
    border-radius: 12px; padding: .75rem 1.1rem; text-align: center;
    min-width: 80px;
}
.cs-stat-val {
    font-family: 'Cal Sans', 'Inter', sans-serif;
    font-size: 1.5rem; font-weight: 700; color: var(--blue); line-height: 1;
}
.cs-stat-label { font-size: .7rem; font-weight: 600; color: var(--text3); text-transform: uppercase; letter-spacing: .5px; margin-top: 4px; }

/* LESSONS HEADER */
.cs-section-head {
    display: flex; align-items: center;
    justify-content: space-between; margin-bottom: 1rem;
}
.cs-section-title {
    font-size: 1rem; font-weight: 700; color: var(--text);
    display: flex; align-items: center; gap: 8px;
}
.cs-pill { width: 8px; height: 8px; border-radius: 50%; }
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


/* BACK BUTTON */
.btn-back {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 9px 18px; border-radius: 11px;
    background: var(--surface); border: 1.5px solid var(--border);
    color: var(--text2); font-size: .875rem; font-weight: 600;
    text-decoration: none; margin-bottom: 1.25rem;
    transition: border-color .2s, color .2s, transform .2s;
    font-family: 'Inter', sans-serif;
}
.btn-back:hover { border-color: var(--blue); color: var(--blue); transform: translateX(-2px); }
.btn-back svg { flex-shrink: 0; }

/* LESSON CARDS GRID */
.cs-lessons-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 1rem;
}

.cs-lesson-card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 16px;
    overflow: hidden;
    display: flex; flex-direction: column;
    transition: transform .2s, box-shadow .2s, border-color .2s;
}
.cs-lesson-card:hover {
    transform: translateY(-4px);
    border-color: var(--blue-b);
    box-shadow: 0 12px 32px rgba(37,99,235,.1);
}
html.dark .cs-lesson-card:hover { box-shadow: 0 12px 32px rgba(0,0,0,.35); }

.cs-lesson-card-top {
    height: 6px;
    background: linear-gradient(to right, #2563eb, #7c3aed);
}
.cs-lesson-num-row {
    display: flex; align-items: center; justify-content: space-between;
    padding: 1rem 1.1rem .5rem;
}
.cs-lesson-num {
    width: 30px; height: 30px; border-radius: 8px;
    background: var(--blue-l); border: 1px solid var(--blue-b);
    display: flex; align-items: center; justify-content: center;
    font-size: .7rem; font-weight: 800; color: var(--blue);
}
.cs-lesson-body { padding: 0 1.1rem 1rem; flex: 1; }
.cs-lesson-title {
    font-size: .9375rem; font-weight: 700;
    color: var(--text); margin-bottom: .4rem; line-height: 1.3;
}
.cs-lesson-desc {
    font-size: .8125rem; color: var(--text2);
    line-height: 1.55; margin-bottom: .85rem;
}
.cs-lesson-open {
    display: inline-flex; align-items: center; gap: 5px;
    font-size: .8rem; font-weight: 700; color: var(--blue);
    text-decoration: none; transition: opacity .2s;
    padding: 7px 14px; border-radius: 9px;
    background: var(--blue-l); border: 1px solid var(--blue-b);
    margin: 0 1.1rem 1.1rem;
}
.cs-lesson-open:hover { opacity: .8; }

/* EMPTY */
.cs-empty {
    display: flex; flex-direction: column; align-items: center;
    justify-content: center; padding: 3rem 1rem; gap: 8px; text-align: center;
    background: var(--surface); border: 1px solid var(--border);
    border-radius: 16px;
}
.cs-empty-ico {
    width: 52px; height: 52px; border-radius: 14px;
    background: var(--surface2); border: 1px solid var(--border);
    display: flex; align-items: center; justify-content: center; margin-bottom: 4px;
}
.cs-empty-ico svg { width: 22px; height: 22px; color: var(--text3); }
.cs-empty-t { font-size: .9rem; font-weight: 600; color: var(--text2); }
.cs-empty-s { font-size: .8rem; color: var(--text3); }
</style>

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&family=cal-sans:400" rel="stylesheet"/>

<div class="cs">

    {{-- BREADCRUMB --}}
    <nav class="cs-bread">
        <a href="{{ route('student.workspaces.show', $workspace->id) }}">{{ $workspace->name }}</a>
        <span class="cs-bread-sep">›</span>
        <span style="color:var(--text2)">{{ $course->title }}</span>
    </nav>

    {{-- BACK BUTTON --}}
    <a href="{{ route('student.workspaces.show', $workspace->id) }}" class="btn-back">
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13L5 8l5-5"/></svg>
        Back to Workspace
    </a>

    {{-- HERO --}}
    <div class="cs-hero">
        <div class="cs-hero-banner"></div>
        <div class="cs-hero-body">
            <div>
                <div class="cs-hero-tag">
                    <svg width="7" height="7" viewBox="0 0 7 7" fill="currentColor"><circle cx="3.5" cy="3.5" r="3.5"/></svg>
                    Course
                </div>
                <div class="cs-hero-title">{{ $course->title }}</div>
                <div class="cs-hero-ws">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="1" y="1" width="5" height="5" rx="1.5"/><rect x="8" y="1" width="5" height="5" rx="1.5"/><rect x="1" y="8" width="5" height="5" rx="1.5"/><rect x="8" y="8" width="5" height="5" rx="1.5"/></svg>
                    {{ $workspace->name }}
                </div>
            </div>
            <div class="cs-stat-row">
                <div class="cs-stat">
                    <div class="cs-stat-val">{{ $course->lessons->count() }}</div>
                    <div class="cs-stat-label">Lessons</div>
                </div>
            </div>
        </div>
    </div>

    {{-- LESSONS --}}
    <div class="cs-section-head">
        <div class="cs-section-title">
            <div class="cs-pill" style="background:var(--violet)"></div>
            Lessons
        </div>
        <span style="font-size:.75rem;font-weight:600;color:var(--text3)">{{ $course->lessons->count() }} total</span>
    </div>

    @if ($course->lessons->count())
        <div class="cs-lessons-grid">
            @foreach ($course->lessons as $i => $lesson)
                <div class="cs-lesson-card">
                    <div class="cs-lesson-card-top"></div>
                    <div class="cs-lesson-num-row">
                        <div class="cs-lesson-num">{{ str_pad($i+1, 2, '0', STR_PAD_LEFT) }}</div>
                    </div>
                    <div class="cs-lesson-body">
                        <div class="cs-lesson-title">{{ $lesson->title }}</div>
                        <div class="cs-lesson-desc">{{ \Illuminate\Support\Str::limit($lesson->description ?? 'No description', 90) }}</div>
                    </div>
                    <a href="{{ route('student.lessons.show', [$workspace->id, $course->id, $lesson->id]) }}" class="cs-lesson-open">
                        Open Lesson →
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <div class="cs-empty">
            <div class="cs-empty-ico">
                <svg viewBox="0 0 22 22" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4 3h14a1 1 0 011 1v14a1 1 0 01-1 1H4a1 1 0 01-1-1V4a1 1 0 011-1z"/><path d="M7 8h8M7 12h5" stroke-linecap="round"/></svg>
            </div>
            <div class="cs-empty-t">No lessons yet</div>
            <div class="cs-empty-s">Lessons will appear here once your instructor adds them.</div>
        </div>
    @endif

</div>
</x-app-layout>
