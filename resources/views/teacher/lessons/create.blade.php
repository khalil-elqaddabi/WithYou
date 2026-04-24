<x-layouts.teacher.app>
    <x-slot name="title">Create Lesson</x-slot>
    <x-slot name="header">Create Lesson</x-slot>
    <x-slot name="subheader">Add a new lesson inside {{ $course->title }}</x-slot>

    <style>
        .tl-back { display:inline-flex; align-items:center; gap:6px; margin-bottom:14px; padding:8px 14px; border-radius:12px; background:var(--c-bg2); border:1px solid var(--c-border); color:var(--c-text); font-size:13px; font-weight:800; text-decoration:none; transition:.2s; }
        .tl-back:hover { border-color:#2563eb; color:#2563eb; transform:translateX(-2px); }

        .tl-card { background:var(--c-surface); border:1px solid var(--c-border); border-radius:20px; padding:24px; box-shadow:0 10px 28px rgba(15,23,42,.05); }

        .tl-field { margin-bottom:18px; }
        .tl-label { display:block; margin-bottom:7px; font-size:13px; font-weight:800; color:var(--c-text); }

        .tl-input {
            width:100%;
            border:1px solid var(--c-border);
            background:var(--c-bg2);
            color:var(--c-text);
            border-radius:12px;
            padding:11px 13px;
            outline:none;
            font-size:14px;
        }

        .tl-input:focus { border-color:#2563eb; box-shadow:0 0 0 3px rgba(37,99,235,.1); }

        .tl-error { margin-top:5px; color:#dc2626; font-size:12px; font-weight:700; }

        .tl-actions { display:flex; gap:10px; flex-wrap:wrap; margin-top:22px; }

        .tl-btn {
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

        .tl-btn:hover { opacity:.9; transform:translateY(-1px); }

        .tl-blue { background:#2563eb; color:white; }
        .tl-soft { background:var(--c-bg2); border:1px solid var(--c-border); color:var(--c-text); }
    </style>

    <div class="max-w-4xl">
        <a href="{{ route('teacher.courses.lessons.index', [$workspace, $course]) }}" class="tl-back">
            ← Back to Lessons
        </a>

        <div class="tl-card">
            <form method="POST"
                  action="{{ route('teacher.courses.lessons.store', [$workspace, $course]) }}"
                  enctype="multipart/form-data">
                @csrf

                <div class="tl-field">
                    <label class="tl-label">Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" class="tl-input">
                    @error('title')
                        <p class="tl-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="tl-field">
                    <label class="tl-label">Description</label>
                    <textarea name="description" rows="4" class="tl-input">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="tl-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="tl-field">
                    <label class="tl-label">Subject</label>
                    <textarea name="subject" rows="6" class="tl-input">{{ old('subject') }}</textarea>
                    @error('subject')
                        <p class="tl-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="tl-field">
                    <label class="tl-label">Links</label>
                    <input type="text" name="links" value="{{ old('links') }}" class="tl-input">
                    @error('links')
                        <p class="tl-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="tl-field">
                    <label class="tl-label">Upload File</label>
                    <input type="file" name="file" class="tl-input">
                    @error('file')
                        <p class="tl-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="tl-field">
                    <label class="tl-label">Upload Image</label>
                    <input type="file" name="image" class="tl-input">
                    @error('image')
                        <p class="tl-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="tl-actions">
                    <button class="tl-btn tl-blue">
                        Create Lesson
                    </button>

                    <a href="{{ route('teacher.courses.lessons.index', [$workspace, $course]) }}" class="tl-btn tl-soft">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.teacher.app>
