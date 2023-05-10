<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::prefix("/admin")->namespace("App\Http\Controllers\Admin")->group(function() {
    //Admin Login Route
    Route::match(["get", "post"], "login", "AdminController@login");
    Route::group(['middleware' => ['admin']], function() {

        //Admin Dashboard Route
        Route::get("dashboard", "AdminController@dashboard");

        //Update Admin Password
        Route::match(["get", "post"], "update-admin-password", "AdminController@updateAdminPassword");

        //Update Admin Details
        Route::match(["get", "post"], "update-admin-details", "AdminController@updateAdminDetails");

        //Check Admin Password
        Route::post("check-admin-password", "AdminController@checkAdminPassword");

        //Update Vendor Details
        Route::match(["get", "post"], "update-vendor-details/{slug}", "AdminController@updateVendorDetails");

        //View Admins / Subadmins / Vendors
        Route::get("admins/{type?}", "AdminController@admins");

        //View Vendor Details 
        Route::get("view-vendor-details/{id}", "AdminController@viewVendorDetails");

        //Update Admin Status
        Route::post("update-admin-status", "AdminController@updateAdminStatus");

        //Admin Logout
        Route::get("logout", "AdminController@logout");
    });
});


