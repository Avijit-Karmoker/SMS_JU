@extends('layouts.dashboard-master')

@section('content')
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
            <form method="POST" action="{{ route('subject.add') }}">
                @csrf
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Facalty Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input class="form-control" type="text" name="faculty_name" placeholder="Faculty name">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Department Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input class="form-control" type="text" name="department_name" placeholder="Department name">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Subject 1</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input class="form-control" type="text" name="subject_1" placeholder="Subject 1">
                    </div>
                </div>
                <div id="inputContainer" class="row">
                    <!-- Existing input fields go here -->
                </div>
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9 text-secondary">
                        <button type="button" class="btn btn-secondary px-4 mb-3" onclick="addInputField()">Add New Subject</button>
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
    let fieldCounter = 1; // Counter for incrementing label names

function addInputField() {
    var container = document.getElementById('inputContainer');

    // Increment the field counter
    fieldCounter++;

    // Create a new div for the input container
    var inputContainer = document.createElement('div');
    inputContainer.className = 'col-sm-9 text-secondary';

    // Create a new div for the label container
    var labelContainer = document.createElement('div');
    labelContainer.className = 'col-sm-3 mb-4';

    // Create a new label element
    var newLabel = document.createElement('h6');
    newLabel.textContent = 'Subject ' + fieldCounter;
    newLabel.setAttribute('for', 'field' + fieldCounter);

    // Create a new input element
    var newInput = document.createElement('input');
    newInput.type = 'text';
    newInput.name = 'subject_' + fieldCounter;
    newInput.placeholder = 'Subject ' + fieldCounter;
    newInput.className = 'form-control';

    // Append label to label container
    labelContainer.appendChild(newLabel);

    // Append input to input container
    // inputContainer.appendChild(labelContainer);
    inputContainer.appendChild(newInput);

    // Get the container where you want to append the new input

    // Append the new div to the container
    container.appendChild(labelContainer);
    container.appendChild(inputContainer);
}
</script>
@endsection
