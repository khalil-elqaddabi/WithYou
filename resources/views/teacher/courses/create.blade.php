<x-layouts.teacher.app>
    <x-slot name="title">Create Course</x-slot>
    <x-slot name="header">Create Course</x-slot>
    <x-slot name="subheader">Add a new course inside {{ $workspace->name }}</x-slot>

    <style>
        .tc-back {
            display:inline-flex; align-items:center; gap:6px;
            margin-bottom:14px; padding:8px 14px;
            border-radius:12px; background:var(--c-bg2);
            border:1px solid var(--c-border);
            color:var(--c-text); font-size:13px; font-weight:800;
            text-decoration:none; transition:.2s;
        }
        .tc-back:hover {
            border-color:#2563eb;
            color:#2563eb;
            transform:translateX(-2px);
        }

        .tc-card {
            background:var(--c-surface);
            border:1px solid var(--c-border);
            border-radius:20px;
            padding:24px;
            box-shadow:0 10px 28px rgba(15,23,42,.05);
        }

        .tc-field { margin-bottom:18px; }

        .tc-label {
            display:block;
            margin-bottom:6px;
            font-size:13px;
            font-weight:800;
            color:var(--c-text);
        }

        .tc-input {
            width:100%;
            border:1px solid var(--c-border);
            background:var(--c-bg2);
            color:var(--c-text);
            border-radius:12px;
            padding:11px 13px;
            outline:none;
            font-size:14px;
        }

        .tc-input:focus {
            border-color:#2563eb;
            box-shadow:0 0 0 3px rgba(37,99,235,.1);
        }

        .tc-error {
            margin-top:5px;
            color:#dc2626;
            font-size:12px;
            font-weight:700;
        }

        .tc-actions {
            display:flex;
            gap:10px;
            flex-wrap:wrap;
            margin-top:20px;
        }

        .tc-btn {
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

        .tc-btn:hover { opacity:.9; transform:translateY(-1px); }

        .tc-blue { background:#2563eb; color:white; }
        .tc-soft { background:var(--c-bg2); border:1px solid var(--c-border); color:var(--c-text); }
    </style>

    <div class="max-w-3xl">

        {{-- 🔙 Back --}}
        <a href="{{ route('teacher.workspaces.courses.index', $workspace) }}" class="tc-back">
            ← Back to Courses
        </a>

        <div class="tc-card">
            <form method="POST" action="{{ route('teacher.workspaces.courses.store', $workspace) }}">
                @csrf

                <div class="tc-field">
                    <label class="tc-label">Title</label>
                    <input type="text" name="title"
                           value="{{ old('title') }}"
                           class="tc-input">

                    @error('title')
                        <p class="tc-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="tc-field">
                    <label class="tc-label">Order</label>
                    <input type="number" name="order_index"
                           value="{{ old('order_index', 0) }}"
                           class="tc-input">

                    @error('order_index')
                        <p class="tc-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="tc-actions">
                    <button class="tc-btn tc-blue">
                        Create Course
                    </button>

                    <a href="{{ route('teacher.workspaces.courses.index', $workspace) }}" class="tc-btn tc-soft">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.teacher.app>
