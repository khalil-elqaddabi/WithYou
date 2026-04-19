<?php

namespace App\Http\Controllers\Teacher;



use App\Http\Controllers\Controller;
use App\Models\Workspace;
use App\Models\User;
use App\Models\ChatMessage;
use App\Events\CallStatusChanged;
use Illuminate\Http\Request;

class WorkspaceController extends Controller
{
    public function index()
    {
        $workspaces = Workspace::where('teacher_id', auth()->id())
            ->latest()
            ->get();

        return view('teacher.workspaces.index', compact('workspaces'));
    }

    public function create()
    {
        return view('teacher.workspaces.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'nullable|string',
        ]);

        Workspace::create([
            'name' => $validated['name'],
            'subject' => $validated['subject'] ?? null,
            'teacher_id' => auth()->id(),
        ]);

        return redirect()
            ->route('teacher.workspaces.index')
            ->with('success', 'Workspace created successfully.');
    }

    public function show(Workspace $workspace)
    {
        abort_if($workspace->teacher_id !== auth()->id(), 403);

        $workspace->load('students');

        return view('teacher.workspaces.show', compact('workspace'));
    }
    public function edit(Workspace $workspace)
    {
        abort_if($workspace->teacher_id !== auth()->id(), 403);

        return view('teacher.workspaces.edit', compact('workspace'));
    }

    public function update(Request $request, Workspace $workspace)
    {
        abort_if($workspace->teacher_id !== auth()->id(), 403);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'nullable|string',
        ]);

        $workspace->update($validated);

        return redirect()
            ->route('teacher.workspaces.index')
            ->with('success', 'Workspace updated successfully.');
    }

    public function destroy(Workspace $workspace)
    {
        abort_if($workspace->teacher_id !== auth()->id(), 403);

        $workspace->delete();

        return redirect()
            ->route('teacher.workspaces.index')
            ->with('success', 'Workspace deleted successfully.');
    }

    public function addStudent(Request $request, Workspace $workspace)
    {
        abort_if($workspace->teacher_id !== auth()->id(), 403);

        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $student = User::where('email', $request->email)
            ->where('role', 'student')
            ->first();

        if (!$student) {
            return back()->with('error', 'Student not found.');
        }

        if ($workspace->students()->where('users.id', $student->id)->exists()) {
            return back()->with('error', 'Student is already in this workspace.');
        }

        $workspace->students()->attach($student->id, [
            'joined_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Student added successfully.');
    }

    public function removeStudent(Workspace $workspace, User $student)
    {
        abort_if($workspace->teacher_id !== auth()->id(), 403);

        $workspace->students()->detach($student->id);

        return back()->with('success', 'Student removed successfully.');
    }

    public function room(Workspace $workspace)
    {
        abort_if($workspace->teacher_id !== auth()->id(), 403);

        $workspace->load(['chatMessages.sender']);

        return view('room', compact('workspace'));
    }

    public function sendMessage(Request $request, Workspace $workspace)
    {
        abort_if($workspace->teacher_id !== auth()->id(), 403);

        $request->validate([
            'message' => ['required', 'string'],
        ]);

        ChatMessage::create([
            'sender_id' => auth()->id(),
            'workspace_id' => $workspace->id,
            'message' => $request->message,
            'sent_at' => now(),
        ]);

        return back();
    }


 public function startCall(Workspace $workspace)
{
    abort_if($workspace->teacher_id !== auth()->id(), 403);

    $workspace->update([
        'call_active' => true,
    ]);

    broadcast(new CallStatusChanged($workspace))->toOthers();

    return redirect()->route('teacher.call', $workspace->id);
}

 public function endCall(Workspace $workspace)
{
    abort_if($workspace->teacher_id !== auth()->id(), 403);

    $workspace->update([
        'call_active' => false,
    ]);

    broadcast(new CallStatusChanged($workspace))->toOthers();

    return redirect()->route('teacher.room', $workspace->id);
}

    public function call(Workspace $workspace)
    {
        abort_if($workspace->teacher_id !== auth()->id(), 403);

        return view('call', [
            'roomID' => 'workspace-' . $workspace->id,
            'workspace' => $workspace,
        ]);
    }
}
