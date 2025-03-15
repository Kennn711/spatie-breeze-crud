<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\TeacherAssigment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function index()
    {
        return view('teacher.index', [
            'teacher' => User::with('subject')->role('teacher')->get(),
        ]);
    }

    public function create()
    {
        return view('teacher.create', [
            'subject' => Subject::get()
        ]);
    }

    public function store(Request $request)
    {

        $validation = $request->validate([
            'name' => 'required',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => 'required',
            'subject.*' => 'required',
        ]);
        $validation['password'] = Hash::make($request->password);

        $subjectId = $request->input('subject');
        unset($validation['subject']);

        $teacher = User::create($validation);

        if (!empty($subjectId)) {
            foreach ($subjectId as $see) {
                TeacherAssigment::create([
                    'teacher_id' => $teacher->id,
                    'subject_id' => $see
                ]);
            }
        }

        return redirect()->route('teacher.index');
    }

    public function edit($id)
    {
        return view('teacher.edit', [
            "teacher" => User::find($id)
        ]);
    }
}
