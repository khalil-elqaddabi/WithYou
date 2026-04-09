<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Workspace;
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
}
