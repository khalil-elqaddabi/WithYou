<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Workspace;
use Illuminate\Http\Request;

class WorkspaceController extends Controller
{
    public function index(Request $request)
    {
        $query = Workspace::with('teacher', 'students');

        if ($request->search) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {


                $q->where('name', 'like', "%$search%")
                    ->orWhereHas('teacher', function ($teacherQuery) use ($search) {
                        $teacherQuery->where('name', 'like', "%$search%")
                            ->orWhere('email', 'like', "%$search%");
                    })
                    ->orWhereHas('students', function ($studentQuery) use ($search) {
                        $studentQuery->where('name', 'like', "%$search%")
                            ->orWhere('email', 'like', "%$search%");
                    });
            });
        }

        $workspaces = $query->latest()->get();

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
