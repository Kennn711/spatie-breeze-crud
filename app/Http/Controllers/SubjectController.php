<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        return view('subject.index', [
            'subject' => Subject::get()
        ]);
    }

    public function create()
    {
        return view('subject.create');
    }

    public function edit($id)
    {
        return view('subject.edit', [
            'subject' => Subject::find($id)
        ]);
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|min:3'
        ]);

        Subject::create($validation);

        return redirect()->route('subject.index');
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'name' => 'required|min:3'
        ]);

        Subject::find($id)->update($validation);

        return redirect()->route('subject.index');
    }

    public function destroy($id)
    {
        Subject::find($id)->delete();

        return back();
    }
}
