<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Workspace;
use App\Models\Course;
use App\Models\Lesson;

class DashboardController extends Controller
{
    public function index()
    {
        $teacherId = auth()->id();

        $workspaces = Workspace::where('teacher_id', $teacherId)->latest()->get();

        $workspaceIds = Workspace::where('teacher_id', $teacherId)->pluck('id');

        $courseIds = Course::whereIn('workspace_id', $workspaceIds)->pluck('id');

        $totalWorkspaces = $workspaceIds->count();
        $totalCourses = $courseIds->count();
        $totalLessons = Lesson::whereIn('course_id', $courseIds)->count();

        $recentWorkspaces = Workspace::where('teacher_id', $teacherId)
            ->latest()
            ->take(4)
            ->get();

        $recentLessons = Lesson::whereIn('course_id', $courseIds)
            ->latest()
            ->take(5)
            ->get();

        $totalStudents = 0;

        foreach ($workspaces as $workspace) {
            $totalStudents += $workspace->students()->count();
        }

        return view('teacher.dashboard', compact(
            'totalWorkspaces',
            'totalCourses',
            'totalLessons',
            'totalStudents',
            'recentWorkspaces',
            'recentLessons'
        ));
    }
}
