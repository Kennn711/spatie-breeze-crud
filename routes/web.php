<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin
Route::get('admin', [SuperAdminController::class, 'index'])->middleware(['auth', 'verified', 'role:super-admin'])->name('admin.index');
// Admin END


// Teacher
Route::get('teacher', [TeacherController::class, 'index'])->middleware(['auth', 'verified', 'role_or_permission:see-teacher|teacher|super-admin'])->name('teacher.index');
Route::get('teacher/create', [TeacherController::class, 'create'])->middleware(['auth', 'verified', 'permission:add-teacher'])->name('teacher.create');
Route::post('teacher/create', [TeacherController::class, 'store'])->middleware(['auth', 'verified', 'permission:add-teacher'])->name('teacher.store');
Route::get('teacher/edit/{id}', [TeacherController::class, 'edit'])->middleware(['auth', 'verified', 'permission:edit-teacher'])->name('teacher.edit');
Route::delete('teacher/destroy/{id}', [TeacherController::class, 'destroy'])->middleware(['auth', 'verified', 'permission:delete-teacher'])->name('teacher.destroy');
Route::put('teacher/update/{id}', [TeacherController::class, 'update'])->middleware(['auth', 'verified', 'permission:edit-teacher'])->name('teacher.update');
// Teacher END

// Subject
Route::get('subject', [SubjectController::class, 'index'])->middleware(['auth', 'verified', 'role:student|teacher'])->name('subject.index');
Route::get('subject/create', [SubjectController::class, 'create'])->middleware(['auth', 'verified', 'permission:add-subject'])->name('subject.create');
// Subject End
require __DIR__ . '/auth.php';
