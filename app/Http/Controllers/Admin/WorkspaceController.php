<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Workspace;

class WorkspaceController extends Controller
{
    public function index()
    {
        $workspaces = Workspace::with('teacher')->latest()->get();

        return view('admin.workspaces.index', compact('workspaces'));
    }

    public function show(Workspace $workspace)
    {
        $workspace->load('teacher', 'students');

        return view('admin.workspaces.show', compact('workspace'));
    }

    public function destroy(Workspace $workspace)
    {
        $workspace->delete();

        return redirect()
            ->route('admin.workspaces.index')
            ->with('success', 'Workspace deleted successfully.');
    }
}
