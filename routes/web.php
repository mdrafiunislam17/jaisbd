<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AchievementController;
// use App\Http\Controllers\Admin\AssignRoleController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\ManagementController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\AssignRoleController;
use App\Http\Controllers\Admin\TeamMemberController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectCategoryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectInfoController;

use App\Http\Controllers\WorkProcessController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\CareerApplicationController;
use App\Http\Controllers\FrontedController;
use Illuminate\Support\Facades\Auth;





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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[FrontedController::class,'index'])->name('fronted.index');

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


    //ServiceController

    Route::resource('services', ServiceController::class);
//WorkProcessController
    Route::resource('works',WorkProcessController::class);


    //AchievementController
    Route::resource('achievements',AchievementController::class);

    //ManagementController
    Route::resource('managements',ManagementController::class);

    //DesignationController

    Route::resource('designations',DesignationController::class);

    //TeamMemberController

    Route::resource('teams',TeamMemberController::class);

    Route::resource('project-categories', ProjectCategoryController::class);


    Route::resource('projectinfo', ProjectInfoController::class);

    Route::resource('project',ProjectController::class);

       // AdminBlogController
    Route::resource("blogs", AdminBlogController::class);

    // AdminEventController
    Route::resource("events", AdminEventController::class);

    Route::resource('career', CareerController::class);

    Route::resource('career-apply', CareerApplicationController::class);


    // Role Route
    Route::get('/dashboard/role', [RoleController::class,'index'])->name('role.index');
    Route::get('/dashboard/role/create', [RoleController::class,'create'])->name('role.create');
    Route::post('/dashboard/role/store', [RoleController::class,'store'])->name('role.store');
    Route::get('/dashboard/role/edit/{id}', [RoleController::class,'edit'])->name('role.edit');
    Route::put('/dashboard/role/update/{id}', [RoleController::class,'update'])->name('role.update');
    // Route::get('/dashboard/role/delete/{id}', [RoleController::class,'delete'])->name('role.delete');
    Route::delete('/dashboard/role/delete/{id}', [RoleController::class,'destroy'])->name('role.delete');


    // ==============================
    // Assign Role Management Routes
    // ==============================
    Route::get('/dashboard/assign-role', [AssignRoleController::class, 'index'])->name('assignrole.index');
    Route::post('/dashboard/assign-role/store', [AssignRoleController::class, 'assignRole'])->name('assignrole.store');



    Route::get('/chatbot', function () {
    return view('chatbot');
});


});
