<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function subject()
    {
        // $subjects = ['Faculty of Arts & Humanities', 'Faculty of Mathematical & Physical Sciences', 'Faculty of Social Sciences', 'Faculty of Biological Sciences', 'Faculty of Business Studies', 'Faculty of Law'];

        // $topics = [
        //     'Faculty of Arts & Humanities' => ['Department of International Relations', 'Department of English', 'Department of History', 'Department of Philosophy','Department of Drama & Dramatics', 'Department of Archaeology', 'Department of Bangla', 'Department of Journalism and Media Studies', 'Department of Fine Art'],

        //     'Faculty of Mathematical & Physical Sciences' => ['Department of Computer Science and Engineering',     'Department of Mathematics', 'Department of Physics', 'Department of Environmental Sciences', '
        //     Department of Statistics', 'Department of Geological Sciences'],

        //     'Faculty of Social Sciences' => ['Department of Economics', 'Department of Urban & Regional Planning', 'Department of Anthropology', 'Department of Geography & Environment', 'Department of Government & Politics', 'Department of Public Administration'],

        //     'Faculty of Biological Sciences' => ['Department of Botany', 'Department of Biochemistry & Molecular Biology', 'Department of Zoology', 'Department of Pharmacy', 'Department of Microbiology', 'Department of Biotechnology & Genetic Engineering', 'Department of Public Health and Informatics'],

        //     'Faculty of Business Studies' => ['Department of Finance & Banking', 'Department of Marketing', 'Department of Accounting and Information Systems', 'Department of Management Studies'],

        //     'Faculty of Law' => ['Department of Law & Justice'],
        // ];

        // $subtopics = [
        //     'Department of International Relations' => ['Diplomacy and Foreign Policy', 'International Law', 'Global Governance', 'Conflict Resolution and Peace Studies', 'Political Economy', 'Security Studies', 'Area Studies', 'Human Rights'],

        //     'Department of Computer Science and Engineering' => ['Programming and Software Development', 'Computer Architecture and Organization', 'Data Structures and Algorithms', 'Operating Systems', 'Database Management Systems', 'Computer Networks', 'Software Engineering', 'Artificial Intelligence and Machine Learning', 'Computer Graphics and Visualization', 'Cybersecurity', 'Web Development', 'Mobile Computing', 'Computer Ethics and Professionalism', 'Robotics'],

        //     'Calculus' => ['Calculus I', 'Calculus II'],
        //     'Physics' => ['Classical Physics', 'Quantum Physics'],
        //     'Chemistry' => ['Organic Chemistry', 'Inorganic Chemistry'],
        //     'Biology' => ['Botany', 'Zoology'],
        //     'Ancient History' => ['Egyptian Civilization', 'Roman Empire'],
        //     'Modern History' => ['World War I', 'World War II'],
        //     'World Wars' => ['Causes of World War I', 'Aftermath of World War II'],
        // ];

        // return view('admin.index', compact('subjects', 'topics', 'subtopics'));
        return view('admin.index');
    }

    public function addSubject(Request $request){
        // return $request;
        Subject::insert([
            'faculty_name' => $request->faculty_name,
            'department_name' => $request->department_name,
            'subject_1' => $request->subject_1,
            'subject_2' => $request->subject_2,
            'subject_3' => $request->subject_3,
            'subject_4' => $request->subject_4,
            'subject_5' => $request->subject_5,
            'subject_6' => $request->subject_6,
            'subject_7' => $request->subject_7,
            'subject_8' => $request->subject_8,
            'subject_9' => $request->subject_9,
            'subject_10' => $request->subject_10,
            'subject_11' => $request->subject_11,
            'subject_12' => $request->subject_12,
            'subject_13' => $request->subject_13,
            'subject_14' => $request->subject_14,
            'subject_15' => $request->subject_15,
            'subject_16' => $request->subject_16,
            'subject_17' => $request->subject_17,
            'subject_18' => $request->subject_18,
            'subject_19' => $request->subject_19,
            'subject_20' => $request->subject_20,
            'subject_21' => $request->subject_21,
            'subject_22' => $request->subject_22,
            'subject_23' => $request->subject_23,
            'subject_24' => $request->subject_24,
            'subject_25' => $request->subject_25,
            'subject_26' => $request->subject_26,
            'subject_27' => $request->subject_27,
            'subject_28' => $request->subject_28,
            'subject_29' => $request->subject_29,
            'subject_30' => $request->subject_30,
        ]);

        return redirect('subject/show');
    }

    public function showSubject(){
        $subjects = Subject::paginate(3);

        // $groupedSubjects = $subjects->groupBy('faculty_name');
        $counts = $subjects->groupBy('faculty_name')->map(function ($group) {
            return count($group);
        });

        // return $groupedSubjects;

        $columns = DB::getSchemaBuilder()->getColumnListing('subjects');
        $allSubjects = ['subject_1','subject_2','subject_3','subject_4','subject_5','subject_6','subject_7','subject_8','subject_9','subject_10','subject_11','subject_12','subject_13','subject_14','subject_15','subject_16','subject_17','subject_18','subject_19','subject_20','subject_21','subject_22','subject_23','subject_24','subject_25','subject_26','subject_27','subject_28','subject_29','subject_30'];
        // return $allSubjects;

        return view('admin.edit', compact('subjects', 'allSubjects', 'counts'));
    }
}
