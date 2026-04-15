<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Teacher\CourseController;
use App\Http\Controllers\Teacher\DashboardController;
use App\Http\Controllers\Teacher\LessonController;
use App\Http\Controllers\Teacher\WorkspaceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\ExerciseController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $user = auth()->user();

        return match ($user->role) {
            'admin' => redirect()->route('admin.dashboard'),
            'teacher' => redirect()->route('teacher.dashboard'),
            default => redirect()->route('student.dashboard'),
        };
    })->name('dashboard');

    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
    });

    Route::middleware('role:teacher')->group(function () {
        Route::get('/teacher/dashboard', [DashboardController::class, 'index'])
            ->name('teacher.dashboard');

        Route::resource('teacher/workspaces', WorkspaceController::class)
            ->names('teacher.workspaces');

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


        Route::get('teacher/workspaces/{workspace}/courses/{course}/lessons/{lesson}/exercises', [ExerciseController::class, 'index'])
            ->name('teacher.lessons.exercises.index');

        Route::get('teacher/workspaces/{workspace}/courses/{course}/lessons/{lesson}/exercises/create', [ExerciseController::class, 'create'])
            ->name('teacher.lessons.exercises.create');

        Route::post('teacher/workspaces/{workspace}/courses/{course}/lessons/{lesson}/exercises', [ExerciseController::class, 'store'])
            ->name('teacher.lessons.exercises.store');

        Route::delete('teacher/workspaces/{workspace}/courses/{course}/lessons/{lesson}/exercises/{exercise}', [ExerciseController::class, 'destroy'])
            ->name('teacher.lessons.exercises.destroy');
    });

    Route::middleware('role:student')->group(function () {
        Route::get('/student/dashboard', function () {
            return view('student.dashboard');
        })->name('student.dashboard');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
