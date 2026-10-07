<?php

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;

// Welcome page
Route::get('/', function () {
    return view('welcome');
});

// LIST all students
Route::get('/students', function () {
    $students = Student::all();
    return view('student.list', ['students' => $students]);
})->name('students.index');

// SHOW create form
Route::get('/students/create', function () {
    return view('student.create');
})->name('students.create');

// SAVE new student
Route::post('/students', function (Request $request) {
    $validated = $request->validate([
        'name'          => 'required|string|max:255',
        'email'         => 'required|email|max:255',
        'phone'         => 'required|string|max:20',
        'address'       => 'nullable|string|max:500',
        'date_of_birth' => 'nullable|date',
    ]);

    $student = Student::create($validated);

    return redirect()->route('students.index')
        ->with('success', "Student {$student->name} created successfully!");
})->name('students.store');

// SHOW one student's details
Route::get('/students/{id}', function ($id) {
    $student = Student::findOrFail($id);
    return view('student.detail', ['student' => $student]);
})->name('students.show');

// SHOW edit form
Route::get('/students/{id}/edit', function ($id) {
    $student = Student::findOrFail($id);
    return view('student.edit', ['student' => $student]);
})->name('students.edit');

// UPDATE student
Route::put('/students/{id}', function (Request $request, $id) {
    $student = Student::findOrFail($id);

    $validated = $request->validate([
        'name'          => 'required|string|max:255',
        'email'         => ['required', 'email', 'max:255',
                            Rule::unique('students')->ignore($student->id)],
        'phone'         => 'required|string|max:20',
        'address'       => 'nullable|string',
        'date_of_birth' => 'nullable|date',
    ]);

    $student->update($validated);

    return redirect()->route('students.show', $student->id)
        ->with('success', 'Student updated successfully!');
})->name('students.update');

// DELETE student
Route::delete('/students/{id}', function ($id) {
    $student = Student::findOrFail($id);
    $student->delete();

    return redirect()->route('students.index')
        ->with('success', 'Student deleted successfully!');
})->name('students.destroy');
Route::post('/courses', function (Request $request) {

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'duration' => 'required|integer|min:1',
        'fee' => 'required|numeric|min:0',
        'difficulty' => 'required|in:Easy,Medium,Hard',
        'is_active' => 'required|boolean',
    ]);

    $course = Course::create($validated);

    return redirect('/courses/create')
        ->with('success', 'Course created successfully!');
});