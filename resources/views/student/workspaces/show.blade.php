<x-app-layout>
    <style>
        .s-card {
            background: var(--c-surface);
            border: 1px solid var(--c-border);
            border-radius: 22px;
            padding: 24px;
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.05);
        }

        .s-title {
            font-size: 28px;
            font-weight: 800;
            color: var(--c-text);
        }

        .s-text {
            color: var(--c-text2);
            font-size: 14px;
        }

        .s-link {
            font-size: 14px;
            font-weight: 600;
            color: #2563eb;
            text-decoration: none;
        }

        .s-link:hover {
            text-decoration: underline;
        }

        html.dark .s-link {
            color: #60a5fa;
        }

        .s-btn {
            display: inline-block;
            background: linear-gradient(to right, #2563eb, #1d4ed8);
            color: white;
            padding: 10px 18px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 14px;
            text-decoration: none;
            transition: .2s ease;
        }

        .s-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(37, 99, 235, 0.25);
        }

        .course-card {
            border: 1px solid var(--c-border);
            border-radius: 18px;
            padding: 18px;
            background: var(--c-bg2);
            transition: .2s ease;
        }

        .course-card:hover {
            transform: translateY(-4px);
            border-color: #2563eb;
            box-shadow: 0 14px 28px rgba(15, 23, 42, 0.08);
        }

        .course-title {
            font-weight: 700;
            color: var(--c-text);
        }

        .course-meta {
            font-size: 13px;
            color: var(--c-text3);
            margin-top: 6px;
        }

        .course-link {
            display: inline-block;
            margin-top: 10px;
            font-size: 14px;
            font-weight: 700;
            color: #2563eb;
            text-decoration: none;
        }

        html.dark .course-link {
            color: #60a5fa;
        }

        .course-link:hover {
            text-decoration: underline;
        }
    </style>

    <div class="py-10">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- HEADER --}}
            <div class="s-card">
                <h1 class="s-title">
                    {{ $workspace->name }}
                </h1>

                <div class="mt-3 space-y-1">
                    <p class="s-text">
                        📚 Subject: {{ $workspace->subject ?? 'No subject' }}
                    </p>

                    <p class="s-text">
                        👨‍🏫 Teacher: {{ $workspace->teacher->name ?? 'Unknown' }}
                    </p>
                </div>
            </div>

            {{-- BACK --}}
            <div>
                <a href="{{ route('student.dashboard') }}" class="s-link">
                    ← Back to Dashboard
                </a>
            </div>

            {{-- COURSES --}}
            <div class="s-card">

                <div class="flex items-center justify-between mb-5">
                    <h2 class="text-lg font-bold" style="color: var(--c-text);">
                        Courses
                    </h2>

                    <a href="{{ route('student.room', $workspace->id) }}"
                       class="s-btn">
                        Enter Room
                    </a>
                </div>

                @if ($workspace->courses->count())
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        @foreach ($workspace->courses as $course)
                            <div class="course-card">
                                <h3 class="course-title">
                                    {{ $course->title }}
                                </h3>

                                <p class="course-meta">
                                    Order: {{ $course->order_index }}
                                </p>

                                <a href="{{ route('student.courses.show', [$workspace->id, $course->id]) }}"
                                   class="course-link">
                                    Open Course →
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="s-text">
                        No courses available in this workspace yet.
                    </p>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
