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
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'subject' => 'nullable',
            'links' => 'nullable',
            'file' => 'nullable|file',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('lessons', 'public');
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('lessons', 'public');
        }

        $course->lessons()->create($data);

        return redirect()->route('teacher.courses.lessons.index', [$workspace, $course]);
    }


    public function show(Workspace $workspace, Course $course, Lesson $lesson)
{
    abort_if($workspace->teacher_id !== auth()->id(), 403);
    abort_if($course->workspace_id !== $workspace->id, 404);
    abort_if($lesson->course_id !== $course->id, 404);

    return view('teacher.lessons.show', compact('workspace', 'course', 'lesson'));
}

    public function edit(Workspace $workspace, Course $course, Lesson $lesson)
{
    abort_if($workspace->teacher_id !== auth()->id(), 403);
    abort_if($course->workspace_id !== $workspace->id, 404);
    abort_if($lesson->course_id !== $course->id, 404);

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
        'links' => 'nullable|string',
        'file' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,zip|max:20480',
        'image' => 'nullable|image|max:4096',
    ]);

    if ($request->hasFile('file')) {
        $data['file'] = $request->file('file')->store('lessons/files', 'public');
    } else {
        unset($data['file']);
    }

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('lessons/images', 'public');
    } else {
        unset($data['image']);
    }

    $lesson->update($data);

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
