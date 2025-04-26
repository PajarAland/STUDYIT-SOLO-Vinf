<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegularUserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\CommentController;





Route::get('/',[RegularUserController::class, 'index']);

;


// Kelola Modul
Route::get('/admin/tasks', [AdminController::class, 'indexTask']);
Route::post('admin/tasks', [AdminController::class, 'store']);
Route::get('/admin/tasks/{id}/edit', [AdminController::class, 'editTask']);
Route::put('admin/tasks/{id}', [AdminController::class, 'update']);
Route::delete('admin/tasks/{id}', [AdminController::class, 'destroy']); 
 

Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);


Route::get('contact-us/', [ContactUsController::class, 'index'])->name('contact_us.index');
Route::post('contact-us/store', [ContactUsController::class, 'store'])->name('contact_us.store');
Route::get('contact-us/{id}', [ContactUsController::class, 'show'])->name('contact_us.show');
Route::delete('contact-us/{id}', [ContactUsController::class, 'destroy'])->name('contact_us.destroy');

Route::get('/forgot-password', [AuthController::class, 'forgotPassword']);
Route::get('/reset-password', [AuthController::class, 'resetPassword']);

// USER FUNCTIONALITY
Route::get('/',[RegularUserController::class, 'index']);
Route::get('/students/{akun_id}',[RegularUserController::class, 'indexUser']);
Route::get('/students/{akun_id}/payments',[RegularUserController::class, 'enroll']);
Route::get('/students/{akun_id}/courses/{course_id}/modul', [RegularUserController::class, 'readModul']);


// INSTRUCTOR DATA
Route::get('admin/', [AdminController::class, 'indexInstructor']);
Route::get('admin/instructors', [AdminController::class, 'indexInstructor']);
Route::get('admin/instructors/create', [AdminController::class, 'createInstructor']);
Route::post('admin/instructors', [AdminController::class, 'storeInstructor']);
Route::get('admin/instructors/{id}/edit', [AdminController::class, 'editInstructor']);
Route::put('admin/instructors/{id}', [AdminController::class, 'updateInstructor']);
Route::delete('admin/instructors/{id}', [AdminController::class, 'destroyInstructor']); 

// COURSE DATA
Route::get('/admin/courses', [AdminController::class, 'indexCourse']);
Route::get('/admin/courses/create', [AdminController::class, 'createCourse']);
Route::post('/admin/courses', [AdminController::class, 'storeCourse']);
Route::get('/admin/courses/{id}/edit', [AdminController::class, 'editCourse']);
Route::put('/admin/courses/', [AdminController::class, 'updateCourse']);
Route::delete('/admin/courses/{id}', [AdminController::class, 'destroyCourse']); 

// TASK DATA
Route::get('/admin/tasks', [AdminController::class, 'indexTask']);
Route::post('admin/tasks', [AdminController::class, 'store']);
Route::get('/admin/tasks/{id}/edit', [AdminController::class, 'editTask']);
Route::put('admin/tasks/{id}', [AdminController::class, 'update']);
Route::delete('admin/tasks/{id}', [AdminController::class, 'destroy']); 

Route::get('/admin/tasks', [AdminController::class, 'indexComment']);
Route::post('admin/tasks', [AdminController::class, 'store']);
Route::get('/admin/comments/{id}/edit', [AdminController::class, 'editComment']);
Route::put('admin/comments/{id}', [AdminController::class, 'update']);
Route::delete('admin/comments/{id}', [AdminController::class, 'destroy']); 
Route::get('/admin/replys/{id}/edit', [AdminController::class, 'editComment']);
Route::put('admin/replys/{id}', [AdminController::class, 'update']);
Route::delete('admin/replys/{id}', [AdminController::class, 'destroy']); 




Route::middleware(['auth'])->group(function () {
Route::get('/profile/edit', [EditProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [EditProfileController::class, 'update'])->name('profile.update');
});