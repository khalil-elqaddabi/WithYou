<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Teacher\CourseController;
use App\Http\Controllers\Teacher\WorkspaceController;
use Illuminate\Support\Facades\Route;

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
        Route::get('/teacher/dashboard', function () {
            return view('teacher.dashboard');
        })->name('teacher.dashboard');

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
