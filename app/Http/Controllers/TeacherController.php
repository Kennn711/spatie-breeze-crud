<?php

namespace App\Http\Controllers;

use App\Models\Subject;
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
            'name' => 'required|min:3',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => 'required|min:8',
            'subject_id' => 'required',
        ]);

        $validation['password'] = Hash::make($request->password);

        User::create($validation);

        return redirect()->route('subject.index');
    }

    public function edit($id)
    {
        return view('teacher.edit', [
            "teacher" => User::find($id)
        ]);
    }
}
