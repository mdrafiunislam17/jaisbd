<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AssignRoleController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\HomeController;
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

Auth::routes();
// Protected routes (requires authentication)
Route::middleware('auth')->group(function () {

    // Home Dashboard
    Route::get('/home', [HomeController::class, 'index'])->name('home');


    // SliderController
    Route::resource("sliders", SliderController::class);

    //AboutController
    Route::resource('abouts',AboutController::class);

    //ClientController

    Route::resource('clients',ClientController::class);
    // Role Route
    Route::get('/dashboard/role', [RoleController::class,'index'])->name('role.index');
    Route::get('/dashboard/role/create', [RoleController::class,'create'])->name('role.create');
    Route::post('/dashboard/role/store', [RoleController::class,'store'])->name('role.store');
    Route::get('/dashboard/role/edit/{id}', [RoleController::class,'edit'])->name('role.edit');
    Route::post('/dashboard/role/update/{id}', [RoleController::class,'update'])->name('role.update');
    Route::get('/dashboard/role/delete/{id}', [RoleController::class,'delete'])->name('role.delete');
    Route::get('/dashboard/role/delete/{id}', [RoleController::class,'destroy'])->name('role.delete');


    // ==============================
    // Assign Role Management Routes
    // ==============================
    Route::get('/dashboard/assign-role', [AssignRoleController::class, 'index'])->name('assignrole.index');
    Route::post('/dashboard/assign-role/store', [AssignRoleController::class, 'assignRole'])->name('assignrole.store');



});
