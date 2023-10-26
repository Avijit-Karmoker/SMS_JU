@extends('layouts.dashboard-master')

@section('content')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">User Profile</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">User Profilep</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <h2 class="mb-5">Semester Management</h2>
            <form method="POST" action="{{ route('subject.update') }}">
                @csrf
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Select Semester</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <select name="semester" class="form-select">
                            <option value="first">First Semester</option>
                            <option value="second">Second Semester</option>
                            <option value="third">Third Semester</option>
                            <option value="forth">Forth Semester</option>
                            <option value="fifth">Fifth Semester</option>
                            <option value="sixth">Sixth Semester</option>
                            <option value="seventh">Seventh Semester</option>
                            <option value="eighth">Eighth Semester</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Select Facalty</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <select id="subject" name="faculty" onchange="getTopics(this.value, 'topic')" class="form-select">
                            <option value="">--Select Faculty--</option>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject }}">{{ ucfirst($subject) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Select Department</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <select id="topic" name="department" class="form-select" onchange="getTopics(this.value, 'subtopic')">
                            <option value="">--Select Department--</option>
                            <!-- Topics will be populated dynamically using JavaScript -->
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Select Subject 1</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <select id="subtopic" name="subject" class="form-select">
                            <option value="">--Select Subject--</option>
                            <!-- Topics will be populated dynamically using JavaScript -->
                        </select>
                    </div>
                </div>
                <div class="row mb-3" id="inputContainer">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Select Subject 1</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input class="form-control" type="text" name="field1" placeholder="Field 1">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9 text-secondary">
                        <button type="button" onclick="addInputField()">Add New Field</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9 text-secondary">
                        <button type="submit" class="btn btn-primary px-4">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('footer-script')
<script>
    function getTopics(selectedValue, targetDropdownId) {
        var dropdownData = @json(['topics' => $topics, 'subtopics' => $subtopics]);

        var targetDropdown = document.getElementById(targetDropdownId);
        targetDropdown.innerHTML = ''; // Clear existing options

        var data = dropdownData[targetDropdownId === 'topic' ? 'topics' : 'subtopics'][selectedValue];
        data.forEach(function (option) {
            var optionElement = document.createElement('option');
            optionElement.value = option;
            optionElement.text = option;
            targetDropdown.add(optionElement);
        });
    }
</script>
<script>
    function addInputField() {
        // Create a new div to contain label and input
        var newDiv = document.createElement('div');
        newDiv.className = 'row mb-3';

        // Create a new label element
        var newLabel = document.createElement('label');
        newLabel.textContent = 'New Field:';

        // Create a new input element
        var newInput = document.createElement('input');
        newInput.type = 'text';
        newInput.name = 'dynamicField'; // You may want to set a unique name
        newInput.placeholder = 'New Field';
        newInput.className = 'form-control';

        // Append label and input to the new div
        newDiv.appendChild(newLabel);
        newDiv.appendChild(newInput);

        // Get the container where you want to append the new input
        var container = document.getElementById('inputContainer');

        // Append the new div to the container
        container.appendChild(newDiv);
    }
</script>
@endsection
