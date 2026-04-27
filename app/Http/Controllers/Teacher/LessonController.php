<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Workspace;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index(Workspace $workspace, Course $course)
    {
        abort_if($workspace->teacher_id !== auth()->id(), 403);
        abort_if($course->workspace_id !== $workspace->id, 404);

        $lessons = $course->lessons()->latest()->get();

        return view('teacher.lessons.index', compact('workspace', 'course', 'lessons'));
    }

    public function create(Workspace $workspace, Course $course)
    {
        abort_if($workspace->teacher_id !== auth()->id(), 403);
        abort_if($course->workspace_id !== $workspace->id, 404);

        return view('teacher.lessons.create', compact('workspace', 'course'));
    }

    public function store(Request $request, Workspace $workspace, Course $course)
    {
        abort_if($workspace->teacher_id !== auth()->id(), 403);
        abort_if($course->workspace_id !== $workspace->id, 404);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'subject' => 'nullable|string',
            'image' => 'nullable|image|max:4096',

            'resources' => 'nullable|array',
            'resources.*.title' => 'nullable|string|max:255',
            'resources.*.type' => 'nullable|in:link,file',
            'resources.*.url' => 'nullable|url',
            'resources.*.file' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,zip|max:20480',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('lessons/images', 'public');
        }

        $lesson = $course->lessons()->create([
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'subject' => $data['subject'] ?? null,
            'image' => $data['image'] ?? null,
        ]);

        foreach ($request->resources ?? [] as $resource) {
            if (empty($resource['title']) || empty($resource['type'])) {
                continue;
            }

            if ($resource['type'] === 'link' && !empty($resource['url'])) {
                $lesson->resources()->create([
                    'title' => $resource['title'],
                    'type' => 'link',
                    'url' => $resource['url'],
                ]);
            }

            if ($resource['type'] === 'file' && isset($resource['file'])) {
                $lesson->resources()->create([
                    'title' => $resource['title'],
                    'type' => 'file',
                    'path' => $resource['file']->store('lessons/files', 'public'),
                ]);
            }
        }

        return redirect()->route('teacher.courses.lessons.index', [$workspace, $course])
            ->with('success', 'Lesson created successfully.');
    }


    public function show(Workspace $workspace, Course $course, Lesson $lesson)
    {
        abort_if($workspace->teacher_id !== auth()->id(), 403);
        abort_if($course->workspace_id !== $workspace->id, 404);
        abort_if($lesson->course_id !== $course->id, 404);

        $lesson->load('resources');

        return view('teacher.lessons.show', compact('workspace', 'course', 'lesson'));
    }

    public function edit(Workspace $workspace, Course $course, Lesson $lesson)
    {
        abort_if($workspace->teacher_id !== auth()->id(), 403);
        abort_if($course->workspace_id !== $workspace->id, 404);
        abort_if($lesson->course_id !== $course->id, 404);

        $lesson->load('resources');

        return view('teacher.lessons.edit', compact('workspace', 'course', 'lesson'));
    }

    public function update(Request $request, Workspace $workspace, Course $course, Lesson $lesson)
    {
        abort_if($workspace->teacher_id !== auth()->id(), 403);
        abort_if($course->workspace_id !== $workspace->id, 404);
        abort_if($lesson->course_id !== $course->id, 404);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'subject' => 'nullable|string',
            'image' => 'nullable|image|max:4096',

            'resources' => 'nullable|array',
            'resources.*.title' => 'nullable|string|max:255',
            'resources.*.type' => 'nullable|in:link,file',
            'resources.*.url' => 'nullable|url',
            'resources.*.file' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,zip|max:20480',
        ]);

        $lesson->resources()->delete();

        if ($request->has('resources')) {
            foreach ($request->resources as $key => $resource) {

                if (empty($resource['title']) || empty($resource['type'])) {
                    continue;
                }

                // LINK
                if ($resource['type'] === 'link') {
                    $lesson->resources()->create([
                        'title' => $resource['title'],
                        'type' => 'link',
                        'url' => $resource['url'] ?? null,
                        'path' => null,
                    ]);
                }

                
                if ($resource['type'] === 'file') {

                    if ($request->hasFile("resources.$key.file")) {

                        $file = $request->file("resources.$key.file");

                        $lesson->resources()->create([
                            'title' => $resource['title'],
                            'type' => 'file',
                            'url' => null,
                            'path' => $file->store('lessons/files', 'public'),
                        ]);
                    }
                }
            }
        }

        return redirect()->route('teacher.courses.lessons.index', [$workspace, $course])
            ->with('success', 'Lesson updated successfully.');
    }

    public function destroy(Workspace $workspace, Course $course, Lesson $lesson)
    {
        abort_if($workspace->teacher_id !== auth()->id(), 403);
        abort_if($course->workspace_id !== $workspace->id, 404);
        abort_if($lesson->course_id !== $course->id, 404);

        $lesson->delete();

        return redirect()->route('teacher.courses.lessons.index', [$workspace, $course])
            ->with('success', 'Lesson deleted successfully.');
    }
}
