@extends('layouts.dashboard-master')

@section('content')
<!--start breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Manage Subject</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{ route('subject.show') }}"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Manage Subject</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
{{-- <div class="container"> --}}
    <div class="main-body">
        <h6 class="mb-0 text-uppercase">DataTable Import</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>SL No</th>
                                <th>Faculty Name</th>
                                <th>Department Name</th>
                                <th>Subjects</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @php
                                $previousName = null;
                                $index = 0;
                            @endphp --}}

                            @foreach ($subjects as $subject)
                                <tr>
                                    {{-- <td>{{ $subject->faculty_name }}</td> --}}
                                    {{-- @if ($subject->faculty_name !== $previousName)
                                    <td rowspan="{{ $counts[$subject->faculty_name] }}">{{ $index += 1 }}</td>
                                        <td rowspan="{{ $counts[$subject->faculty_name] }}">{{ $subject->faculty_name }}</td>
                                        @php
                                            $previousName = $subject->faculty_name;
                                        @endphp
                                    @endif --}}

                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $subject->faculty_name }}</td>
                                    <td>{{ $subject->department_name }}</td>
                                    <td>
                                        <ol>
                                            @foreach ($allSubjects as $sub)
                                                @if ($subject->$sub != null)
                                                    <li>{{ $subject->$sub }}</li>
                                                @endif
                                            @endforeach
                                        </ol>
                                    </td>
                                    <td><button class="btn btn-danger">Delete</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $subjects->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
{{-- </div> --}}
@endsection

@section('footer-script')
<script>
    // new DataTable('#example');
    $(document).ready(function() {
        $('#example').DataTable({
            "paging": false,
            "info": false, // Disable DataTables pagination
            // Other DataTables initialization options...
        });
    });
</script>
@endsection
