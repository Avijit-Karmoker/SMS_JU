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
            @livewire('select-subject')
        </div>
    </div>
</div>

@endsection
@section('footer-script')
{{--
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
</script> --}}
@endsection
