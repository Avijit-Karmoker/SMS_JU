<div>
    <form method="POST" wire:submit.prevent="subjectUpdate">
        @csrf
        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">Select Semester</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <select wire:model.live="selectedSemester" class="form-select">
                    <option value="">-- Select Semester --</option>
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
                <h6 class="mb-0"></h6>
            </div>
            <div class="col-sm-9 text-secondary">
                @if (!$selectedSemester)
                    @error('selectedSemester')
                        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                            <div class="text-white">{{ $message }}</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @enderror
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">Select Faculty</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <select wire:model.live="selectedFaculty" class="form-select">
                    <option value="">Select Faculty</option>
                    @foreach($faculties as $faculty)
                        <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0"></h6>
            </div>
            <div class="col-sm-9 text-secondary">
                @if (!$selectedFaculty)
                    @error('selectedFaculty')
                        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                            <div class="text-white">{{ $message }}</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @enderror
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">Select Department</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <select wire:model.live="selectedDepartment" class="form-select">
                    <option value="">Select Department</option>
                    @if ($departments)
                        @foreach($departments as  $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0"></h6>
            </div>
            <div class="col-sm-9 text-secondary">
                @if (!$selectedDepartment)
                    @error('selectedFaculty')
                        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                            <div class="text-white">{{ $message }}</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @enderror
                @endif
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-secondary">
                <thead>
                    <tr>
                        <th scope="col">SL No.</th>
                        <th scope="col">Subject Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($subjects)
                        @foreach($subjects as $subject)
                        <tr class="">
                            <td scope="row">{{ $loop->index+1 }}</td>
                            <td>{{ $subject->name }}</td>
                            <td>
                                <input type="checkbox" wire:model="selectedSubject" value="{{ $subject->id }}">
                            </td>
                        </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="50" class="text-center fw-bold text-danger">Please select Faculty and Department at first!</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-9 text-secondary">
                <button type="submit" class="btn btn-primary px-4">Save</button>
            </div>
        </div>
    </form>
    @if(session('subject_failed'))
        <div class="alert alert-danger">
            {{ session('subject_failed') }}
        </div>
    @endif
    {{-- @if(count($selectedSubject) > 0)
        <p>Selected Subjects:</p>
        <ul>
            @foreach($selectedSubject as $subjectId)
                <li>{{ $subjectId }}</li>
            @endforeach
        </ul>
    @else
        <p>No subjects selected.</p>
    @endif --}}
</div>
