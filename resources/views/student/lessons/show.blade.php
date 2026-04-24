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
}

.ls * { box-sizing: border-box; margin: 0; padding: 0; }
.ls {
    min-height: 100vh;
    background: var(--bg);
    padding: 2.5rem clamp(1rem, 4vw, 2.5rem);
    font-family: 'Inter', sans-serif;
    color: var(--text);
}

/* BREADCRUMB */
.ls-bread {
    display: flex; align-items: center; gap: 8px;
    font-size: .8rem; color: var(--text3);
    margin-bottom: 1.5rem; flex-wrap: wrap;
}
.ls-bread a { color: var(--blue); text-decoration: none; font-weight: 600; transition: opacity .2s; }
.ls-bread a:hover { opacity: .7; }
.ls-bread-sep { color: var(--border2); }

/* LAYOUT */
.ls-layout {
    display: grid;
    grid-template-columns: 260px minmax(0, 1fr);
    gap: 1.25rem;
    align-items: start;
}
@media(max-width:900px){ .ls-layout { grid-template-columns: 1fr; } }

/* SIDEBAR */
.ls-sidebar {
    position: sticky; top: 90px;
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 18px; overflow: hidden;
}
.ls-sidebar-banner {
    height: 6px;
    background: linear-gradient(to right, #7c3aed, #2563eb);
}
.ls-sidebar-body { padding: 1.25rem; }
.ls-side-tag {
    font-size: .68rem; font-weight: 800;
    text-transform: uppercase; letter-spacing: .9px;
    color: var(--violet); margin-bottom: 6px;
    display: flex; align-items: center; gap: 5px;
}
.ls-side-title {
    font-family: 'Cal Sans', 'Inter', sans-serif;
    font-size: 1.05rem; font-weight: 700;
    color: var(--text); line-height: 1.3; margin-bottom: 1rem;
}
.ls-meta-item {
    padding: .75rem .9rem;
    border-radius: 11px;
    background: var(--surface2);
    border: 1px solid var(--border);
    margin-bottom: .6rem;
}
.ls-meta-label {
    font-size: .65rem; font-weight: 800;
    text-transform: uppercase; letter-spacing: .7px;
    color: var(--text3); margin-bottom: 4px;
}
.ls-meta-value {
    font-size: .875rem; font-weight: 600;
    color: var(--text); line-height: 1.4;
    word-break: break-word;
}
.ls-back {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 9px 16px; border-radius: 11px;
    background: var(--surface2); border: 1.5px solid var(--border);
    color: var(--text2); font-size: .8rem; font-weight: 600;
    text-decoration: none; margin-top: .75rem;
    transition: border-color .2s, color .2s, transform .2s;
    width: 100%;
    justify-content: center;
}
.ls-back:hover { border-color: var(--blue); color: var(--blue); transform: translateX(-2px); }

/* BACK BUTTON top */
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

/* MAIN */
.ls-main { display: flex; flex-direction: column; gap: 1.25rem; }

/* COVER CARD */
.ls-cover-card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 18px; overflow: hidden;
}
.ls-cover-img {
    width: 100%; height: 280px;
    object-fit: cover; display: block;
}
.ls-cover-img-placeholder {
    width: 100%; height: 200px;
    background: linear-gradient(135deg, var(--blue-l), var(--violet-l));
    display: flex; align-items: center; justify-content: center;
}
.ls-cover-img-placeholder svg { width: 40px; height: 40px; color: var(--blue); opacity: .4; }
.ls-cover-body { padding: 1.5rem; }
.ls-badge {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 4px 11px; border-radius: 99px;
    background: var(--blue-l); color: var(--blue);
    border: 1px solid var(--blue-b);
    font-size: .7rem; font-weight: 800;
    text-transform: uppercase; letter-spacing: .7px;
    margin-bottom: .85rem;
}
html.dark .ls-badge { background: var(--blue-l); border-color: var(--blue-b); }
.ls-title {
    font-family: 'Cal Sans', 'Inter', sans-serif;
    font-size: clamp(1.4rem, 3vw, 1.9rem);
    font-weight: 700; color: var(--text); margin-bottom: .6rem; line-height: 1.2;
}
.ls-desc {
    font-size: .9375rem; color: var(--text2);
    line-height: 1.75; margin-bottom: 1.25rem; max-width: 680px;
}
.ls-exercises-btn {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 10px 20px; border-radius: 11px;
    background: var(--blue); color: #fff;
    font-size: .875rem; font-weight: 700;
    text-decoration: none;
    box-shadow: 0 4px 14px rgba(37,99,235,.25);
    transition: opacity .2s, transform .2s;
}
.ls-exercises-btn:hover { opacity: .88; transform: translateY(-1px); }

/* RESOURCES ROW */
.ls-resources {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
    gap: 1rem;
}
.ls-resource-card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 14px; padding: 1.1rem 1.25rem;
    display: flex; flex-direction: column; gap: .6rem;
}
.ls-resource-title {
    font-size: .8rem; font-weight: 800;
    text-transform: uppercase; letter-spacing: .6px;
    color: var(--text3); margin-bottom: 2px;
}
.ls-link-item {
    display: block; font-size: .875rem; font-weight: 600;
    color: var(--blue); text-decoration: none;
    padding: 6px 0;
    border-bottom: 1px dashed var(--border);
    word-break: break-all;
    transition: opacity .2s;
}
.ls-link-item:last-child { border-bottom: none; }
.ls-link-item:hover { opacity: .7; }
.ls-file-row {
    display: flex; align-items: center;
    justify-content: space-between; gap: 12px;
    background: var(--surface2); border: 1px solid var(--border);
    border-radius: 10px; padding: .7rem 1rem;
}
.ls-file-name { font-size: .875rem; font-weight: 600; color: var(--text); word-break: break-all; }
.ls-file-open {
    font-size: .8rem; font-weight: 700; color: var(--blue);
    text-decoration: none; white-space: nowrap; transition: opacity .2s;
}
.ls-file-open:hover { opacity: .7; }

/* CONTENT SECTIONS */
.ls-content-card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 18px; overflow: hidden;
}
.ls-section {
    padding: 1.5rem;
    border-bottom: 1px solid var(--border);
}
.ls-section:last-child { border-bottom: none; }
.ls-section-head {
    display: flex; align-items: center; gap: 10px; margin-bottom: .9rem;
}
.ls-section-icon {
    width: 32px; height: 32px; border-radius: 9px;
    display: flex; align-items: center; justify-content: center; flex-shrink: 0;
}
.ls-section-icon svg { width: 15px; height: 15px; }
.ls-section-title {
    font-size: .9375rem; font-weight: 700; color: var(--text);
}
.ls-section-text {
    font-size: .9rem; line-height: 1.85;
    color: var(--text2); white-space: pre-line; word-break: break-word;
}

@media(max-width:640px){
    .ls-cover-img { height: 200px; }
    .ls-cover-body { padding: 1.1rem; }
    .ls-file-row { flex-direction: column; align-items: flex-start; }
}

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

<div class="ls">

    {{-- BREADCRUMB --}}
    <nav class="ls-bread">
        <a href="{{ route('student.workspaces.show', $workspace->id) }}">{{ $workspace->name }}</a>
        <span class="ls-bread-sep">›</span>
        <a href="{{ route('student.courses.show', [$workspace->id, $course->id]) }}">{{ $course->title }}</a>
        <span class="ls-bread-sep">›</span>
        <span style="color:var(--text2)">{{ $lesson->title }}</span>
    </nav>

    <div class="ls-layout">

        {{-- SIDEBAR --}}
        <aside class="ls-sidebar">
            <div class="ls-sidebar-banner"></div>
            <div class="ls-sidebar-body">
                <div class="ls-side-tag">
                    <svg width="7" height="7" viewBox="0 0 7 7" fill="currentColor"><circle cx="3.5" cy="3.5" r="3.5"/></svg>
                    Lesson
                </div>
                <div class="ls-side-title">{{ $lesson->title }}</div>

                <div class="ls-meta-item">
                    <div class="ls-meta-label">Workspace</div>
                    <div class="ls-meta-value">{{ $workspace->name }}</div>
                </div>
                <div class="ls-meta-item">
                    <div class="ls-meta-label">Course</div>
                    <div class="ls-meta-value">{{ $course->title }}</div>
                </div>
                <div class="ls-meta-item">
                    <div class="ls-meta-label">Subject</div>
                    <div class="ls-meta-value">{{ $lesson->subject ?? 'No subject available.' }}</div>
                </div>

                <a href="{{ route('student.courses.show', [$workspace->id, $course->id]) }}" class="btn-back" style="width:100%;justify-content:center;margin-top:.75rem;margin-bottom:0">
                    <svg width="15" height="15" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13L5 8l5-5"/></svg>
                    Back to Course
                </a>
            </div>
        </aside>

        {{-- MAIN --}}
        <div class="ls-main">

            {{-- COVER + HEADER --}}
            <div class="ls-cover-card">
                @if ($lesson->image)
                    <img src="{{ asset('storage/' . $lesson->image) }}" alt="{{ $lesson->title }}" class="ls-cover-img">
                @else
                    <div class="ls-cover-img-placeholder">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2"><path d="M4 3h16a1 1 0 011 1v16a1 1 0 01-1 1H4a1 1 0 01-1-1V4a1 1 0 011-1z"/><path d="M8 8h8M8 12h6" stroke-linecap="round"/></svg>
                    </div>
                @endif
                <div class="ls-cover-body">
                    <div class="ls-badge">
                        <svg width="9" height="9" viewBox="0 0 9 9" fill="currentColor"><circle cx="4.5" cy="4.5" r="4.5"/></svg>
                        Learning Content
                    </div>
                    <div class="ls-title">{{ $lesson->title }}</div>
                    <div class="ls-desc">{{ $lesson->description ?? 'No description available.' }}</div>
                    <a href="{{ route('student.exercises.index', [$workspace->id, $course->id, $lesson->id]) }}" class="ls-exercises-btn">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 10 L5.5 4 L9 7.5 L12 2"/></svg>
                        View Exercises
                    </a>
                </div>
            </div>

            {{-- RESOURCES --}}
            @if ($lesson->links || $lesson->file)
                <div class="ls-resources">
                    @if ($lesson->links)
                        @php $links = array_filter(preg_split('/\r\n|\r|\n/', trim($lesson->links))); @endphp
                        <div class="ls-resource-card">
                            <div class="ls-resource-title">🔗 Links</div>
                            @foreach ($links as $link)
                                @if (trim($link))
                                    <a href="{{ trim($link) }}" target="_blank" class="ls-link-item">{{ trim($link) }}</a>
                                @endif
                            @endforeach
                        </div>
                    @endif

                    @if ($lesson->file)
                        <div class="ls-resource-card">
                            <div class="ls-resource-title">📎 File / PDF</div>
                            <div class="ls-file-row">
                                <div class="ls-file-name">{{ basename($lesson->file) }}</div>
                                <a href="{{ asset('storage/' . $lesson->file) }}" target="_blank" class="ls-file-open">Open →</a>
                            </div>
                        </div>
                    @endif
                </div>
            @endif

            {{-- CONTENT SECTIONS --}}
            <div class="ls-content-card">
                <div class="ls-section">
                    <div class="ls-section-head">
                        <div class="ls-section-icon" style="background:var(--blue-l);border:1px solid var(--blue-b)">
                            <svg viewBox="0 0 15 15" fill="none" stroke="var(--blue)" stroke-width="1.7"><path d="M3 3h9M3 7h7M3 11h8" stroke-linecap="round"/></svg>
                        </div>
                        <div class="ls-section-title">Description</div>
                    </div>
                    <p class="ls-section-text">{{ $lesson->description ?? 'No description available.' }}</p>
                </div>
                <div class="ls-section">
                    <div class="ls-section-head">
                        <div class="ls-section-icon" style="background:var(--violet-l);border:1px solid var(--violet-b)">
                            <svg viewBox="0 0 15 15" fill="none" stroke="var(--violet)" stroke-width="1.7"><circle cx="7.5" cy="7.5" r="5.5"/><path d="M7.5 5v3l2 2" stroke-linecap="round"/></svg>
                        </div>
                        <div class="ls-section-title">Subject</div>
                    </div>
                    <p class="ls-section-text">{{ $lesson->subject ?? 'No subject available.' }}</p>
                </div>
            </div>

        </div>
    </div>
</div>
</x-app-layout>
