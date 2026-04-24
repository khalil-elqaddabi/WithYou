<x-layouts.teacher.app>
    <x-slot name="title">Lessons</x-slot>
    <x-slot name="header">Lessons - {{ $course->title }}</x-slot>
    <x-slot name="subheader">Manage lessons inside this course</x-slot>

    <style>
        .tl-back { display:inline-flex; align-items:center; gap:6px; margin-bottom:14px; padding:8px 14px; border-radius:12px; background:var(--c-bg2); border:1px solid var(--c-border); color:var(--c-text); font-size:13px; font-weight:800; text-decoration:none; transition:.2s; }
        .tl-back:hover { border-color:#2563eb; color:#2563eb; transform:translateX(-2px); }

        .tl-flash { margin-bottom:16px; padding:14px 16px; border-radius:14px; background:#f0fdf4; border:1px solid #bbf7d0; color:#16a34a; font-weight:800; }

        .tl-top { display:flex; justify-content:space-between; align-items:center; gap:12px; flex-wrap:wrap; margin-bottom:18px; }

        .tl-btn { display:inline-flex; align-items:center; justify-content:center; padding:9px 14px; border-radius:12px; font-size:13px; font-weight:800; text-decoration:none; border:0; cursor:pointer; color:white; transition:.2s; }
        .tl-btn:hover { opacity:.9; transform:translateY(-1px); }

        .tl-blue { background:#2563eb; }
        .tl-violet { background:#7c3aed; }
        .tl-yellow { background:#f59e0b; }
        .tl-red { background:#dc2626; }

        .tl-grid { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:18px; }

        .tl-card { background:var(--c-surface); border:1px solid var(--c-border); border-radius:20px; overflow:hidden; box-shadow:0 10px 28px rgba(15,23,42,.05); transition:.2s; }
        .tl-card:hover { transform:translateY(-3px); box-shadow:0 16px 36px rgba(15,23,42,.08); }

        .tl-img { width:100%; height:190px; object-fit:cover; display:block; border-bottom:1px solid var(--c-border); }

        .tl-body { padding:20px; }
        .tl-title { margin:0 0 8px; font-size:18px; font-weight:900; color:var(--c-text); }
        .tl-desc { margin:0 0 16px; font-size:14px; line-height:1.7; color:var(--c-text2); }

        .tl-actions { display:flex; flex-wrap:wrap; gap:8px; }

        .tl-empty { background:var(--c-surface); border:1px solid var(--c-border); border-radius:20px; padding:24px; color:var(--c-text2); }

        @media(max-width:900px) {
            .tl-grid { grid-template-columns:1fr; }
        }
    </style>

    @if(session('success'))
        <div class="tl-flash">
            {{ session('success') }}
        </div>
    @endif

    <div class="tl-top">
        <a href="{{ route('teacher.workspaces.courses.index', $workspace->id) }}" class="tl-back">
            ← Back to Courses
        </a>

        <a href="{{ route('teacher.courses.lessons.create', [$workspace, $course]) }}" class="tl-btn tl-blue">
            Add Lesson
        </a>
    </div>

    @if($lessons->count())
        <div class="tl-grid">
            @foreach($lessons as $lesson)
                <div class="tl-card">
                    @if($lesson->image)
                        <img src="{{ asset('storage/'.$lesson->image) }}" class="tl-img">
                    @endif

                    <div class="tl-body">
                        <h3 class="tl-title">{{ $lesson->title }}</h3>

                        @if($lesson->description)
                            <p class="tl-desc">
                                {{ \Illuminate\Support\Str::limit($lesson->description, 120) }}
                            </p>
                        @endif

                        <div class="tl-actions">
                            <a href="{{ route('teacher.courses.lessons.show', [$workspace, $course, $lesson]) }}" class="tl-btn tl-violet">
                                View
                            </a>

                            <a href="{{ route('teacher.courses.lessons.edit', [$workspace, $course, $lesson]) }}" class="tl-btn tl-yellow">
                                Edit
                            </a>

                            <a href="{{ route('teacher.lessons.exercises.index', [$workspace, $course, $lesson]) }}" class="tl-btn tl-blue">
                                Exercises
                            </a>

                            <form method="POST" action="{{ route('teacher.courses.lessons.destroy', [$workspace, $course, $lesson]) }}">
                                @csrf
                                @method('DELETE')
                                <button class="tl-btn tl-red" onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="tl-empty">
            No lessons found.
        </div>
    @endif
</x-layouts.teacher.app>
