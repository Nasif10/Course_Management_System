<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\NoticeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ SiteController::class, 'index' ])->name('home');
Route::get('/courses', [ SiteController::class, 'courses' ])->name('courses');
Route::post('/courses/search', [ SiteController::class, 'searchCourse' ])->name('course-search');
Route::get('/course-detail/{id}', [ SiteController::class, 'detail' ])->name('course-detail');

Route::get('/admin', [ AdminController::class, 'login' ])->name('admin-login');
Route::post('/admin/signin', [ AdminController::class, 'signin' ])->name('admin-signin');
Route::get('/admin/register', [ AdminController::class, 'register' ])->name('admin-register');
Route::post('/admin/new-register', [ AdminController::class, 'create' ])->name('admin-new-register');
Route::post('/admin/logout', [ AdminController::class, 'logout' ])->name('admin-logout');

Route::middleware(['admin'])->group(function (){
    Route::get('/admin/home', [ AdminController::class, 'home' ])->name('admin-home');
    Route::get('/admin/teacher/register', [ TeacherController::class, 'register' ])->name('teacher-register');
    Route::post('/admin/teacher/new-register', [ TeacherController::class, 'create' ])->name('teacher-new-register');
    Route::get('/admin/teacher/manage', [ TeacherController::class, 'manage' ])->name('teacher-manage');
    Route::get('/admin/teacher/edit/{id}', [ TeacherController::class, 'edit' ])->name('teacher-edit');
    Route::post('/admin/teacher/update/{id}', [ TeacherController::class, 'update' ])->name('teacher-update');
    Route::get('/admin/teacher/delete/{id}', [ TeacherController::class, 'delete' ])->name('teacher-delete');
    Route::get('/admin/course-publish/{c}', [ CourseController::class, 'adminCourseManage' ])->name('course-publish');
    Route::get('/admin/course-detail/{id}', [ CourseController::class, 'detail' ])->name('admin-course-detail');
    Route::get('/admin/course/update-status/{id}', [ CourseController::class, 'updateStatus' ])->name('course-update-status');
    Route::get('/admin/course/delete/{id}', [ CourseController::class, 'delete' ])->name('course-delete');
    Route::get('/admin/enroll/pending', [ EnrollController::class, 'pendingEnroll' ])->name('enroll-pending');
    Route::get('/admin/enroll-update/{id}', [ EnrollController::class, 'updateEnroll' ])->name('enroll-update');
    Route::get('/admin/enroll/manage', [ EnrollController::class, 'manageEnroll' ])->name('enroll-manage');
    Route::get('/admin/enroll-delete/{id}', [ EnrollController::class, 'deleteEnroll' ])->name('enroll-delete');

    Route::get('/admin/notice/add', [ NoticeController::class, 'addNotice' ])->name('notice-add');
    Route::post('/admin/notice/create', [ NoticeController::class, 'createNotice' ])->name('notice-create');
    Route::get('/admin/notice/manage', [ NoticeController::class, 'manageNotice' ])->name('notice-manage');
    Route::get('/admin/notice/delete/{id}', [ NoticeController::class, 'deleteNotice' ])->name('notice-delete');
});


Route::get('/teacher', [ TeacherController::class, 'login' ])->name('teacher-login');
Route::post('/teacher/signin', [ TeacherController::class, 'signin' ])->name('teacher-signin');
Route::post('/teacher/logout', [ TeacherController::class, 'logout' ])->name('teacher-logout');

Route::middleware(['teacher'])->group(function (){
    Route::get('/teacher/home', [ TeacherController::class, 'home' ])->name('teacher-home');
    Route::get('/teacher/course-add', [ CourseController::class, 'add' ])->name('course-add');
    Route::post('/teacher/course-create', [ CourseController::class, 'create' ])->name('course-create');
    Route::get('/teacher/course-manage', [ CourseController::class, 'teacherCourseManage' ])->name('course-manage');
    Route::get('/teacher/course/edit/{id}', [ CourseController::class, 'edit' ])->name('course-edit');
    Route::post('/teacher/course/update/{id}', [ CourseController::class, 'update' ])->name('course-update');
    Route::get('/teacher/course/file/add/{id}', [ CourseController::class, 'addFile' ])->name('file-add');
    Route::post('/teacher/course/file/create/{id}', [ CourseController::class, 'createFile' ])->name('file-create');
    Route::get('/teacher/enrolledUsers/{id}', [ EnrollController::class, 'enrolledUsers' ])->name('enrolled-users');
});


Route::get('/user/login', [ UserController::class, 'login' ])->name('user-login');
Route::post('/user/signin', [ UserController::class, 'signin' ])->name('user-signin');
Route::get('/user/register', [ UserController::class, 'register' ])->name('user-register');
Route::post('/user/new-register', [ UserController::class, 'create' ])->name('user-new-register');

Route::middleware(['user'])->group(function (){
    Route::get('/user/home', [ UserController::class, 'home' ])->name('user-home');
    Route::post('/user/update/{id}', [ UserController::class, 'update' ])->name('user-update');
    Route::post('/user/logout', [ UserController::class, 'logout' ])->name('user-logout');
    Route::get('/user/enroll/{id}', [ EnrollController::class, 'enroll' ])->name('course-enroll');
    Route::get('/user/payment/{id}', [ EnrollController::class, 'payment' ])->name('course-payment');
    Route::get('/user/course/files/{id}', [ CourseController::class, 'courseFiles' ])->name('course-files');
    Route::get('/user/enrolledUser/{id}', [ EnrollController::class, 'enrolledUser' ])->name('enrolled-user');
});

