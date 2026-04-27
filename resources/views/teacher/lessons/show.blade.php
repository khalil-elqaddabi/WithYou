<x-layouts.teacher.app>
    <x-slot name="title">{{ $lesson->title }}</x-slot>
    <x-slot name="header">{{ $lesson->title }}</x-slot>
    <x-slot name="subheader">Lesson details</x-slot>

    <style>
        .lesson-wrap {
            max-width: 1200px;
            margin: 0 auto;
        }

        .lesson-back {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 16px;
            padding: 9px 14px;
            border-radius: 12px;
            background: var(--c-bg2);
            border: 1px solid var(--c-border);
            color: var(--c-text);
            font-size: 13px;
            font-weight: 800;
            text-decoration: none;
            transition: .2s;
        }

        .lesson-back:hover {
            border-color: #2563eb;
            color: #2563eb;
            transform: translateX(-2px);
        }

        .lesson-card {
            overflow: hidden;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 22px;
            box-shadow: 0 12px 30px rgba(15, 23, 42, .08);
        }

        .lesson-cover {
            width: 100%;
            height: 360px;
            object-fit: cover;
            display: block;
            background: #f8fafc;
            border-bottom: 1px solid #e5e7eb;
        }

        .lesson-content {
            padding: 28px;
        }

        .lesson-badge {
            display: inline-flex;
            padding: 6px 12px;
            margin-bottom: 14px;
            border-radius: 999px;
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            color: #2563eb;
            font-size: 11px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: .14em;
        }

        .lesson-title {
            margin: 0;
            font-size: 34px;
            line-height: 1.15;
            font-weight: 900;
            color: #111827;
        }

        .lesson-desc {
            margin: 12px 0 0;
            color: #374151;
            font-size: 15px;
            line-height: 1.8;
        }

        .lesson-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 22px;
        }

        .lesson-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 11px 16px;
            border-radius: 13px;
            font-size: 14px;
            font-weight: 900;
            text-decoration: none;
            transition: .2s;
            border: 0;
            cursor: pointer;
        }

        .lesson-btn:hover {
            transform: translateY(-1px);
            opacity: .9;
        }

        .lesson-blue {
            background: #2563eb;
            color: white;
        }

        .lesson-yellow {
            background: #f59e0b;
            color: white;
        }

        .lesson-soft {
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            color: #111827;
        }

        .lesson-extra {
            display: grid;
            gap: 14px;
            margin-top: 24px;
        }

        .lesson-box {
            padding: 18px 20px;
            border-radius: 18px;
            border: 1px solid #e5e7eb;
            background: #ffffff;
        }

        .lesson-box-title {
            margin: 0 0 10px;
            color: #111827;
            font-size: 15px;
            font-weight: 900;
        }

        .lesson-link {
            color: #2563eb;
            font-weight: 800;
            text-decoration: none;
        }

        .lesson-link:hover {
            text-decoration: underline;
        }

        .lesson-file-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 14px;
            padding: 14px 16px;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            background: #f8fafc;
        }

        .lesson-file-name {
            color: #111827;
            font-weight: 800;
            word-break: break-word;
        }

        .lesson-body {
            margin-top: 20px;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 12px 30px rgba(15, 23, 42, .06);
        }

        .lesson-section {
            padding: 24px 28px;
            background: #ffffff;
        }

        .lesson-section+.lesson-section {
            border-top: 1px solid #e5e7eb;
        }

        .lesson-section-title {
            margin: 0 0 14px;
            font-size: 18px;
            font-weight: 900;
            color: #111827;
        }

        .lesson-section-text {
            margin: 0;
            color: #374151;
            font-size: 15px;
            line-height: 1.9;
            white-space: pre-line;
            word-break: break-word;
        }

        @media(max-width:640px) {

            .lesson-content,
            .lesson-section {
                padding: 18px;
            }

            .lesson-cover {
                height: 230px;
            }

            .lesson-title {
                font-size: 28px;
            }

            .lesson-file-row {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>

    <div class="lesson-wrap">
        <a href="{{ route('teacher.courses.lessons.index', [$workspace, $course]) }}" class="lesson-back">
            ← Back to Lessons
        </a>

        <section class="lesson-card">
            @if ($lesson->image)
                <img src="{{ asset('storage/' . $lesson->image) }}" alt="{{ $lesson->title }}" class="lesson-cover">
            @endif

            <div class="lesson-content">
                <div class="lesson-badge">Learning Content</div>

                <h1 class="lesson-title">{{ $lesson->title }}</h1>

                @if ($lesson->description)
                    <p class="lesson-desc">{{ $lesson->description }}</p>
                @endif

                <div class="lesson-actions">
                    <a href="{{ route('teacher.courses.lessons.edit', [$workspace, $course, $lesson]) }}"
                        class="lesson-btn lesson-yellow">
                        Edit Lesson
                    </a>

                    <a href="{{ route('teacher.courses.lessons.index', [$workspace, $course]) }}"
                        class="lesson-btn lesson-soft">
                        Back
                    </a>
                </div>
                @if ($lesson->resources->count())
                    <div class="lesson-extra">
                        @foreach ($lesson->resources as $resource)
                            <div class="lesson-box">
                                <h3 class="lesson-box-title">{{ $resource->title }}</h3>

                                @if ($resource->type === 'link')
                                    <a href="{{ $resource->url }}" target="_blank" class="lesson-link">
                                        Open Link →
                                    </a>
                                @endif

                                @if ($resource->type === 'file')
                                    <div class="lesson-file-row">
                                        <div class="lesson-file-name">
                                            {{ basename($resource->path) }}
                                        </div>

                                        <a href="{{ asset('storage/' . $resource->path) }}" target="_blank"
                                            class="lesson-link">
                                            Open File →
                                        </a>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>

        <div class="lesson-body">
            @if ($lesson->description)
                <section class="lesson-section">
                    <h3 class="lesson-section-title">Description</h3>
                    <p class="lesson-section-text">{{ $lesson->description }}</p>
                </section>
            @endif

            @if ($lesson->subject)
                <section class="lesson-section">
                    <h3 class="lesson-section-title">Subject</h3>
                    <div class="lesson-section-text">{{ $lesson->subject }}</div>
                </section>
            @endif
        </div>
    </div>
</x-layouts.teacher.app>
