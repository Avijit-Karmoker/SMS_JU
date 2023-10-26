<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('dashboard_assets') }}/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('dashboard_assets') }}/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="{{ asset('dashboard_assets') }}/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="{{ asset('dashboard_assets') }}/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('dashboard_assets') }}/css/pace.min.css" rel="stylesheet" />
    <script src="{{ asset('dashboard_assets') }}/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('dashboard_assets') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('dashboard_assets') }}/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('dashboard_assets') }}/css/app.css" rel="stylesheet">
    <link href="{{ asset('dashboard_assets') }}/css/icons.css" rel="stylesheet">
    <title>Rukada - Responsive Bootstrap 5 Admin Template</title>
</head>

<body class="bg-login">
    <!--wrapper-->
    <div class="wrapper">
        <div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
                    <div class="col mx-auto">
                        <div class="my-4 text-center">
                            <img src="{{ asset('dashboard_assets') }}/images/logo-img.png" width="180"
                                alt="" />
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="text-center">
                                        <h3 class="">Sign Up</h3>
                                        <p>Already have an account? <a href="{{ route('login.index') }}">Login here</a>
                                        </p>
                                    </div>
                                    {{-- <div class="d-grid">
                                        <a class="btn my-4 shadow-sm btn-white" href="javascript:;"> <span
                                                class="d-flex justify-content-center align-items-center">
                                                <img class="me-2"
                                                    src="{{ asset('dashboard_assets') }}/images/icons/search.svg"
                                                    width="16" alt="Image Description">
                                                <span>Sign Up with Google</span>
                                            </span>
                                        </a> <a href="javascript:;" class="btn btn-facebook"><i
                                                class="bx bxl-facebook"></i>Sign Up with Facebook</a>
                                    </div>
                                    <div class="login-separater text-center mb-4"> <span>OR SIGN UP WITH EMAIL</span>
                                        <hr />
                                    </div> --}}
                                    <div class="form-body">
                                        <form class="row g-3" method="POST" action="{{ route('login.store') }}">
                                            @csrf
                                            <div class="col-12">
                                                <label for="inputFirstName" class="form-label">Full Name</label>
                                                <input type="text" name="name" class="form-control" id="inputFirstName" placeholder="Jhon">
                                                @error('name')
                                                    <div class="alert alert-danger border-0 mt-3 bg-danger alert-dismissible fade show">
                                                        <div class="text-white">{{ $message }}</div>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Email Address</label>
                                                <input type="email" name="email" class="form-control" id="inputEmailAddress"
                                                    placeholder="example@user.com">
                                                @error('email')
                                                    <div class="alert alert-danger border-0 mt-3 bg-danger alert-dismissible fade show">
                                                        <div class="text-white">{{ $message }}</div>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Phone Number</label>
                                                <input type="tel" name="phone" class="form-control" id="inputEmailAddress" placeholder="Enter Phone Number">
                                            </div>
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Select Option</label>
                                                <select class="form-select" aria-label="Default select example" name="role" onchange="myFunction()">
                                                    <option value="student">Student</option>
                                                    <option value="teacher">Teacher</option>
                                                </select>
                                            </div>
                                            <div class="col-12 d-none" id="teacher">
                                                <label for="inputChoosePassword" class="form-label">Teacher's ID</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="text" name="teacher_id" class="form-control" id="inputEmailAddress" placeholder="Enter Teacher ID">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0" name="password" id="inputChoosePassword" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Confirm Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" name="password_confirmation"  class="form-control border-end-0" id="inputChoosePassword" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent" required><i class='bx bx-hide'></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary"><i class='bx bx-user'></i>Sign up</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="{{ asset('dashboard_assets') }}/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="{{ asset('dashboard_assets') }}/js/jquery.min.js"></script>
    <script src="{{ asset('dashboard_assets') }}/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="{{ asset('dashboard_assets') }}/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="{{ asset('dashboard_assets') }}/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>

    <script>
        function myFunction() {
            var element = document.getElementById("teacher");
            element.classList.toggle("d-none");
        }
    </script>
    <!--Password show & hide js -->
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
    </script>
    <!--app JS-->
    <script src="{{ asset('dashboard_assets') }}/js/app.js"></script>
</body>

</html>
