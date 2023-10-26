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
        $subjects = ['Faculty of Arts & Humanities', 'Faculty of Mathematical & Physical Sciences', 'Faculty of Social Sciences', 'Faculty of Biological Sciences', 'Faculty of Business Studies', 'Faculty of Law'];

        $topics = [
            'Faculty of Arts & Humanities' => ['Department of International Relations', 'Department of English', 'Department of History', 'Department of Philosophy','Department of Drama & Dramatics', 'Department of Archaeology', 'Department of Bangla', 'Department of Journalism and Media Studies', 'Department of Fine Art'],

            'Faculty of Mathematical & Physical Sciences' => ['Department of Computer Science and Engineering',     'Department of Mathematics', 'Department of Physics', 'Department of Environmental Sciences', '
            Department of Statistics', 'Department of Geological Sciences'],

            'Faculty of Social Sciences' => ['Department of Economics', 'Department of Urban & Regional Planning', 'Department of Anthropology', 'Department of Geography & Environment', 'Department of Government & Politics', 'Department of Public Administration'],

            'Faculty of Biological Sciences' => ['Department of Botany', 'Department of Biochemistry & Molecular Biology', 'Department of Zoology', 'Department of Pharmacy', 'Department of Microbiology', 'Department of Biotechnology & Genetic Engineering', 'Department of Public Health and Informatics'],

            'Faculty of Business Studies' => ['Department of Finance & Banking', 'Department of Marketing', 'Department of Accounting and Information Systems', 'Department of Management Studies'],

            'Faculty of Law' => ['Department of Law & Justice'],
        ];

        $subtopics = [
            'Department of International Relations' => ['Diplomacy and Foreign Policy', 'International Law', 'Global Governance', 'Conflict Resolution and Peace Studies', 'Political Economy', 'Security Studies', 'Area Studies', 'Human Rights'],

            'Department of Computer Science and Engineering' => ['Programming and Software Development', 'Computer Architecture and Organization', 'Data Structures and Algorithms', 'Operating Systems', 'Database Management Systems', 'Computer Networks', 'Software Engineering', 'Artificial Intelligence and Machine Learning', 'Computer Graphics and Visualization', 'Cybersecurity', 'Web Development', 'Mobile Computing', 'Computer Ethics and Professionalism', 'Robotics'],

            'Calculus' => ['Calculus I', 'Calculus II'],
            'Physics' => ['Classical Physics', 'Quantum Physics'],
            'Chemistry' => ['Organic Chemistry', 'Inorganic Chemistry'],
            'Biology' => ['Botany', 'Zoology'],
            'Ancient History' => ['Egyptian Civilization', 'Roman Empire'],
            'Modern History' => ['World War I', 'World War II'],
            'World Wars' => ['Causes of World War I', 'Aftermath of World War II'],
        ];

        return view('student.index', compact('subjects', 'topics', 'subtopics'));
    }

    public function updateSubject(Request $request)
    {
        return $request;

        // return redirect('');
    }
}
