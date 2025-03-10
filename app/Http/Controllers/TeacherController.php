<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function index()
    {
        return view('teacher.index');
    }

    public function create()
    {
        return view('teacher.create');
    }

    public function store(Request $request)
    {
        // 
    }

    public function edit($id)
    {
        return view('teacher.edit', [
            "teacher" => User::find($id)
        ]);
    }
}
