<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;
use App\Livewire\SelectSubject;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/photo/update', [ProfileController::class, 'profile_photo_upload'])->name('profile.photo.update');
});

require __DIR__.'/auth.php';

//student & teacher login
Route::resource('/user/login', LoginController::class);

//admin controller
Route::get('/subject', [AdminController::class, 'subject'])->name('subject');
Route::post('/faculty/add', [AdminController::class, 'addFaculty'])->name('faculty.add');
Route::post('/department/add', [AdminController::class, 'addDepartment'])->name('department.add');
Route::post('/subject/add', [AdminController::class, 'addSubject'])->name('subject.add');
Route::get('/subject/show', [AdminController::class, 'showSubject'])->name('subject.show');

//Student resource route
// Route::resource('/student', StudentController::class);
Route::post('/user-login', [LoginController::class, 'login'])->name('user.login');
Route::get('/user-dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
Route::post('/student/information', [StudentController::class, 'information'])->name('student.information');

Route::get('/user-dashboard/subject', [StudentController::class, 'showSubject'])->name('user.dashboard.subject');
Route::post('/subject/update', [StudentController::class, 'updateSubject'])->name('subject.update');

//Teacher Controller
Route::get('/teacher/attendance', [TeacherController::class, 'attendance'])->name('teacher.attendance');


