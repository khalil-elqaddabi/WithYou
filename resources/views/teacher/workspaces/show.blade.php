<x-app-layout>
<style>
:root {
    --bg:#f0f2f5; --surface:#fff; --surface2:#f8f9fb; --border:#e8eaed;
    --text:#0f1117; --text2:#6b7280; --text3:#9ca3af;
    --blue:#2563eb; --blue-l:#eff4ff; --blue-b:#bfdbfe;
    --violet:#7c3aed; --green:#16a34a; --red:#dc2626;
}
html.dark {
    --bg:#0b0d11; --surface:#13161c; --surface2:#1a1d24; --border:#22262f;
    --text:#f1f3f7; --text2:#8b92a0; --text3:#4b5260;
    --blue-l:#0f1e3d; --blue-b:#1e3a6e;
}
.ws { min-height:100vh; background:var(--bg); padding:2.5rem clamp(1rem,4vw,2.5rem); color:var(--text); font-family:Inter,sans-serif; }
.ws-wrap { max-width:1100px; margin:0 auto; display:grid; gap:1.2rem; }
.ws-card { background:var(--surface); border:1px solid var(--border); border-radius:20px; overflow:hidden; }
.ws-top { height:10px; background:linear-gradient(to right,#2563eb,#7c3aed); }
.ws-body { padding:1.6rem; }
.ws-tag { display:inline-flex; font-size:.72rem; font-weight:800; letter-spacing:.8px; text-transform:uppercase; color:var(--blue); background:var(--blue-l); border:1px solid var(--blue-b); padding:4px 10px; border-radius:99px; margin-bottom:.8rem; }
.ws-title { font-size:clamp(1.4rem,3vw,2rem); font-weight:800; margin:0 0 .5rem; color:var(--text); }
.ws-sub { color:var(--text2); font-size:.9rem; }
.ws-actions { display:flex; flex-wrap:wrap; gap:.7rem; margin-top:1.2rem; }
.ws-btn { display:inline-flex; align-items:center; justify-content:center; padding:.75rem 1rem; border-radius:12px; text-decoration:none; border:0; cursor:pointer; font-size:.85rem; font-weight:800; transition:.2s; }
.ws-btn:hover { opacity:.9; transform:translateY(-1px); }
.ws-btn-blue { background:var(--blue); color:white; }
.ws-btn-green { background:var(--green); color:white; }
.ws-btn-red { background:var(--red); color:white; }
.ws-btn-soft { background:var(--surface2); color:var(--text); border:1px solid var(--border); }
.ws-section-title { font-size:1rem; font-weight:800; color:var(--text); margin:0 0 1rem; display:flex; gap:8px; align-items:center; }
.ws-dot { width:8px; height:8px; border-radius:50%; background:var(--violet); }
.ws-flash { padding:.85rem 1rem; border-radius:14px; font-size:.9rem; font-weight:700; margin-bottom:1rem; }
.ws-flash.success { background:#f0fdf4; color:#16a34a; border:1px solid #bbf7d0; }
.ws-flash.error { background:#fef2f2; color:#dc2626; border:1px solid #fecaca; }
.ws-form { display:flex; gap:.7rem; flex-wrap:wrap; }
.ws-input { flex:1; min-width:240px; border:1px solid var(--border); background:var(--surface2); color:var(--text); border-radius:12px; padding:.8rem 1rem; outline:none; }
.ws-input:focus { border-color:var(--blue-b); box-shadow:0 0 0 3px rgba(37,99,235,.1); }
.student-list { display:grid; gap:.75rem; }
.student-item { display:flex; justify-content:space-between; align-items:center; gap:1rem; padding:1rem; border:1px solid var(--border); border-radius:16px; background:var(--surface2); }
.student-name { font-weight:800; color:var(--text); }
.student-email { font-size:.85rem; color:var(--text2); margin-top:3px; }
.empty { color:var(--text3); font-size:.9rem; }
@media(max-width:640px){ .student-item{align-items:flex-start; flex-direction:column;} .ws-form{flex-direction:column;} .ws-input{min-width:0;width:100%;} }
</style>

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&family=cal-sans:400" rel="stylesheet"/>

<div class="ws">
    <div class="ws-wrap">

        <div class="ws-card">
            <div class="ws-top"></div>
            <div class="ws-body">
                <div class="ws-tag">Workspace</div>
                <h1 class="ws-title">{{ $workspace->name }}</h1>
                <p class="ws-sub">Subject: {{ $workspace->subject ?: 'No subject' }}</p>

                <div class="ws-actions">
                    <a href="{{ route('teacher.workspaces.index') }}" class="ws-btn ws-btn-soft">
                        ← Back
                    </a>

                    <a href="{{ route('teacher.room', $workspace->id) }}" class="ws-btn ws-btn-green">
                        Enter Room →
                    </a>
                </div>
            </div>
        </div>

        <div class="ws-card">
            <div class="ws-body">
                <h2 class="ws-section-title"><span class="ws-dot"></span>Add Student by Email</h2>

                @if (session('success'))
                    <div class="ws-flash success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                    <div class="ws-flash error">{{ session('error') }}</div>
                @endif

                <form action="{{ url('/teacher/workspaces/' . $workspace->id . '/students') }}" method="POST" class="ws-form">
                    @csrf
                    <input type="email" name="email" placeholder="Enter student email" required class="ws-input">
                    <button type="submit" class="ws-btn ws-btn-blue">Add Student</button>
                </form>
            </div>
        </div>

        <div class="ws-card">
            <div class="ws-body">
                <h2 class="ws-section-title"><span class="ws-dot"></span>Students</h2>

                @if ($workspace->students->count())
                    <div class="student-list">
                        @foreach ($workspace->students as $student)
                            <div class="student-item">
                                <div>
                                    <div class="student-name">{{ $student->name }}</div>
                                    <div class="student-email">{{ $student->email }}</div>
                                </div>

                                <form action="{{ url('/teacher/workspaces/' . $workspace->id . '/students/' . $student->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="ws-btn ws-btn-red">
                                        Remove
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="empty">No students in this workspace yet.</p>
                @endif
            </div>
        </div>

    </div>
</div>
</x-app-layout>
