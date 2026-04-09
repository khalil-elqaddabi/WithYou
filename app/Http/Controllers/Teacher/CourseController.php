<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Workspace;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Workspace $workspace)
    {
        abort_if($workspace->teacher_id !== auth()->id(), 403);

        $courses = $workspace->courses()->orderBy('order_index')->get();

        return view('teacher.courses.index', compact('workspace', 'courses'));
    }

    public function create(Workspace $workspace)
    {
        abort_if($workspace->teacher_id !== auth()->id(), 403);

        return view('teacher.courses.create', compact('workspace'));
    }

    public function store(Request $request, Workspace $workspace)
    {
        abort_if($workspace->teacher_id !== auth()->id(), 403);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'order_index' => 'nullable|integer|min:0',
        ]);

        $workspace->courses()->create([
            'title' => $validated['title'],
            'order_index' => $validated['order_index'] ?? 0,
        ]);

        return redirect()->route('teacher.workspaces.courses.index', $workspace)
            ->with('success', 'Course created successfully.');
    }

    public function edit(Workspace $workspace, Course $course)
    {
        abort_if($workspace->teacher_id !== auth()->id(), 403);
        abort_if($course->workspace_id !== $workspace->id, 404);

        return view('teacher.courses.edit', compact('workspace', 'course'));
    }

    public function update(Request $request, Workspace $workspace, Course $course)
    {
        abort_if($workspace->teacher_id !== auth()->id(), 403);
        abort_if($course->workspace_id !== $workspace->id, 404);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'order_index' => 'nullable|integer|min:0',
        ]);

        $course->update([
            'title' => $validated['title'],
            'order_index' => $validated['order_index'] ?? 0,
        ]);

        return redirect()->route('teacher.workspaces.courses.index', $workspace)
            ->with('success', 'Course updated successfully.');
    }

    public function destroy(Workspace $workspace, Course $course)
    {
        abort_if($workspace->teacher_id !== auth()->id(), 403);
        abort_if($course->workspace_id !== $workspace->id, 404);

        $course->delete();

        return redirect()->route('teacher.workspaces.courses.index', $workspace)
            ->with('success', 'Course deleted successfully.');
    }
}
