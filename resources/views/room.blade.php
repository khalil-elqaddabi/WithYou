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
    --green:    #16a34a;
    --green-l:  #f0fdf4;
    --green-b:  #bbf7d0;
    --red:      #dc2626;
    --red-l:    #fef2f2;
    --red-b:    #fecaca;
    --r: 14px;
}

html.dark {
    --bg:       #0b0d11;
    --surface:  #13161c;
    --surface2: #1a1d24;
    --border:   #22262f;
    --border2:  #2e333d;
    --text:     #f1f3f7;
    --text2:    #8b92a0;
    --text3:    #4b5260;
    --blue-l:   #0f1e3d;
    --blue-b:   #1e3a6e;
    --violet-l: #1a1530;
    --violet-b: #2e2460;
    --green-l:  #0f1f16;
    --green-b:  #1f5d36;
    --red-l:    #2a1416;
    --red-b:    #6b1d24;
}

.rm * { box-sizing: border-box; }

.rm {
    min-height: 100vh;
    background: var(--bg);
    padding: 2.5rem clamp(1rem,4vw,2.5rem);
    font-family: 'Inter', sans-serif;
    color: var(--text);
}

.rm-bread {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: .8rem;
    color: var(--text3);
    margin-bottom: 1rem;
    flex-wrap: wrap;
}

.rm-bread a {
    color: var(--blue);
    text-decoration: none;
    font-weight: 600;
}

.rm-bread a:hover { opacity: .8; }

.rm-bread-sep { color: var(--border2); }

.rm-back {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: .8rem;
    font-weight: 700;
    color: var(--blue);
    text-decoration: none;
    padding: 7px 14px;
    border-radius: 10px;
    background: var(--blue-l);
    border: 1px solid var(--blue-b);
    transition: .2s ease;
    margin-bottom: 1.25rem;
}

.rm-back:hover {
    opacity: .85;
    transform: translateX(-2px);
}

.rm-hero {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 20px;
    overflow: hidden;
    margin-bottom: 1.5rem;
}

.rm-hero-banner {
    height: 10px;
    background: linear-gradient(to right, #2563eb, #7c3aed);
}

.rm-hero-body {
    padding: 1.75rem 2rem;
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 1.5rem;
    flex-wrap: wrap;
}

.rm-hero-tag {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: .72rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .8px;
    color: var(--blue);
    background: var(--blue-l);
    border: 1px solid var(--blue-b);
    padding: 3px 10px;
    border-radius: 99px;
    margin-bottom: .6rem;
}

.rm-hero-title {
    font-family: 'Cal Sans', 'Inter', sans-serif;
    font-size: clamp(1.4rem, 3vw, 1.9rem);
    font-weight: 700;
    color: var(--text);
    line-height: 1.2;
    margin-bottom: .45rem;
}

.rm-hero-sub {
    font-size: .87rem;
    color: var(--text2);
}

.rm-stat-row {
    display: flex;
    gap: .75rem;
    flex-wrap: wrap;
    flex-shrink: 0;
}

.rm-stat {
    background: var(--surface2);
    border: 1px solid var(--border);
    border-radius: 12px;
    padding: .75rem 1.1rem;
    text-align: center;
    min-width: 92px;
}

.rm-stat-val {
    font-family: 'Cal Sans', 'Inter', sans-serif;
    font-size: 1.45rem;
    font-weight: 700;
    color: var(--blue);
    line-height: 1;
}

.rm-stat-label {
    font-size: .7rem;
    font-weight: 600;
    color: var(--text3);
    text-transform: uppercase;
    letter-spacing: .5px;
    margin-top: 4px;
}

.rm-flash {
    padding: .9rem 1rem;
    border-radius: 14px;
    font-size: .9rem;
    font-weight: 600;
    margin-bottom: 1rem;
}

.rm-flash.success {
    background: var(--green-l);
    border: 1px solid var(--green-b);
    color: var(--green);
}

.rm-flash.error {
    background: var(--red-l);
    border: 1px solid var(--red-b);
    color: var(--red);
}

.rm-grid {
    display: grid;
    grid-template-columns: 1.4fr .9fr;
    gap: 1rem;
}

.rm-card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 18px;
    overflow: hidden;
}

.rm-card-top {
    height: 6px;
    background: linear-gradient(to right, #2563eb, #7c3aed);
}

.rm-card-body {
    padding: 1.25rem;
}

.rm-card-head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: .75rem;
    margin-bottom: 1rem;
}

.rm-card-title {
    font-size: 1rem;
    font-weight: 700;
    color: var(--text);
    display: flex;
    align-items: center;
    gap: 8px;
}

.rm-pill {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: var(--violet);
}

.rm-chat-box {
    display: flex;
    flex-direction: column;
    gap: .75rem;
    max-height: 430px;
    overflow-y: auto;
    padding-right: 4px;
    margin-bottom: 1rem;
}

.rm-msg {
    border: 1px solid var(--border);
    border-radius: 14px;
    padding: .85rem .95rem;
    background: var(--surface2);
}

.rm-msg-name {
    font-size: .82rem;
    font-weight: 700;
    color: var(--text);
    margin-bottom: .3rem;
}

.rm-msg-text {
    font-size: .86rem;
    color: var(--text2);
    line-height: 1.55;
    word-break: break-word;
}

.rm-empty {
    text-align: center;
    padding: 2rem 1rem;
    color: var(--text3);
    font-size: .85rem;
    border: 1px dashed var(--border2);
    border-radius: 14px;
    background: var(--surface2);
}

.rm-form {
    display: flex;
    gap: .75rem;
    align-items: stretch;
}

.rm-input {
    flex: 1;
    border: 1px solid var(--border);
    border-radius: 12px;
    padding: .85rem 1rem;
    font-size: .88rem;
    color: var(--text);
    background: var(--surface2);
    outline: none;
}

.rm-input:focus {
    border-color: var(--blue-b);
    box-shadow: 0 0 0 3px rgba(37,99,235,.10);
}

.rm-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    font-size: .82rem;
    font-weight: 700;
    text-decoration: none;
    padding: .8rem 1rem;
    border-radius: 12px;
    border: 1px solid transparent;
    cursor: pointer;
    transition: .2s ease;
    white-space: nowrap;
}

.rm-btn:hover { opacity: .9; }

.rm-btn-blue {
    background: var(--blue);
    color: white;
}

.rm-btn-green {
    background: var(--green);
    color: white;
}

.rm-btn-red {
    background: var(--red);
    color: white;
}

.rm-btn-soft {
    background: var(--surface2);
    color: var(--text2);
    border-color: var(--border);
}

.rm-btn-disabled {
    background: #d1d5db;
    color: #6b7280;
    cursor: not-allowed;
    border-color: #d1d5db;
}

html.dark .rm-btn-disabled {
    background: #2e333d;
    color: #8b92a0;
    border-color: #2e333d;
}

.rm-call-stack {
    display: flex;
    flex-wrap: wrap;
    gap: .75rem;
}

.rm-call-note {
    font-size: .85rem;
    color: var(--text2);
    margin-top: .75rem;
    line-height: 1.5;
}

@media (max-width: 900px) {
    .rm-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 640px) {
    .rm { padding: 1.25rem .9rem; }
    .rm-hero-body { padding: 1.2rem; }
    .rm-card-body { padding: 1rem; }
    .rm-form { flex-direction: column; }
}
</style>

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&family=cal-sans:400" rel="stylesheet"/>

<div class="rm">

    <nav class="rm-bread">
        <a href="{{ auth()->user()->role === 'teacher' ? route('teacher.workspaces.index') : route('student.dashboard') }}">
            Workspaces
        </a>
        <span class="rm-bread-sep">›</span>
        <span style="color:var(--text2)">{{ $workspace->name }} Room</span>
    </nav>

    <a href="{{ auth()->user()->role === 'teacher' ? route('teacher.workspaces.index') : route('student.dashboard') }}"
       class="rm-back">
        ← Back to Workspaces
    </a>

    <div class="rm-hero">
        <div class="rm-hero-banner"></div>
        <div class="rm-hero-body">
            <div>
                <div class="rm-hero-tag">
                    <svg width="7" height="7" viewBox="0 0 7 7" fill="currentColor"><circle cx="3.5" cy="3.5" r="3.5"/></svg>
                    Room
                </div>
                <div class="rm-hero-title">{{ $workspace->name }} Room</div>
                <div class="rm-hero-sub">
                    Subject: {{ $workspace->subject ?? 'No subject' }}
                </div>
            </div>

            <div class="rm-stat-row">
                <div class="rm-stat">
                    <div class="rm-stat-val">{{ $workspace->chatMessages->count() }}</div>
                    <div class="rm-stat-label">Messages</div>
                </div>
                <div class="rm-stat">
                    <div class="rm-stat-val">{{ $workspace->call_active ? 'ON' : 'OFF' }}</div>
                    <div class="rm-stat-label">Call</div>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="rm-flash success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="rm-flash error">
            {{ session('error') }}
        </div>
    @endif

    <div class="rm-grid">

        {{-- CHAT --}}
        <div class="rm-card">
            <div class="rm-card-top"></div>
            <div class="rm-card-body">
                <div class="rm-card-head">
                    <div class="rm-card-title">
                        <span class="rm-pill"></span>
                        General Chat
                    </div>
                </div>

                <div id="chat-box" class="rm-chat-box">
                    @forelse($workspace->chatMessages->sortBy('created_at') as $chat)
                        <div class="rm-msg">
                            <div class="rm-msg-name">
                                {{ $chat->sender->name ?? 'Unknown' }}
                            </div>
                            <div class="rm-msg-text">
                                {{ $chat->message }}
                            </div>
                        </div>
                    @empty
                        <div id="empty-chat-text" class="rm-empty">
                            No messages yet.
                        </div>
                    @endforelse
                </div>

                <form action="{{ route('workspaces.chat.store', $workspace->id) }}" method="POST" class="rm-form">
                    @csrf
                    <input
                        type="text"
                        name="message"
                        placeholder="Write a message..."
                        class="rm-input"
                        required
                    >
                    <button type="submit" class="rm-btn rm-btn-blue">
                        Send
                    </button>
                </form>
            </div>
        </div>

        {{-- VIDEO CALL --}}
        <div class="rm-card">
            <div class="rm-card-top"></div>
            <div class="rm-card-body">
                <div class="rm-card-head">
                    <div class="rm-card-title">
                        <span class="rm-pill" style="background:var(--blue)"></span>
                        Video Call
                    </div>
                </div>

                @if(auth()->user()->role === 'teacher')
                    <div id="teacher-call-wrapper">
                        @if(!$workspace->call_active)
                            <form action="{{ route('teacher.call.start', $workspace->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="rm-btn rm-btn-green">
                                    Start Call
                                </button>
                            </form>
                        @else
                            <div class="rm-call-stack">
                                <a href="{{ route('teacher.call', $workspace->id) }}" class="rm-btn rm-btn-blue">
                                    Open Active Call
                                </a>

                                <form action="{{ route('teacher.call.end', $workspace->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="rm-btn rm-btn-red">
                                        End Call
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                @else
                    <div id="join-call-wrapper">
                        @if($workspace->call_active)
                            <a href="{{ route('student.call', $workspace->id) }}"
                               id="join-call-btn"
                               class="rm-btn rm-btn-green">
                                Join Call
                            </a>
                        @else
                            <button
                                id="join-call-btn"
                                class="rm-btn rm-btn-disabled"
                                disabled>
                                Join Call
                            </button>
                            <p id="call-status-text" class="rm-call-note">
                                The teacher has not started the call yet.
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const chatBox = document.getElementById('chat-box');

    if (chatBox) {
        chatBox.scrollTop = chatBox.scrollHeight;
    }

    window.Echo
        .channel('workspace.{{ $workspace->id }}')

        .listen('.message.sent', (e) => {
            const emptyText = document.getElementById('empty-chat-text');
            if (emptyText) emptyText.remove();

            chatBox.innerHTML += `
                <div class="rm-msg">
                    <div class="rm-msg-name">
                        ${e.message.sender?.name ?? 'User'}
                    </div>
                    <div class="rm-msg-text">
                        ${e.message.message}
                    </div>
                </div>
            `;

            chatBox.scrollTop = chatBox.scrollHeight;
        })

        .listen('.call.status.changed', (e) => {
            const joinWrapper = document.getElementById('join-call-wrapper');
            const teacherWrapper = document.getElementById('teacher-call-wrapper');

            if (joinWrapper) {
                if (e.callActive) {
                    joinWrapper.innerHTML = `
                        <a href="/student/workspaces/{{ $workspace->id }}/call"
                           id="join-call-btn"
                           class="rm-btn rm-btn-green">
                            Join Call
                        </a>
                    `;
                } else {
                    joinWrapper.innerHTML = `
                        <button
                            id="join-call-btn"
                            class="rm-btn rm-btn-disabled"
                            disabled>
                            Join Call
                        </button>
                        <p id="call-status-text" class="rm-call-note">
                            The teacher has not started the call yet.
                        </p>
                    `;
                }
            }

            if (teacherWrapper) {
                if (e.callActive) {
                    teacherWrapper.innerHTML = `
                        <div class="rm-call-stack">
                            <a href="/teacher/workspaces/{{ $workspace->id }}/call"
                               class="rm-btn rm-btn-blue">
                                Open Active Call
                            </a>

                            <form action="/teacher/workspaces/{{ $workspace->id }}/end-call" method="POST">
                                @csrf
                                <button type="submit" class="rm-btn rm-btn-red">
                                    End Call
                                </button>
                            </form>
                        </div>
                    `;
                } else {
                    teacherWrapper.innerHTML = `
                        <form action="/teacher/workspaces/{{ $workspace->id }}/start-call" method="POST">
                            @csrf
                            <button type="submit" class="rm-btn rm-btn-green">
                                Start Call
                            </button>
                        </form>
                    `;
                }
            }
        });
});
</script>

<script>
window.addEventListener('pageshow', function (event) {
    if (event.persisted) {
        window.location.reload();
    }
});
</script>
</x-app-layout>
