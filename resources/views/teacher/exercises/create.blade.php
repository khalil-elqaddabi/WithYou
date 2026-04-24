<x-layouts.teacher.app>
    <x-slot name="title">Add Exercise</x-slot>
    <x-slot name="header">Add Exercise</x-slot>
    <x-slot name="subheader">Create a new question for {{ $lesson->title }}</x-slot>

    <style>
        .te-back { display:inline-flex; align-items:center; gap:6px; margin-bottom:14px; padding:8px 14px; border-radius:12px; background:var(--c-bg2); border:1px solid var(--c-border); color:var(--c-text); font-size:13px; font-weight:800; text-decoration:none; transition:.2s; }
        .te-back:hover { border-color:#2563eb; color:#2563eb; transform:translateX(-2px); }

        .te-card { background:var(--c-surface); border:1px solid var(--c-border); border-radius:20px; padding:24px; box-shadow:0 10px 28px rgba(15,23,42,.05); max-width:700px; }

        .te-field { margin-bottom:18px; }
        .te-label { display:block; margin-bottom:8px; font-size:13px; font-weight:800; color:var(--c-text); }

        .te-input {
            width:100%;
            border:1px solid var(--c-border);
            background:var(--c-bg2);
            color:var(--c-text);
            border-radius:12px;
            padding:12px 14px;
            outline:none;
            font-size:14px;
        }

        .te-input:focus { border-color:#2563eb; box-shadow:0 0 0 3px rgba(37,99,235,.1); }

        .te-error { margin-top:6px; color:#dc2626; font-size:12px; font-weight:700; }

        .te-actions { display:flex; gap:10px; flex-wrap:wrap; margin-top:20px; }

        .te-btn {
            display:inline-flex;
            align-items:center;
            justify-content:center;
            padding:10px 16px;
            border-radius:12px;
            font-size:13px;
            font-weight:800;
            text-decoration:none;
            border:0;
            cursor:pointer;
            transition:.2s;
        }

        .te-btn:hover { opacity:.9; transform:translateY(-1px); }

        .te-blue { background:#2563eb; color:white; }
        .te-soft { background:var(--c-bg2); border:1px solid var(--c-border); color:var(--c-text); }
    </style>

    <div class="max-w-3xl">
        <a href="{{ route('teacher.courses.lessons.index', [$workspace, $course]) }}" class="te-back">
            ← Back to Lessons
        </a>

        <div class="te-card">
            <form method="POST"
                  action="{{ route('teacher.lessons.exercises.store', [$workspace, $course, $lesson]) }}">
                @csrf

                <div class="te-field">
                    <label class="te-label">Question</label>
                    <textarea name="question"
                              rows="6"
                              class="te-input">{{ old('question') }}</textarea>

                    @error('question')
                        <p class="te-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="te-actions">
                    <button class="te-btn te-blue">
                        Save Question
                    </button>

                    <a href="{{ route('teacher.lessons.exercises.index', [$workspace, $course, $lesson]) }}" class="te-btn te-soft">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.teacher.app>
