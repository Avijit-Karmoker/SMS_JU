<?php

namespace App\Livewire;

use App\Models\Department;
use App\Models\Faculty;
use App\Models\SelectedSubject;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class SelectSubject extends Component
{
    public $faculties;
    public $selectedFaculty;
    public $departments;
    public $selectedDepartment;
    public $selectedSubject = [];
    public $selectedSemester;
    public $subjects;
    public $test;
    public $semester;
    public $faculty_id;
    public $department_id;
    public $subject_id;

    public function render()
    {
        $faculties = Faculty::all();
        $departments = Department::where('faculty_id', $this->selectedFaculty)->get();

        return view('livewire.select-subject', [
            'faculties' => $faculties,
            'departments' => $departments,
        ]);
    }

    public function mount()
    {
        $this->faculties = Faculty::all();
    }

    public function updatedSelectedFaculty($value)
    {
        $this->departments = Department::where('faculty_id', $value)->get();
        $this->test = $this->departments;
        // $this->reset(['selectedDepartment', 'subjects']);
    }

    public function updatedSelectedDepartment($value)
    {
        $this->subjects = Subject::where('department_id', $value)->get();
    }

    public function subjectUpdate(){
        // dd([
        //     'student_id' => Auth::user()->id,
        //     'semester' => $this->selectedSemester,
        //     'faculty_id' => $this->selectedFaculty,
        //     'department_id' => $this->selectedDepartment,
        //     'selectedSubject' => count($this->selectedSubject),
        // ]);

        $this->validate([
            'selectedSemester' => 'required',
            'selectedFaculty' => 'required',
            'selectedDepartment' => 'required',
            'selectedSubject' => 'array',
        ]);

        $faculty = Faculty::find($this->selectedFaculty);
        $department = Department::find($this->selectedDepartment);

        $insertData = [];
        if (count($this->selectedSubject) == 4){
            foreach ($this->selectedSubject as $subjectId) {
                $insertData[] = [
                    'student_id' => Auth::user()->id,
                    'faculty_id' => $this->selectedFaculty,
                    'department_id' => $this->selectedDepartment,
                    'semester' => $this->selectedSemester,
                    'subject_id' => $this->subjects->find($subjectId)->id,
                ];
            }
        }
        else {
            return back()->with('subject_failed', 'You have to choose at lest 4 subjects!');
        }
        // Insert subjects into the database
        Subject::insert($insertData);

        // SelectedSubject::create([
        //     'student_id' => Auth::user()->id,
        //     'semester' => $this->name,
        //     'faculty' => $this->email,
        //     'department' => $this->email,
        //     'subjects' => $this->email,
        // ]);
    }

}

?>
