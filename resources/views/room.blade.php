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

            {{-- Success / Error Messages --}}
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
                        class="bg-indigo-600 text-white px-4 py-2 rounded-xl hover:bg-indigo-700"
                    >
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
                    <a href="{{ route('teacher.call', $workspace->id) }}"
                       class="inline-flex items-center bg-green-600 text-white px-4 py-2 rounded-xl hover:bg-green-700">
                        Start Call
                    </a>
                @else
                    <a href="{{ route('student.call', $workspace->id) }}"
                       class="inline-flex items-center bg-indigo-600 text-white px-4 py-2 rounded-xl hover:bg-indigo-700">
                        Join Call
                    </a>
                @endif
            </div>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const chatBox = document.getElementById('chat-box');

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
                });

            chatBox.scrollTop = chatBox.scrollHeight;
        });
    </script>
</x-app-layout>
