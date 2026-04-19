<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Teacher\CourseController;
use App\Http\Controllers\Teacher\DashboardController as TeacherDashboardController;
use App\Http\Controllers\Teacher\LessonController;
use App\Http\Controllers\Teacher\WorkspaceController;
use App\Http\Controllers\Teacher\ExerciseController;

use App\Http\Controllers\Student\DashboardController as StudentDashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    // Redirect role
    Route::get('/dashboard', function () {
        $user = auth()->user();

        return match ($user->role) {
            'admin' => redirect()->route('admin.dashboard'),
            'teacher' => redirect()->route('teacher.dashboard'),
            default => redirect()->route('student.dashboard'),
        };
    })->name('dashboard');

    // Chat (teacher + student)
    Route::post('/workspaces/{workspace}/chat', [StudentDashboardController::class, 'sendMessage'])
        ->name('workspaces.chat.store');

    // ================= ADMIN =================
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
    });

    // ================= TEACHER =================
    Route::middleware('role:teacher')->group(function () {

        Route::get('/teacher/dashboard', [TeacherDashboardController::class, 'index'])
            ->name('teacher.dashboard');

        Route::resource('teacher/workspaces', WorkspaceController::class)
            ->names('teacher.workspaces');

        // Students
        Route::post('teacher/workspaces/{workspace}/students', [WorkspaceController::class, 'addStudent'])
            ->name('teacher.workspaces.students.store');

        Route::delete('teacher/workspaces/{workspace}/students/{student}', [WorkspaceController::class, 'removeStudent'])
            ->name('teacher.workspaces.students.destroy');

        // Room
        Route::get('/teacher/workspaces/{workspace}/room', [WorkspaceController::class, 'room'])
            ->name('teacher.room');

        // Call
        Route::get('/teacher/workspaces/{workspace}/call', function ($workspace) {
            return view('call', [
                'roomID' => 'workspace-' . $workspace
            ]);
        })->name('teacher.call');

        // Courses
        Route::get('teacher/workspaces/{workspace}/courses', [CourseController::class, 'index'])
            ->name('teacher.workspaces.courses.index');

        Route::get('teacher/workspaces/{workspace}/courses/create', [CourseController::class, 'create'])
            ->name('teacher.workspaces.courses.create');

        Route::post('teacher/workspaces/{workspace}/courses', [CourseController::class, 'store'])
            ->name('teacher.workspaces.courses.store');

        Route::get('teacher/workspaces/{workspace}/courses/{course}/edit', [CourseController::class, 'edit'])
            ->name('teacher.workspaces.courses.edit');

        Route::put('teacher/workspaces/{workspace}/courses/{course}', [CourseController::class, 'update'])
            ->name('teacher.workspaces.courses.update');

        Route::delete('teacher/workspaces/{workspace}/courses/{course}', [CourseController::class, 'destroy'])
            ->name('teacher.workspaces.courses.destroy');

        // Lessons
        Route::get('teacher/workspaces/{workspace}/courses/{course}/lessons', [LessonController::class, 'index'])
            ->name('teacher.courses.lessons.index');

        Route::get('teacher/workspaces/{workspace}/courses/{course}/lessons/create', [LessonController::class, 'create'])
            ->name('teacher.courses.lessons.create');

        Route::post('teacher/workspaces/{workspace}/courses/{course}/lessons', [LessonController::class, 'store'])
            ->name('teacher.courses.lessons.store');

        Route::get('teacher/workspaces/{workspace}/courses/{course}/lessons/{lesson}', [LessonController::class, 'show'])
            ->name('teacher.courses.lessons.show');

        Route::get('teacher/workspaces/{workspace}/courses/{course}/lessons/{lesson}/edit', [LessonController::class, 'edit'])
            ->name('teacher.courses.lessons.edit');

        Route::put('teacher/workspaces/{workspace}/courses/{course}/lessons/{lesson}', [LessonController::class, 'update'])
            ->name('teacher.courses.lessons.update');

        Route::delete('teacher/workspaces/{workspace}/courses/{course}/lessons/{lesson}', [LessonController::class, 'destroy'])
            ->name('teacher.courses.lessons.destroy');

        // Exercises
        Route::get('teacher/workspaces/{workspace}/courses/{course}/lessons/{lesson}/exercises', [ExerciseController::class, 'index'])
            ->name('teacher.lessons.exercises.index');

        Route::get('teacher/workspaces/{workspace}/courses/{course}/lessons/{lesson}/exercises/create', [ExerciseController::class, 'create'])
            ->name('teacher.lessons.exercises.create');

        Route::post('teacher/workspaces/{workspace}/courses/{course}/lessons/{lesson}/exercises', [ExerciseController::class, 'store'])
            ->name('teacher.lessons.exercises.store');

        Route::delete('teacher/workspaces/{workspace}/courses/{course}/lessons/{lesson}/exercises/{exercise}', [ExerciseController::class, 'destroy'])
            ->name('teacher.lessons.exercises.destroy');

        Route::get('/teacher/workspaces/{workspace}/call', function ($workspace) {
            return view('call', [
                'roomID' => 'workspace-' . $workspace,
            ]);
        })->name('teacher.call');

        Route::post('/teacher/workspaces/{workspace}/start-call', [WorkspaceController::class, 'startCall'])
            ->name('teacher.call.start');

        Route::post('/teacher/workspaces/{workspace}/end-call', [WorkspaceController::class, 'endCall'])
            ->name('teacher.call.end');

        Route::get('/teacher/workspaces/{workspace}/call', [WorkspaceController::class, 'call'])
            ->name('teacher.call');
    });

    // ================= STUDENT =================
    Route::middleware('role:student')->group(function () {

        Route::get('/student/dashboard', [StudentDashboardController::class, 'index'])
            ->name('student.dashboard');

        Route::delete('/student/workspaces/{workspace}/leave', [StudentDashboardController::class, 'leaveWorkspace'])
            ->name('student.workspaces.leave');

        Route::get('/student/workspaces/{workspace}', [StudentDashboardController::class, 'showWorkspace'])
            ->name('student.workspaces.show');

        Route::get('/student/workspaces/{workspace}/room', [StudentDashboardController::class, 'room'])
            ->name('student.room');

        Route::get('/student/workspaces/{workspace}/call', function ($workspace) {
            return view('call', [
                'roomID' => 'workspace-' . $workspace
            ]);
        })->name('student.call');

        Route::get('/student/workspaces/{workspace}/courses/{course}', [StudentDashboardController::class, 'showCourse'])
            ->name('student.courses.show');

        Route::get('/student/workspaces/{workspace}/courses/{course}/lessons/{lesson}', [StudentDashboardController::class, 'showLesson'])
            ->name('student.lessons.show');

        Route::get('/student/workspaces/{workspace}/courses/{course}/lessons/{lesson}/exercises', [StudentDashboardController::class, 'showExercises'])
            ->name('student.exercises.index');

        Route::get('/student/workspaces/{workspace}/call', function ($workspace) {
            return view('call', [
                'roomID' => 'workspace-' . $workspace,
            ]);
        })->name('student.call');

        Route::get('/student/workspaces/{workspace}/call', [StudentDashboardController::class, 'joinCall'])
            ->name('student.call');
    });

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
