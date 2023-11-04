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
                    <table id="example" class="table table-bordered" style="width:100%">
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
                            @php
                                $serialNumber = 1;
                            @endphp
                            @foreach ($faculties as $faculty)
                                @foreach($faculty->departments as $index => $department)
                                <tr>
                                    @if($index === 0)
                                        <td rowspan="{{ count($faculty->departments) }}">
                                                {{ $serialNumber++ }}
                                        </td>
                                        <td rowspan="{{ count($faculty->departments) }}">
                                                {{ $faculty->name }}
                                        </td>
                                    @endif
                                    <td>{{ $department->name }}</td>
                                    <td>
                                        @foreach($department->subjects as $subject)
                                            {{ $subject->name }}
                                            @if (!$loop->last)
                                                <br>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td><button class="btn btn-danger">Delete</button></td>
                                </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>

                    {{-- <table border="1">
                        <thead>
                            <tr>
                                <th>Faculty</th>
                                <th>Department</th>
                                <th>Subjects</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($faculties as $faculty)
                                @foreach($faculty->departments as $department)
                                    <tr>
                                        <td>{{ $faculty->name }}</td>
                                        <td>{{ $department->name }}</td>
                                        <td>
                                            @foreach($department->subjects as $subject)
                                                {{ $subject->name }}
                                                @if (!$loop->last)
                                                    <br>
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table> --}}

                    {{-- {{ $subjects->links('pagination::bootstrap-5') }}  --}}
                </div>
            </div>
        </div>
    </div>
{{-- </div> --}}
@endsection

@section('footer-script')
<script>
    // new DataTable('#example');
    // $(document).ready(function() {
    //     $('#example').DataTable({
    //         "paging": false,
    //         "info": false,
    //         "alert": false // Disable DataTables pagination
    //         // Other DataTables initialization options...
    //     });
    // });
</script>
@endsection
