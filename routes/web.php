<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseVideoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscribeTransactionController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherRequestController;
use App\Models\Category;
use App\Models\Course;
use App\Models\SubscribeTransaction;
use App\Models\TeacherRequest;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Spatie\Permission\Contracts\Role;

Route::get('/', [FrontController::class, 'index'])->name('front.index');
// Route::get('/1', function() {
//     return view("front.index2");
// });
// Route::get('/2', function() {
//     return view("front.index3");
// });
Route::get('/details/{course:slug}', [FrontController::class, 'details'])->name('front.details');
Route::get('/category/{category:slug}', [FrontController::class, 'category'])->name('front.category');
Route::get('/pricing', [FrontController::class, 'pricing'])->name('front.pricing');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('checkout', [FrontController::class, 'checkout'])->name('front.checkout')->middleware('role:student');
    Route::post('checkout/store', [FrontController::class, 'checkout_store'])->name('front.checkout.store')->middleware('role:student');


    Route::get('/teacher-request', [TeacherRequestController::class, 'create'])->name('front.request');

// Menyimpan data request teacher
Route::post('/teacher-request', [TeacherRequestController::class, 'store'])->name('teacher-requests.store');

    Route::get('/learning/{course}/{courseVideoId}', [FrontController::class,'learning'])->name('front.learning')->middleware('role:student|teacher|owner');;
    Route::prefix('admin')->name('admin.')->group(function (){
        Route::resource('categories', CategoryController::class)
        ->middleware('role:owner');

    
    Route::resource('teachers', TeacherController::class)
    ->middleware('role:owner');

    Route::resource('courses', CourseController::class)
    ->middleware('role:owner|teacher');

    Route::resource('request', TeacherRequestController::class)
    ->middleware('role:owner');

    Route::resource('subscribe_transactions', SubscribeTransactionController::class)
    ->middleware('role:owner');

    
    Route::post('/teacher_request', [App\Http\Controllers\TeacherRequestController::class, 'downloadCV'])
    ->name('request.downloadCV')
    ->middleware('role:owner');

    Route::get('/add/video/{course:id}', [CourseVideoController::class, 'create'])
    ->middleware('role:teacher|owner')
    ->name('course.add_video');

    Route::post('/add/video/save/{course:id}', [CourseVideoController::class, 'store'])
    ->middleware('role:teacher|owner')
    ->name('course.add_video.save');

    Route::resource('course_videos', CourseVideoController::class)
    ->middleware('role:owner|teacher');
    });    

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});



require __DIR__.'/auth.php';
