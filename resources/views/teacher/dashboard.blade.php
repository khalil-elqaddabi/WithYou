<x-layouts.teacher.app>
    <x-slot name="title">Teacher Dashboard</x-slot>
    <x-slot name="header">Teacher Dashboard</x-slot>
    <x-slot name="subheader">Welcome back, {{ auth()->user()->name }}</x-slot>

    <style>
        .t-card {
            background: var(--c-surface);
            border: 1px solid var(--c-border);
            border-radius: 20px;
            padding: 24px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.06);
        }

        .t-title {
            color: var(--c-text2);
            font-size: 14px;
            font-weight: 600;
        }

        .t-value {
            margin-top: 8px;
            font-size: 32px;
            line-height: 1;
            font-weight: 800;
        }

        .t-value.blue { color: #2563eb; }
        .t-value.violet { color: #7c3aed; }
        .t-value.cyan { color: #0891b2; }
        .t-value.green { color: #16a34a; }

        html.dark .t-value.blue { color: #60a5fa; }
        html.dark .t-value.violet { color: #a78bfa; }
        html.dark .t-value.cyan { color: #22d3ee; }
        html.dark .t-value.green { color: #4ade80; }

        .t-section-title {
            color: var(--c-text);
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 16px;
        }

        .t-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 16px;
            border-radius: 12px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
            transition: .2s ease;
            color: white;
        }

        .t-btn-blue {
            background: #2563eb;
        }

        .t-btn-blue:hover {
            background: #1d4ed8;
        }

        .t-btn-violet {
            background: #7c3aed;
        }

        .t-btn-violet:hover {
            background: #6d28d9;
        }

        .t-link {
            color: #2563eb;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
        }

        .t-link:hover {
            text-decoration: underline;
        }

        html.dark .t-link {
            color: #60a5fa;
        }

        .t-item {
            padding: 16px 0;
            border-bottom: 1px solid var(--c-border);
        }

        .t-item:last-child {
            border-bottom: 0;
            padding-bottom: 0;
        }

        .t-item:first-child {
            padding-top: 0;
        }

        .t-item-title {
            color: var(--c-text);
            font-weight: 700;
        }

        .t-item-text {
            margin-top: 4px;
            color: var(--c-text2);
            font-size: 14px;
        }
    </style>

    <div class="space-y-8">

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">
            <div class="t-card">
                <p class="t-title">Total Workspaces</p>
                <h3 class="t-value blue">{{ $totalWorkspaces }}</h3>
            </div>

            <div class="t-card">
                <p class="t-title">Total Courses</p>
                <h3 class="t-value violet">{{ $totalCourses }}</h3>
            </div>

            <div class="t-card">
                <p class="t-title">Total Lessons</p>
                <h3 class="t-value cyan">{{ $totalLessons }}</h3>
            </div>

            <div class="t-card">
                <p class="t-title">Total Students</p>
                <h3 class="t-value green">{{ $totalStudents }}</h3>
            </div>
        </div>

        <div class="t-card">
            <h3 class="t-section-title">Quick Actions</h3>

            <div class="flex flex-wrap gap-3">
                <a href="{{ route('teacher.workspaces.create') }}" class="t-btn t-btn-blue">
                    Create Workspace
                </a>

                <a href="{{ route('teacher.workspaces.index') }}" class="t-btn t-btn-violet">
                    View Workspaces
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">
            <div class="t-card">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="t-section-title" style="margin-bottom:0;">Recent Workspaces</h3>
                    <a href="{{ route('teacher.workspaces.index') }}" class="t-link">
                        View all
                    </a>
                </div>

                @forelse($recentWorkspaces as $workspace)
                    <div class="t-item">
                        <h4 class="t-item-title">{{ $workspace->name }}</h4>
                        <p class="t-item-text">
                            {{ $workspace->subject ?: 'No subject' }}
                        </p>
                    </div>
                @empty
                    <p class="t-item-text">No workspaces yet.</p>
                @endforelse
            </div>

            <div class="t-card">
                <h3 class="t-section-title">Recent Lessons</h3>

                @forelse($recentLessons as $lesson)
                    <div class="t-item">
                        <h4 class="t-item-title">{{ $lesson->title }}</h4>
                        <p class="t-item-text">
                            {{ \Illuminate\Support\Str::limit($lesson->description, 60) }}
                        </p>
                    </div>
                @empty
                    <p class="t-item-text">No lessons yet.</p>
                @endforelse
            </div>
        </div>

    </div>
</x-layouts.teacher.app>
