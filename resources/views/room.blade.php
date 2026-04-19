<x-app-layout>
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-6xl mx-auto px-4 space-y-6">

            {{-- Header --}}
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <h1 class="text-2xl font-bold text-gray-800">
                    {{ $workspace->name }} Room
                </h1>

                <p class="text-sm text-gray-500 mt-2">
                    Subject: {{ $workspace->subject ?? 'No subject' }}
                </p>
            </div>
<a href="{{ auth()->user()->role === 'teacher' ? route('teacher.workspaces.index') : route('student.dashboard') }}"
   class="inline-flex items-center bg-gray-200 text-gray-700 px-4 py-2 rounded-xl hover:bg-gray-300">
    ← Back to Workspaces
</a>

            {{-- Flash Messages --}}
            @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 rounded-xl px-4 py-3">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-50 border border-red-200 text-red-700 rounded-xl px-4 py-3">
                    {{ session('error') }}
                </div>
            @endif

            {{-- General Chat --}}
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">
                    General Chat
                </h2>

                <div id="chat-box" class="space-y-3 mb-4 max-h-80 overflow-y-auto">
                    @forelse($workspace->chatMessages->sortBy('created_at') as $chat)
                        <div class="border rounded-xl p-3">
                            <p class="text-sm font-semibold text-gray-800">
                                {{ $chat->sender->name ?? 'Unknown' }}
                            </p>
                            <p class="text-sm text-gray-600 mt-1">
                                {{ $chat->message }}
                            </p>
                        </div>
                    @empty
                        <p id="empty-chat-text" class="text-sm text-gray-500">
                            No messages yet.
                        </p>
                    @endforelse
                </div>

                <form action="{{ route('workspaces.chat.store', $workspace->id) }}" method="POST" class="flex gap-3">
                    @csrf
                    <input
                        type="text"
                        name="message"
                        placeholder="Write a message..."
                        class="flex-1 border rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400"
                        required
                    >
                    <button
                        type="submit"
                        class="bg-indigo-600 text-white px-4 py-2 rounded-xl hover:bg-indigo-700">
                        Send
                    </button>
                </form>
            </div>

            {{-- Video Call --}}
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">
                    Video Call
                </h2>

                @if(auth()->user()->role === 'teacher')
                    <div id="teacher-call-wrapper">
                        @if(!$workspace->call_active)
                            <form action="{{ route('teacher.call.start', $workspace->id) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="inline-flex items-center bg-green-600 text-white px-4 py-2 rounded-xl hover:bg-green-700">
                                    Start Call
                                </button>
                            </form>
                        @else
                            <div class="flex items-center gap-3">
                                <a href="{{ route('teacher.call', $workspace->id) }}"
                                   class="inline-flex items-center bg-indigo-600 text-white px-4 py-2 rounded-xl hover:bg-indigo-700">
                                    Open Active Call
                                </a>

                                <form action="{{ route('teacher.call.end', $workspace->id) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="inline-flex items-center bg-red-600 text-white px-4 py-2 rounded-xl hover:bg-red-700">
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
                               class="inline-flex items-center bg-green-600 text-white px-4 py-2 rounded-xl hover:bg-green-700">
                                Join Call
                            </a>
                        @else
                            <button
                                id="join-call-btn"
                                class="inline-flex items-center bg-gray-300 text-gray-600 px-4 py-2 rounded-xl cursor-not-allowed"
                                disabled>
                                Join Call
                            </button>
                            <p id="call-status-text" class="text-sm text-gray-500 mt-2">
                                The teacher has not started the call yet.
                            </p>
                        @endif
                    </div>
                @endif
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
                    <div class="border rounded-xl p-3">
                        <p class="text-sm font-semibold text-gray-800">
                            ${e.message.sender?.name ?? 'User'}
                        </p>
                        <p class="text-sm text-gray-600 mt-1">
                            ${e.message.message}
                        </p>
                    </div>
                `;

                chatBox.scrollTop = chatBox.scrollHeight;
            })

            .listen('.call.status.changed', (e) => {
                const joinWrapper = document.getElementById('join-call-wrapper');
                const teacherWrapper = document.getElementById('teacher-call-wrapper');

                // Student UI
                if (joinWrapper) {
                    if (e.callActive) {
                        joinWrapper.innerHTML = `
                            <a href="/student/workspaces/{{ $workspace->id }}/call"
                               id="join-call-btn"
                               class="inline-flex items-center bg-green-600 text-white px-4 py-2 rounded-xl hover:bg-green-700">
                                Join Call
                            </a>
                        `;
                    } else {
                        joinWrapper.innerHTML = `
                            <button
                                id="join-call-btn"
                                class="inline-flex items-center bg-gray-300 text-gray-600 px-4 py-2 rounded-xl cursor-not-allowed"
                                disabled>
                                Join Call
                            </button>
                            <p id="call-status-text" class="text-sm text-gray-500 mt-2">
                                The teacher has not started the call yet.
                            </p>
                        `;
                    }
                }

                // Teacher UI
                if (teacherWrapper) {
                    if (e.callActive) {
                        teacherWrapper.innerHTML = `
                            <div class="flex items-center gap-3">
                                <a href="/teacher/workspaces/{{ $workspace->id }}/call"
                                   class="inline-flex items-center bg-indigo-600 text-white px-4 py-2 rounded-xl hover:bg-indigo-700">
                                    Open Active Call
                                </a>

                                <form action="/teacher/workspaces/{{ $workspace->id }}/end-call" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="inline-flex items-center bg-red-600 text-white px-4 py-2 rounded-xl hover:bg-red-700">
                                        End Call
                                    </button>
                                </form>
                            </div>
                        `;
                    } else {
                        teacherWrapper.innerHTML = `
                            <form action="/teacher/workspaces/{{ $workspace->id }}/start-call" method="POST">
                                @csrf
                                <button type="submit"
                                    class="inline-flex items-center bg-green-600 text-white px-4 py-2 rounded-xl hover:bg-green-700">
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
