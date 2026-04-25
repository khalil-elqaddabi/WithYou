<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $students = User::where('role', 'student')->latest()->get();

        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'student',
        ]);

        return redirect()
            ->route('admin.students.index')
            ->with('success', 'Student created successfully.');
    }

    public function show(User $student)
    {
        abort_if($student->role !== 'student', 404);

        $student->load('workspaces.teacher');

        return view('admin.students.show', compact('student'));
    }

    public function edit(User $student)
    {
        abort_if($student->role !== 'student', 404);

        return view('admin.students.edit', compact('student'));
    }

    public function update(Request $request, User $student)
    {
        abort_if($student->role !== 'student', 404);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . $student->id],
            'password' => ['nullable', 'min:8'],
        ]);

        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->filled('password')
                ? Hash::make($request->password)
                : $student->password,
        ]);

        return redirect()
            ->route('admin.students.index')
            ->with('success', 'Student updated successfully.');
    }

    public function destroy(User $student)
    {
        abort_if($student->role !== 'student', 404);

        $student->delete();

        return redirect()
            ->route('admin.students.index')
            ->with('success', 'Student deleted successfully.');
    }
}
