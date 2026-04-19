<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Workspace;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\ChatMessage;
use Illuminate\Http\Request;
use App\Events\MessageSent;

class DashboardController extends Controller
{
    public function index()
    {
        $student = auth()->user();
        $workspaces = $student->workspaces()->latest()->get();

        return view('student.dashboard', compact('workspaces'));
    }

    public function leaveWorkspace(Workspace $workspace)
    {
        $student = auth()->user();

        $student->workspaces()->detach($workspace->id);

        return back()->with('success', 'You left the workspace successfully.');
    }

    public function showWorkspace(Workspace $workspace)
    {
        $student = auth()->user();

        abort_if(!$student->workspaces()->where('workspaces.id', $workspace->id)->exists(), 403);

        $workspace->load('teacher', 'courses');

        return view('student.workspaces.show', compact('workspace'));
    }

    public function showCourse(Workspace $workspace, Course $course)
    {
        $student = auth()->user();

        abort_if(!$student->workspaces()->where('workspaces.id', $workspace->id)->exists(), 403);
        abort_if($course->workspace_id !== $workspace->id, 404);

        $course->load('lessons');

        return view('student.courses.show', compact('workspace', 'course'));
    }

    public function showLesson(Workspace $workspace, Course $course, Lesson $lesson)
    {
        $student = auth()->user();

        abort_if(!$student->workspaces()->where('workspaces.id', $workspace->id)->exists(), 403);
        abort_if($course->workspace_id !== $workspace->id, 404);
        abort_if($lesson->course_id !== $course->id, 404);

        return view('student.lessons.show', compact('workspace', 'course', 'lesson'));
    }

    public function showExercises(Workspace $workspace, Course $course, Lesson $lesson)
    {
        $student = auth()->user();

        abort_if(!$student->workspaces()->where('workspaces.id', $workspace->id)->exists(), 403);
        abort_if($course->workspace_id !== $workspace->id, 404);
        abort_if($lesson->course_id !== $course->id, 404);

        $lesson->load('exercises');

        return view('student.exercises.index', compact('workspace', 'course', 'lesson'));
    }



    public function room(Workspace $workspace)
    {
        $student = auth()->user();

        abort_if(!$student->workspaces()->where('workspaces.id', $workspace->id)->exists(), 403);

        $workspace->load(['chatMessages.sender']);

        return view('room', compact('workspace'));
    }


    public function sendMessage(Request $request, Workspace $workspace)
    {
        $user = auth()->user();

        if ($user->role === 'student') {
            abort_if(!$user->workspaces()->where('workspaces.id', $workspace->id)->exists(), 403);
        }

        if ($user->role === 'teacher') {
            abort_if($workspace->teacher_id !== $user->id, 403);
        }

        $request->validate([
            'message' => ['required', 'string'],
        ]);

        $message = ChatMessage::create([
            'sender_id' => $user->id,
            'workspace_id' => $workspace->id,
            'message' => $request->message,
            'sent_at' => now(),
        ]);

        broadcast(new MessageSent($message));

        return back();
    }

    public function joinCall(Workspace $workspace)
    {
        $student = auth()->user();

        abort_if(!$student->workspaces()->where('workspaces.id', $workspace->id)->exists(), 403);
        abort_if(!$workspace->call_active, 403);

        return view('call', [
            'roomID' => 'workspace-' . $workspace->id,
            'workspace' => $workspace,
        ]);
    }
}
