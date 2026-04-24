<x-layouts.teacher.app>
    <x-slot name="title">Create Workspace</x-slot>
    <x-slot name="header">Create Workspace</x-slot>
    <x-slot name="subheader">Add a new workspace for your students</x-slot>

    <style>
        .tw-card { background:var(--c-surface); border:1px solid var(--c-border); border-radius:20px; padding:24px; box-shadow:0 10px 28px rgba(15,23,42,.05); }
        .tw-label { font-size:13px; font-weight:700; color:var(--c-text); margin-bottom:6px; display:block; }
        .tw-input { width:100%; border:1px solid var(--c-border); border-radius:12px; padding:10px 12px; background:var(--c-bg2); color:var(--c-text); outline:none; }
        .tw-input:focus { border-color:#2563eb; box-shadow:0 0 0 3px rgba(37,99,235,.1); }
        .tw-error { color:#dc2626; font-size:12px; margin-top:4px; }
        .tw-actions { display:flex; gap:10px; margin-top:16px; flex-wrap:wrap; }

        .tw-btn {
            padding:10px 16px;
            border-radius:12px;
            font-size:13px;
            font-weight:800;
            border:0;
            cursor:pointer;
            text-decoration:none;
            display:inline-flex;
            align-items:center;
            justify-content:center;
            transition:.2s;
        }

        .tw-btn:hover { transform:translateY(-1px); opacity:.9; }

        .tw-blue { background:#2563eb; color:white; }
        .tw-soft { background:var(--c-bg2); border:1px solid var(--c-border); color:var(--c-text); }

        .tw-back {
            display:inline-flex;
            align-items:center;
            gap:6px;
            margin-bottom:12px;
            padding:8px 14px;
            border-radius:12px;
            background:var(--c-bg2);
            border:1px solid var(--c-border);
            color:var(--c-text);
            font-size:13px;
            font-weight:700;
            text-decoration:none;
        }

        .tw-back:hover {
            border-color:#2563eb;
            color:#2563eb;
            transform:translateX(-2px);
        }
    </style>

    {{-- 🔙 Back --}}
    <a href="{{ route('teacher.workspaces.index') }}" class="tw-back">
        ← Back to Workspaces
    </a>

    <div class="max-w-3xl">
        <div class="tw-card">

            <form method="POST" action="{{ route('teacher.workspaces.store') }}">
                @csrf

                <div class="mb-4">
                    <label class="tw-label">Name</label>
                    <input type="text" name="name" class="tw-input" value="{{ old('name') }}">

                    @error('name')
                        <p class="tw-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="tw-label">Subject</label>
                    <textarea name="subject" class="tw-input">{{ old('subject') }}</textarea>

                    @error('subject')
                        <p class="tw-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="tw-actions">
                    <button class="tw-btn tw-blue">
                        Create Workspace
                    </button>

                    <a href="{{ route('teacher.workspaces.index') }}" class="tw-btn tw-soft">
                        Cancel
                    </a>
                </div>
            </form>

        </div>
    </div>
</x-layouts.teacher.app>
