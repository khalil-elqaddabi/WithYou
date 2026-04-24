<x-layouts.teacher.app>
    <x-slot name="title">My Workspaces</x-slot>
    <x-slot name="header">My Workspaces</x-slot>
    <x-slot name="subheader">Manage all your teaching spaces</x-slot>

    <style>
        .tw-card { background:var(--c-surface); border:1px solid var(--c-border); border-radius:20px; padding:24px; box-shadow:0 10px 28px rgba(15,23,42,.05); }
        .tw-flash { margin-bottom:16px; padding:14px 16px; border-radius:14px; background:#f0fdf4; border:1px solid #bbf7d0; color:#16a34a; font-weight:700; }
        .tw-top { display:flex; justify-content:space-between; align-items:center; gap:14px; margin-bottom:18px; flex-wrap:wrap; }
        .tw-title { font-size:18px; font-weight:800; color:var(--c-text); }
        .tw-btn { display:inline-flex; align-items:center; justify-content:center; padding:9px 14px; border-radius:12px; font-size:13px; font-weight:800; text-decoration:none; border:0; cursor:pointer; transition:.2s; color:white; }
        .tw-btn:hover { transform:translateY(-1px); opacity:.9; }
        .tw-blue { background:#2563eb; }
        .tw-violet { background:#7c3aed; }
        .tw-yellow { background:#f59e0b; }
        .tw-red { background:#dc2626; }
        .tw-list { display:grid; gap:12px; }
        .tw-item { display:flex; justify-content:space-between; align-items:center; gap:18px; padding:16px; border:1px solid var(--c-border); border-radius:16px; background:var(--c-bg2); }
        .tw-name { font-size:16px; font-weight:800; color:var(--c-text); }
        .tw-sub { margin-top:4px; font-size:14px; color:var(--c-text2); }
        .tw-actions { display:flex; gap:8px; flex-wrap:wrap; }
        .tw-empty { color:var(--c-text2); font-size:14px; }
        .tw-back {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    margin-bottom: 12px;
    padding: 8px 14px;
    border-radius: 12px;
    background: var(--c-bg2);
    border: 1px solid var(--c-border);
    color: var(--c-text);
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
    transition: .2s;
}

.tw-back:hover {
    border-color: #2563eb;
    color: #2563eb;
    transform: translateX(-2px);
}
        @media(max-width:700px){
            .tw-item { flex-direction:column; align-items:flex-start; }
        }
    </style>

    @if (session('success'))
        <div class="tw-flash">
            {{ session('success') }}
        </div>
    @endif
<a href="{{ route('teacher.dashboard') }}" class="tw-back">
    ← Back
</a>
    <div class="tw-card">

        <div class="tw-top">
            <div class="tw-title">Workspace List</div>

            <a href="{{ route('teacher.workspaces.create') }}" class="tw-btn tw-blue">
                Create Workspace
            </a>
        </div>

        @forelse($workspaces as $workspace)
            <div class="tw-list">
                @foreach($workspaces as $workspace)
                    <div class="tw-item">
                        <div>
                            <div class="tw-name">{{ $workspace->name }}</div>
                            <div class="tw-sub">{{ $workspace->subject ?: 'No subject' }}</div>
                        </div>

                        <div class="tw-actions">
                            <a href="{{ route('teacher.workspaces.show', $workspace->id) }}" class="tw-btn tw-blue">
                                View
                            </a>

                            <a href="{{ route('teacher.workspaces.courses.index', $workspace) }}" class="tw-btn tw-violet">
                                Courses
                            </a>

                            <a href="{{ route('teacher.workspaces.edit', $workspace) }}" class="tw-btn tw-yellow">
                                Edit
                            </a>

                            <form action="{{ route('teacher.workspaces.destroy', $workspace) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="tw-btn tw-red" onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @empty
            <p class="tw-empty">No workspaces found.</p>
        @endforelse
    </div>
</x-layouts.teacher.app>
