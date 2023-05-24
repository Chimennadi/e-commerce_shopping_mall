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

        //Sections
        Route::get("sections", "SectionController@sections");
        Route::post("update-section-status", "SectionController@updateSectionStatus");
        Route::get("delete-section/{id}", "SectionController@deleteSection");
        Route::match(["get", "post"], "add-edit-section/{id?}", "SectionController@addEditSection");

        //Brands
        Route::get("brands", "BrandController@brands");
        Route::post("update-brand-status", "BrandController@updateBrandStatus");
        Route::get("delete-brand/{id}", "BrandController@deleteBrand");
        Route::match(["get", "post"], "add-edit-brand/{id?}", "BrandController@addEditBrand");

        //Categories
        Route::get("categories", "CategoryController@categories");
        Route::post("update-category-status", "CategoryController@updateCategoryStatus");
        Route::match(["get", "post"], "add-edit-category/{id?}", "CategoryController@addEditCategory");
        Route::get("append-categories-level", "CategoryController@appendCategoryLevel");
        Route::get("delete-category/{id}", "CategoryController@deleteCategory");
        //Deleting images from folder and from database table
        Route::get("delete-category-image/{id}", "CategoryController@deleteCategoryImage");

        //Products
        Route::get("products", "ProductsController@products");
        Route::post("update-product-status", "ProductsController@updateProductStatus");
        Route::get("delete-product/{id}", "ProductsController@deleteProduct");
        Route::match(["get", "post"], "add-edit-product/{id?}", "ProductsController@addEditProduct");
        Route::get("delete-product-image/{id}", "ProductsController@deleteProductImage");
        Route::get("delete-product-video/{id}", "ProductsController@deleteProductVideo");

        //Attributes
        Route::match(["get", "post"], "add-edit-attributes/{id}", "ProductsController@addAttributes");
        Route::post("update-attribute-status", "ProductsController@updateAttributeStatus");
        Route::get("delete-attribute/{id}", "ProductsController@deleteAttribute");
        Route::match(["get", "post"], "edit-attributes/{id}", "ProductsController@editAttributes");

        //Images
        Route::match(["get", "post"], "add-images/{id}", "ProductsController@addImages");
        Route::post("update-image-status", "ProductsController@updateImageStatus");
        Route::get("delete-image/{id}", "ProductsController@deleteImage");

        //Banners
        Route::get("banners", "BannersController@banners");
        Route::post("update-banner-status", "BannersController@updateBannerStatus");
        Route::get("delete-banner/{id}", "BannersController@deleteBanner");
        Route::match(["get", "post"], "add-edit-banner/{id?}", "BannersController@addEditBanner");


    });
});

Route::namespace("App\Http\Controllers\Front")->group(function() {
    Route::get("/", "IndexController@index");
});


