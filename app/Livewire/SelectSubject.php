<?php

namespace App\Livewire;

use App\Models\Subject;
use Livewire\Component;

class SelectSubject extends Component
{
    public $select_subject;
    public $test;
    public $select_dropdown_value;
    public $testValue;

    protected $listeners = [
        'updateSelectDropdownValue' => 'updateSelectDropdownValue',
    ];

    public function updatedSelectDropdownValue($id)
    {
        $this->testValue = $id;
    }

    public function render()
    {
        $subjects = Subject::all();
        return view('livewire.select-subject', compact('subjects'));
    }
}

?>
