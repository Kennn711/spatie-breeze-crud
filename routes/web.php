<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
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

Route::get('admin', [SuperAdminController::class, 'index'])->middleware(['auth', 'verified', 'role:super-admin'])->name('admin.index');


Route::get('teacher', [TeacherController::class, 'index'])->middleware(['auth', 'verified', 'role_or_permission:see-teacher|teacher|super-admin'])->name('teacher.index');
Route::get('teacher/create', [TeacherController::class, 'create'])->middleware(['auth', 'verified', 'role:teacher|super-admin'])->name('teacher.create');


Route::get('student', [StudentController::class, 'index'])->middleware(['auth', 'verified', 'role:student'])->name('student.index');

// Route::get('data', function () {
//     return view('teacher/index');
// })->middleware(['auth', 'verified', 'permission:see-teacher']);

require __DIR__ . '/auth.php';
