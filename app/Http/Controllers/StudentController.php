<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function information(Request $request)
    {
        Student::create([
            'student_id' => Auth::user()->id,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'gender' => $request->gender,
            'exam_roll' => $request->student_id,
            'permanent_address' => $request->permanent_address,
            'admission_date' => $request->admission_date,
        ]);

        return redirect('profile');
    }

    public function showSubject(Request $request)
    {

        return view('student.index');
    }

    public function updateSubject(Request $request)
    {
        return $request;

        // return redirect('');
    }
}
