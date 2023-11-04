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

            {{-- faculty from --}}
            <div class="card">
                @if(session('faculty'))
                    <div class="row mt-3">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-8 text-secondary">
                            <div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2">
                                <div class="d-flex align-items-center">
                                    <div class="font-35 text-success"><i class="bx bxs-check-circle"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-0 text-success">Success Alerts</h6>
                                        <div>A simple success alert—check it out!</div>
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('faculty.add') }}">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Faculty Name</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                <input type="text" name="faculty_name" class="form-control"/>
                            </div>
                            <div class="col-sm-1 text-secondary">
                                <button type="submit" class="btn btn-primary px-4">Save</button>
                            </div>
                            @error('faculty_name')
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-8 text-secondary">
                                        <div class="alert alert-succe border-0 mt-3 bg-danger alert-dismissible fade show">
                                            <div class="text-white">{{ $message }}</div>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>
                                </div>
                            @enderror
                        </div>
                    </form>
                </div>
            </div>

            {{-- department form  --}}
            <div class="card">
                @if(session('department'))
                    <div class="row mt-3">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-8 text-secondary">
                            <div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2">
                                <div class="d-flex align-items-center">
                                    <div class="font-35 text-success"><i class="bx bxs-check-circle"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-0 text-success">Success Alerts</h6>
                                        <div>A simple success alert—check it out!</div>
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('department.add') }}">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Faculty</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <select name="faculty_id" id="" class="form-select">
                                    @foreach ($faculties as $faculty)
                                        <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Department Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" name="department_name" class="form-control"/>
                            </div>
                        </div>
                        @error('faculty_name')
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-8 text-secondary">
                                    <div class="alert alert-succe border-0 mt-3 bg-danger alert-dismissible fade show">
                                        <div class="text-white">{{ $message }}</div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            </div>
                        @enderror
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9 text-secondary">
                                <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- subject form  --}}
            <div class="card">
                @if(session('subject'))
                    <div class="row mt-3">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-8 text-secondary">
                            <div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2">
                                <div class="d-flex align-items-center">
                                    <div class="font-35 text-success"><i class="bx bxs-check-circle"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-0 text-success">Success Alerts</h6>
                                        <div>A simple success alert—check it out!</div>
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('subject.add') }}">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Faculty</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <select name="department_id" id="" class="form-select">
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Subjects Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" name="subjects_name" class="form-control"/>
                                <span class="text-danger">*</span>Give multiple subjects with comma
                            </div>
                        </div>
                        @error('subjects_name')
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-8 text-secondary">
                                    <div class="alert alert-succe border-0 mt-3 bg-danger alert-dismissible fade show">
                                        <div class="text-white">{{ $message }}</div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            </div>
                        @enderror
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9 text-secondary">
                                <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
