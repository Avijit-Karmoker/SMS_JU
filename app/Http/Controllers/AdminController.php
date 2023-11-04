<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Faculty;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function addFaculty(Request $request){
        $request->validate([
            'faculty_name' => ['required', 'unique:faculties,name', 'max:255'], // Add 'max:255' or adjust as needed
        ]);

        Faculty::insert([
            'name' => $request->faculty_name
        ]);

        return redirect()->route('subject')->with('faculty', 'Faculty add successfully!');

    }

    public function addDepartment(Request $request){
        $request->validate([
            'department_name' => ['required'], // Add 'max:255' or adjust as needed
        ]);

        $faculty = Faculty::find($request->input('faculty_id'));

        if ($faculty) {
        $department = new Department([
            'name' => $request->input('department_name'),
        ]);

        $faculty->departments()->save($department);

        return redirect()->route('subject')->with('department', 'Department add successfully!');
        }
    }

    public function addSubject(Request $request){
        $request->validate([
            'subjects_name' => ['required'], // Add 'max:255' or adjust as needed
        ]);

        $departmentId = $request->input('department_id');
        $subjectNames = explode(',', $request->input('subjects_name'));

        // Insert the subjects in bulk
        $subjectData = [];
        foreach ($subjectNames as $subjectName) {
            $subjectData[] = [
                'department_id' => $departmentId,
                'name' => trim($subjectName),
            ];
        }

        $subjectIds = Subject::insert($subjectData);

        return redirect()->route('subject')->with('subject', 'Subjects add successfully!');
    }

    public function subject()
    {
        $faculties = Faculty::all();
        $departments = Department::all();
        return view('admin.index', compact('faculties', 'departments'));
    }

    public function showSubject(){

        $faculties = Faculty::with('departments.subjects')->get();

        return view('admin.edit', compact('faculties'));
    }
}
