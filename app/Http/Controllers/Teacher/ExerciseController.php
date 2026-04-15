<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use App\Models\Lesson;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function index($workspace, $course, Lesson $lesson)
    {
        $exercises = $lesson->exercises()->latest()->get();

        return view('teacher.exercises.index', compact('workspace', 'course', 'lesson', 'exercises'));
    }

    public function create($workspace, $course, Lesson $lesson)
    {
        return view('teacher.exercises.create', compact('workspace', 'course', 'lesson'));
    }

    public function store(Request $request, $workspace, $course, Lesson $lesson)
    {
        $validated = $request->validate([
            'question' => 'required|string',
        ]);

        $lesson->exercises()->create($validated);

        return redirect()->route('teacher.lessons.exercises.index', [$workspace, $course, $lesson])
            ->with('success', 'Exercise added');
    }

    public function destroy($workspace, $course, Lesson $lesson, Exercise $exercise)
    {
        $exercise->delete();

        return back()->with('success', 'Deleted');
    }
}
