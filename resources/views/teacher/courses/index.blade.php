<x-layouts.teacher.app>
    <x-slot name="title">Courses</x-slot>
    <x-slot name="header">Courses - {{ $workspace->name }}</x-slot>
    <x-slot name="subheader">Manage courses inside this workspace</x-slot>

    <style>
        .tc-back {
            display:inline-flex; align-items:center; gap:6px;
            margin-bottom:14px; padding:8px 14px;
            border-radius:12px; background:var(--c-bg2);
            border:1px solid var(--c-border);
            color:var(--c-text); font-size:13px; font-weight:800;
            text-decoration:none; transition:.2s;
        }
        .tc-back:hover { border-color:#2563eb; color:#2563eb; transform:translateX(-2px); }

        .tc-flash {
            margin-bottom:16px; padding:14px 16px;
            border-radius:14px; background:#f0fdf4;
            border:1px solid #bbf7d0; color:#16a34a; font-weight:800;
        }

        .tc-top {
            display:flex; justify-content:space-between;
            align-items:center; gap:12px; flex-wrap:wrap;
            margin-bottom:18px;
        }

        .tc-btn {
            display:inline-flex; align-items:center; justify-content:center;
            padding:9px 14px; border-radius:12px;
            font-size:13px; font-weight:800; text-decoration:none;
            border:0; cursor:pointer; color:white; transition:.2s;
        }
        .tc-btn:hover { opacity:.9; transform:translateY(-1px); }

        .tc-blue { background:#2563eb; }
        .tc-violet { background:#7c3aed; }
        .tc-yellow { background:#f59e0b; }
        .tc-red { background:#dc2626; }

        .tc-list {
            display:grid; gap:12px;
        }

        .tc-item {
            display:flex; justify-content:space-between; align-items:center;
            gap:18px; padding:16px;
            border:1px solid var(--c-border);
            border-radius:16px;
            background:var(--c-surface);
            box-shadow:0 6px 18px rgba(15,23,42,.04);
            transition:.2s;
        }

        .tc-item:hover {
            transform:translateY(-2px);
            box-shadow:0 10px 26px rgba(15,23,42,.08);
        }

        .tc-title { font-size:16px; font-weight:900; color:var(--c-text); }
        .tc-sub { margin-top:4px; font-size:13px; color:var(--c-text2); }

        .tc-actions { display:flex; gap:8px; flex-wrap:wrap; }

        .tc-empty {
            padding:20px;
            border-radius:16px;
            background:var(--c-surface);
            border:1px solid var(--c-border);
            color:var(--c-text2);
        }

        @media(max-width:700px) {
            .tc-item { flex-direction:column; align-items:flex-start; }
        }
    </style>

    @if(session('success'))
        <div class="tc-flash">
            {{ session('success') }}
        </div>
    @endif

    <div class="tc-top">
        <a href="{{ route('teacher.workspaces.index') }}" class="tc-back">
            ← Back to Workspaces
        </a>

        <a href="{{ route('teacher.workspaces.courses.create', $workspace) }}" class="tc-btn tc-blue">
            Create Course
        </a>
    </div>

    @if($courses->count())
        <div class="tc-list">
            @foreach($courses as $course)
                <div class="tc-item">
                    <div>
                        <div class="tc-title">{{ $course->title }}</div>
                        <div class="tc-sub">Order: {{ $course->order_index }}</div>
                    </div>

                    <div class="tc-actions">
                        <a href="{{ route('teacher.courses.lessons.index', [$workspace, $course]) }}" class="tc-btn tc-violet">
                            Lessons
                        </a>

                        <a href="{{ route('teacher.workspaces.courses.edit', [$workspace, $course]) }}" class="tc-btn tc-yellow">
                            Edit
                        </a>

                        <form action="{{ route('teacher.workspaces.courses.destroy', [$workspace, $course]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="tc-btn tc-red" onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="tc-empty">
            No courses found.
        </div>
    @endif
</x-layouts.teacher.app>
