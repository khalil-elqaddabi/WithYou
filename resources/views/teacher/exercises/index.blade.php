<x-layouts.teacher.app>
    <x-slot name="title">Exercises</x-slot>
    <x-slot name="header">Exercises - {{ $lesson->title }}</x-slot>
    <x-slot name="subheader">Manage questions for this lesson</x-slot>

    <style>
        .te-back { display:inline-flex; align-items:center; gap:6px; margin-bottom:14px; padding:8px 14px; border-radius:12px; background:var(--c-bg2); border:1px solid var(--c-border); color:var(--c-text); font-size:13px; font-weight:800; text-decoration:none; transition:.2s; }
        .te-back:hover { border-color:#2563eb; color:#2563eb; transform:translateX(-2px); }

        .te-flash { margin-bottom:16px; padding:14px 16px; border-radius:14px; background:#f0fdf4; border:1px solid #bbf7d0; color:#16a34a; font-weight:800; }

        .te-top { display:flex; justify-content:space-between; align-items:center; gap:12px; flex-wrap:wrap; margin-bottom:18px; }

        .te-card { background:var(--c-surface); border:1px solid var(--c-border); border-radius:20px; padding:24px; box-shadow:0 10px 28px rgba(15,23,42,.05); }

        .te-list { display:grid; gap:12px; }

        .te-item { display:flex; justify-content:space-between; align-items:flex-start; gap:18px; padding:16px; border:1px solid var(--c-border); border-radius:16px; background:var(--c-bg2); }

        .te-question { margin:0; color:var(--c-text); font-size:14px; line-height:1.8; white-space:pre-line; }

        .te-btn { display:inline-flex; align-items:center; justify-content:center; padding:9px 14px; border-radius:12px; font-size:13px; font-weight:800; text-decoration:none; border:0; cursor:pointer; transition:.2s; color:white; white-space:nowrap; }
        .te-btn:hover { opacity:.9; transform:translateY(-1px); }

        .te-blue { background:#2563eb; }
        .te-red { background:#dc2626; }

        .te-empty { color:var(--c-text2); font-size:14px; }

        @media(max-width:700px) {
            .te-item { flex-direction:column; }
        }
    </style>

    @if(session('success'))
        <div class="te-flash">
            {{ session('success') }}
        </div>
    @endif

    <div class="te-top">
        <a href="{{ route('teacher.courses.lessons.index', [$workspace, $course]) }}" class="te-back">
            ← Back to Lessons
        </a>

        <a href="{{ route('teacher.lessons.exercises.create', [$workspace, $course, $lesson]) }}" class="te-btn te-blue">
            Add Question
        </a>
    </div>

    <div class="te-card">
        @if($exercises->count())
            <div class="te-list">
                @foreach($exercises as $exercise)
                    <div class="te-item">
                        <p class="te-question">{{ $exercise->question }}</p>

                        <form method="POST"
                              action="{{ route('teacher.lessons.exercises.destroy', [$workspace, $course, $lesson, $exercise]) }}">
                            @csrf
                            @method('DELETE')

                            <button class="te-btn te-red" onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        @else
            <p class="te-empty">No exercises yet.</p>
        @endif
    </div>
</x-layouts.teacher.app>
