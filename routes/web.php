<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('public.index');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Members Route
    Route::controller(MemberController::class)->group(function() {
        Route::get('/showmembers', 'showmembers')->name('showmembers');

        Route::get('/addmember', 'addmember')->name('addmember');
        Route::get('/searchmember', 'searchmember')->name('searchmember');
    
    
        Route::post('/storemember', 'storemember')->name('storemember');
    
        Route::get('/editmember/{member}', 'editmember')->name('editmember');
        Route::post('/editmember/{member}', 'updatemember')->name('updatemember');
        Route::post('/deletemember/{member}', 'deletemember')->name('deletemember');
        Route::get('/memberdetail/{member}', 'memberdetail')->name('memberdetail');
        Route::post('/addpayment/{member}', 'addpayment')->name('addpayment');

    });

    // Attendance
    Route::controller(AttendanceController::class)->group(function() {
        Route::post('/makeattendance/{member}', 'makeattendance');
    });



});

require __DIR__.'/auth.php';
