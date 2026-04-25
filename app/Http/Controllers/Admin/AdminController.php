<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Workspace;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Exercise;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'teachersCount' => User::where('role', 'teacher')->count(),
            'studentsCount' => User::where('role', 'student')->count(),
            'workspacesCount' => Workspace::count(),
            'coursesCount' => Course::count(),
            'lessonsCount' => Lesson::count(),
            'exercisesCount' => Exercise::count(),
            'latestUsers' => User::latest()->take(5)->get(),
            'latestWorkspaces' => Workspace::with('teacher')->latest()->take(5)->get(),
        ]);
    }
}
