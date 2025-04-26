<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $students = Student::query();

        if ($request->has('search') && $request->search != '') {
            $students->where(function ($q) use ($request) {
                $q->where('firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('lastname', 'like', '%' . $request->search . '%');
            });
        }

        $students = $students->simplePaginate(8);

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email',
            'birthdate' => 'required|date',
        ]);

        Student::create($request->only('firstname', 'lastname', 'address', 'email', 'birthdate'));
        return redirect()->route('home')->with('success', 'Student Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $student = Student::findOrFail($id);

        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email',
            'birthdate' => 'required|date',
        ]);

        $student = Student::findOrFail($id);
        $student->update($request->only('firstname', 'lastname', 'address', 'email', 'birthdate'));
        return redirect()->route('home')->with('success', 'Student Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Student::destroy($id);
        return redirect()->route('home');
    }
}
